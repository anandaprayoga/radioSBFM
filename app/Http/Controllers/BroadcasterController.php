<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Broadcaster;

class BroadcasterController extends Controller
{
    public function index(Request $request)
    {
        $query = Broadcaster::query();

        // Jika ada input pencarian, tambahkan filter ke query
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nama_broadcaster', 'like', "%{$search}%");
        }

        // Mengambil semua data broadcasters
        $broadcasters = $query->paginate(5);

        // Mengirim data ke view
        return view('admin.broadcaster', compact('broadcasters'));
    }

    public function insertBroadcaster(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_broadcaster' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'tanggal_bergabung' => 'required|date',
        ]);

        // Menyimpan data ke database
        $broadcaster = new Broadcaster();
        $broadcaster->nama_broadcaster = $request->nama_broadcaster;
        $broadcaster->no_hp = $request->no_hp;
        $broadcaster->tanggal_bergabung = $request->tanggal_bergabung;
        $broadcaster->save();

        return redirect()->back()->with('success', 'Data Broadcaster berhasil ditambahkan');
    }

    public function destroy($id)
    {
        // Cari data broadcaster berdasarkan ID
        $broadcaster = Broadcaster::findOrFail($id);

        // Hapus data broadcaster
        $broadcaster->delete();

        // Redirect kembali ke halaman broadcasters dengan pesan sukses
        return redirect()->back()->with('success', 'Data Broadcaster berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_broadcaster' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'tanggal_bergabung' => 'required|date',
        ]);

        $broadcaster = Broadcaster::findOrFail($id);
        $broadcaster->nama_broadcaster = $request->nama_broadcaster;
        $broadcaster->no_hp = $request->no_hp;
        $broadcaster->tanggal_bergabung = $request->tanggal_bergabung;
        $broadcaster->save();

        return redirect()->back()->with('success', 'Data Broadcaster berhasil diperbarui');
    }
}
