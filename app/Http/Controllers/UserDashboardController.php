<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Informasi;
use App\Models\Kategori;
use App\Models\Broadcaster;
use App\Models\Pengunjung;
use App\Models\JadwalSiaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use GuzzleHttp\Client;

class UserDashboardController extends Controller
{
    public function indexUser()
    {
        // Ambil semua data event dengan status 'Segera Datang' dan 'Sedang Berlangsung'
        $events = Event::whereIn('status_event', ['Segera Datang', 'Sedang Berlangsung'])->orderBy('created_at', 'desc')->get();

        // Ambil 4 berita terbaru
        $informasis = Informasi::with('kategori')->orderBy('created_at', 'desc')->take(4)->get();

        // Ambil semua kategori
        $kategoris = Kategori::all();
        // Query untuk berita populer berdasarkan views per minggu
        $popularNews = Informasi::select('informasi.id', 'informasi.judul_informasi', 'informasi.gambar_informasi', 'informasi.created_at', DB::raw('COUNT(news_views.id) as view_count'))
            ->leftJoin('news_views', 'informasi.id', '=', 'news_views.informasi_id')
            ->whereBetween('news_views.created_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->groupBy('informasi.id', 'informasi.judul_informasi', 'informasi.gambar_informasi', 'informasi.created_at')
            ->orderBy('view_count', 'desc')
            ->take(3)
            ->get();
        $onAirHost = Broadcaster::where('status', 'onair')->first();

        // API key YouTube kamu
        $apiKey = 'AIzaSyCkc8RfdDARxqic01gZQLz1PQoODGKaeLY';
        // ID channel YouTube yang ingin kamu periksa
        $channelId = 'UCdQ5iyJZZkOQQYyGvoyzKRA';

        // Buat client Guzzle
        $client = new Client();
        $url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=' . $channelId . '&eventType=live&type=video&key=' . $apiKey;

        // Inisiasi cURL
        $ch = curl_init();

        // Set opsi cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Tambahkan baris ini untuk menonaktifkan verifikasi SSL
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Eksekusi dan ambil respons
        $response = curl_exec($ch);
        curl_close($ch);

        // Cek apakah ada error
        if (curl_errno($ch)) {
            $error_message = curl_error($ch);
            Log::error('cURL Error: ' . $error_message);
        }

        // Decode JSON response
        $data = json_decode($response, true);

        // Debugging data
        Log::info('Decoded Data: ' . print_r($data, true));

        if (!empty($data['items'])) {
            // Akses item pertama dari livestream
            $liveStream = $data['items'][0];

            // Ambil detail livestream
            $videoId = $liveStream['id']['videoId'];
            $title = $liveStream['snippet']['title'];
            $description = $liveStream['snippet']['description'];
            $thumbnail = $liveStream['snippet']['thumbnails']['high']['url'];

            // Return ke view dengan variabel yang dibutuhkan
            return view('visitor.dashboard', compact('events', 'informasis', 'kategoris', 'popularNews', 'onAirHost', 'videoId', 'title', 'description', 'thumbnail'));
        } else {
            // Jika tidak ada livestream, tidak kirim variabel livestream
            return view('visitor.dashboard', compact('events', 'informasis', 'kategoris', 'popularNews', 'onAirHost'));
        }

        // // Cek apakah ada livestream yang aktif
        // if (!empty($data['items'])) {
        //     $liveStream = $data['items'][0];
        //     $videoId = $liveStream['id']['videoId'];
        //     $title = $liveStream['snippet']['title'];
        //     $description = $liveStream['snippet']['description'];
        //     $thumbnail = $liveStream['snippet']['thumbnails']['high']['url'];

        //     // Kirim data event dan informasi ke view
        //     return view('visitor.dashboard', compact('events', 'informasis', 'kategoris', 'popularNews', 'onAirHost', 'videoId', 'title', 'description', 'thumbnail'));
        // } else {
        //     return view('visitor.dashboard', compact('events', 'informasis', 'kategoris', 'popularNews', 'onAirHost'));

        // }
    }
    public function indexradio()
    {
        $jadwals = JadwalSiaran::orderBy('waktu_mulai', 'asc')->get();
        $onAirHost = Broadcaster::where('status', 'onair')->first();
        $teambroadcast = Broadcaster::all();
        return view('visitor.radio', compact('onAirHost','jadwals','teambroadcast'));
        return view('visitor.about', compact('teambroadcast'));
    }
    public function indexabout()
    {
        $teambroadcast = Broadcaster::all();
        return view('visitor.about', compact('teambroadcast'));
    }
    public function detailInformasi($id)
    {
        // Ambil detail berita berdasarkan ID
        $informasi = Informasi::with('kategori')->findOrFail($id);
        // Ambil berita berdasarkan ID
        // Ambil berita berdasarkan ID
        $berita = Informasi::findOrFail($id);  // Menggunakan findOrFail untuk langsung gagal jika tidak ditemukan

        // Simpan view ke dalam tabel news_views berdasarkan IP visitor
        $ipAddress = request()->ip();

        // Periksa apakah IP ini sudah pernah melihat berita ini dalam minggu ini
        $existingView = Pengunjung::where('informasi_id', $id)
            ->where('ip_address', $ipAddress)
            ->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->first();

        if (!$existingView) {
            // Jika belum ada view dari IP ini dalam minggu ini, tambahkan view baru
            Pengunjung::create([
                'informasi_id' => $id,
                'ip_address' => $ipAddress,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Ambil berita terbaru
        $latestNews = Informasi::orderBy('created_at', 'desc')->take(4)->get();

        // Kirim data ke view
        return view('visitor.berita', compact('informasi', 'latestNews', 'berita'));
    }

    public function showCategoryNews(Request $request, $id)
    {
        // Ambil kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);

        // Ambil parameter tahun dari query string jika ada
        $year = $request->query('year');

        // Mulai dengan query berita berdasarkan kategori
        $query = Informasi::where('id_kategori', $id);

        // Jika parameter tahun ada, tambahkan filter tahun ke query
        if ($year) {
            $query->whereYear('created_at', $year);
        }

        // Ambil berita dengan paginasi
        $informasis = $query->orderBy('created_at', 'desc')->paginate(12);

        // Ambil tahun-tahun yang tersedia dari berita dalam kategori ini
        $years = Informasi::where('id_kategori', $id)
            ->selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // Kirim data ke view kategori
        return view('visitor.category', compact('informasis', 'kategori', 'years'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $informasis = Informasi::where('judul_informasi', 'like', '%' . $query . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('visitor.search', compact('informasis'));
    }
}
