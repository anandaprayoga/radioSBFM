<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $query = Kategori::query();

        // Jika ada input pencarian, tambahkan filter ke query
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nama_kategori', 'like', "%{$search}%");
        }
        
        // Mengambil semua data Kategoris
        $kategoris = $query->paginate(5);

        // Mengirim data ke view
        return view('admin.kategori', compact('kategoris'));
    }

    public function insertKategori(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        // Menyimpan data ke database
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect()->back()->with('success', 'Data Kategori berhasil ditambahkan');
    }

    public function destroy($id)
    {
        // Cari data kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);

        // Hapus data kategori
        $kategori->delete();

        // Redirect kembali ke halaman Kategoris dengan pesan sukses
        return redirect()->back()->with('success', 'Data Kategori berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect()->back()->with('success', 'Data Kategori berhasil diperbarui');
    }
}
