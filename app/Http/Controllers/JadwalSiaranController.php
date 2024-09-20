<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalSiaran;
use App\Models\Broadcaster;
use Illuminate\Support\Facades\DB;

class JadwalSiaranController extends Controller
{
    public function index(Request $request)
    {
        $query = JadwalSiaran::query();

        // Jika ada input pencarian, tambahkan filter ke query
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('judul', 'like', "%{$search}%")->orWhere('keterangan', 'like', "%{$search}%");
        }

        // Mengambil data jadwalsiaran beserta broadcasters menggunakan eager loading
        $jadwalsiaran = $query->with('broadcasters')->paginate(10);

        $broadcasters = Broadcaster::all();

        return view('admin.jadwalsiaran', compact('jadwalsiaran', 'broadcasters'));
    }

    public function insertJadwal(Request $request)
    {
        // Gabungkan jam dan menit untuk waktu_mulai dan waktu_berakhir
        $waktu_mulai = $request->jam_mulai . ':' . $request->menit_mulai;
        $waktu_berakhir = $request->jam_berakhir . ':' . $request->menit_berakhir;

        // Lakukan validasi (perhatikan tidak memvalidasi waktu_mulai dan waktu_berakhir langsung dari form)
        $validated = $request->validate([
            'hari' => 'required|string',
            'judul' => 'required|string',
            'keterangan' => 'required|string',
            'id_broadcaster' => 'required|array',
            'id_broadcaster.*' => 'integer|exists:broadcaster,id',
        ]);

        // Tambahkan waktu_mulai dan waktu_berakhir ke array $validated setelah validasi
        $validated['waktu_mulai'] = $waktu_mulai;
        $validated['waktu_berakhir'] = $waktu_berakhir;

        // Buat jadwal siaran baru
        $jadwalSiaran = JadwalSiaran::create([
            'hari' => $validated['hari'],
            'waktu_mulai' => $validated['waktu_mulai'],
            'waktu_berakhir' => $validated['waktu_berakhir'],
            'judul' => $validated['judul'],
            'keterangan' => $validated['keterangan'],
        ]);

        // Hubungkan dengan broadcaster
        $jadwalSiaran->broadcasters()->attach($validated['id_broadcaster']);

        // Redirect dengan pesan sukses
        return redirect()->back()->withInput()->with('success', 'Data jadwal siaran berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $validated = $request->validate([
            'hari' => 'required|string',
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'id_broadcaster' => 'array',
            'id_broadcaster.*' => 'integer|exists:broadcaster,id',
        ]);

        // Gabungkan jam dan menit untuk waktu_mulai dan waktu_berakhir
        $waktu_mulai = $request->jam_mulai . ':' . $request->menit_mulai;
        $waktu_berakhir = $request->jam_berakhir . ':' . $request->menit_berakhir;

        // Temukan jadwal siaran berdasarkan ID
        $jadwal = JadwalSiaran::findOrFail($id);

        // Update data jadwal siaran
        $jadwal->hari = $validated['hari'];
        $jadwal->waktu_mulai = $waktu_mulai; // Gunakan waktu yang sudah digabung
        $jadwal->waktu_berakhir = $waktu_berakhir; // Gunakan waktu yang sudah digabung
        $jadwal->judul = $validated['judul'];
        $jadwal->keterangan = $validated['keterangan'];

        // Simpan perubahan
        $jadwal->save();

        // Sync broadcaster dengan jadwal siaran
        $jadwal->broadcasters()->sync($validated['id_broadcaster']);

        // Redirect ke halaman yang sesuai
        return redirect()->back()->with('success', 'Data jadwal siaran berhasil diupdate.');
    }



    public function destroy($id)
    {
        // Cari data informasi berdasarkan ID
        $jadwalsiaran = JadwalSiaran::findOrFail($id);

        // Hapus data informasi
        $jadwalsiaran->delete();

        // Redirect kembali ke halaman informasi dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
