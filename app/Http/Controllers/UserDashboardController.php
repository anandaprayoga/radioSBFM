<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Informasi;
use App\Models\Kategori;
use App\Models\Broadcaster;
use App\Models\Pengunjung;
use Illuminate\Support\Facades\DB;

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
            ->whereBetween('news_views.created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->groupBy('informasi.id', 'informasi.judul_informasi', 'informasi.gambar_informasi', 'informasi.created_at')
            ->orderBy('view_count', 'desc')
            ->take(3)
            ->get();
        $onAirHost = Broadcaster::where('status', 'onair')->first();


        // Kirim data event dan informasi ke view
        return view('visitor.dashboard', compact('events', 'informasis', 'kategoris','popularNews','onAirHost'));
        
    }
    public function indexradio(){
        $onAirHost = Broadcaster::where('status', 'onair')->first();
        return view('visitor.radio', compact('onAirHost'));
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
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
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
        return view('visitor.berita', compact('informasi', 'latestNews','berita'));
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

