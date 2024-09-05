<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::query();

        // Jika ada input pencarian, tambahkan filter ke query
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('gambar', 'like', "%{$search}%");
        }
        
        // Mengambil semua data Kategoris
        $galeris = $query->paginate(5);

        // Mengirim data ke view
        return view('admin.galeri', compact('galeris'));
    }

    public function insertGaleri(Request $request)
    {
        // Validasi input
        $request->validate([
            'gambar' => 'image|max:50000',
        ]);

        // Menyimpan data ke database
        $galeri = new Galeri();
        $galeri->gambar = $request->file('gambar')->store('Galeri', 'public');

        $galeri->save();

        return redirect()->back()->with('success', 'Gambar berhasil ditambahkan');
    }

    public function destroy($id)
    {
        // Cari data event berdasarkan ID
        $galeri = Galeri::findOrFail($id);

        // Hapus data event
        $galeri->delete();

        // Redirect kembali ke halaman event dengan pesan sukses
        return redirect()->back()->with('success', 'Gambar berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'gambar' => 'image|max:50000',
        ]);

        // Temukan galeri berdasarkan ID
        $galeri = Galeri::findOrFail($id);

        // Check if new image file is uploaded
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($galeri->gambar && Storage::exists('public/' . $galeri->gambar)) {
                Storage::delete('public/' . $galeri->gambar);
            }

            // Upload gambar baru
            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->storeAs('public/Galeri', $fileName);
            $galeri->gambar = 'Galeri/' . $fileName;
        }

        // Simpan perubahan
        $galeri->save();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Gambar berhasil diupdate.');
    }
}
