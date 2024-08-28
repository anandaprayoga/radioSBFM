<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public function index()
    {
        $informasis = Informasi::all();
        $kategoris = Kategori::all();

        // Mengirim data ke view
        return view('admin.informasi', compact('informasis', 'kategoris'));
    }

    public function insertInformasi(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul_informasi' => 'required|string',
            'id_kategori' => 'required|exists:kategori,id',
            'isi_informasi' => 'required|string',
            'gambar_informasi' => 'image|mimes:jpeg,png,jpg|max:2048',

        ]);

        // Menyimpan data ke database
        $informasi = new Informasi();
        $informasi->judul_informasi = $request->judul_informasi;
        $informasi->id_kategori = $request->id_kategori;
        $informasi->isi_informasi = $request->isi_informasi;

        // Menyimpan gambar dan mengisi kolom gambar_informasi
        if ($request->hasFile('gambar_informasi')) {
            $informasi->gambar_informasi = $request->file('gambar_informasi')->store('informasis', 'public');
        }

        $informasi->save();

        return redirect()->back()->withInput()->with('success', 'Data informasi berhasil ditambahkan');
    }



    public function destroy($id)
    {
        // Cari data informasi berdasarkan ID
        $informasi = Informasi::findOrFail($id);

        // Hapus data informasi
        $informasi->delete();

        // Redirect kembali ke halaman informasi dengan pesan sukses
        return redirect()->back()->with('success', 'Data informasi berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'judul_informasi' => 'required|string',
            'id_kategori' => 'required|exists:kategori,id', // Validasi bahwa id_kategori ada di tabel kategori
            'isi_informasi' => 'required|string',
            'gambar_informasi' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Temukan informasi berdasarkan ID
        $informasi = Informasi::findOrFail($id);

        // Update data informasi
        $informasi->judul_informasi = $request->judul_informasi;
        $informasi->id_kategori = $request->id_kategori;
        $informasi->isi_informasi = $request->isi_informasi;

        // Check if new image file is uploaded
        if ($request->hasFile('gambar_informasi')) {
            // Hapus gambar lama jika ada
            if ($informasi->gambar_informasi && Storage::exists('public/' . $informasi->gambar_informasi)) {
                Storage::delete('public/' . $informasi->gambar_informasi);
            }

            // Upload gambar baru
            $fileName = time() . '.' . $request->gambar_informasi->extension();
            $request->gambar_informasi->storeAs('public/Informasi', $fileName);
            $informasi->gambar_informasi = 'Informasi/' . $fileName;
        }

        // Simpan perubahan
        $informasi->save();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->withInput()->with('success', 'Data informasi berhasil diupdate.');
    }
}
