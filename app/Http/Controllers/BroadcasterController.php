<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Broadcaster;
use Carbon\Carbon;

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
            'broadcaster_image' => 'image|mimes:jpeg,jpg,png|max:50000',
        ]);

        // Menyimpan data ke database
        $broadcaster = new Broadcaster();
        $broadcaster->nama_broadcaster = $request->nama_broadcaster;
        $broadcaster->no_hp = $request->no_hp;
        $broadcaster->tanggal_bergabung = \Carbon\Carbon::parse($request->tanggal_bergabung)->format('Y-m-d');

        $broadcaster->broadcaster_image = $request->file('broadcaster_image')->store('Broadcaster', 'public');

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
    public function updateStatus(Request $request, $id)
    {
        $broadcaster = Broadcaster::findOrFail($id);
    
        // Cek jika broadcaster ini ingin onair
        if ($request->status == 'onair') {
            // Cek apakah ada broadcaster lain yang sedang onair
            $onairBroadcaster = Broadcaster::where('status', 'onair')->first();
            
            if ($onairBroadcaster && $onairBroadcaster->id != $broadcaster->id) {
                return redirect()->back()->with('error', 'Hanya satu broadcaster yang bisa onair dalam satu waktu. Matikan yang lain terlebih dahulu.');
            }
        }
    
        // Update status broadcaster
        $broadcaster->status = $request->status == 'onair' ? 'onair' : 'offair';
        $broadcaster->save();
    
        return redirect()->back()->with('success', 'Status Broadcaster berhasil diperbarui');
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_broadcaster' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'tanggal_bergabung' => 'required|date',
            'broadcaster_image' => 'nullable|image|max:50000',
        ]);

        $broadcaster = Broadcaster::findOrFail($id);
        $broadcaster->nama_broadcaster = $request->nama_broadcaster;
        $broadcaster->no_hp = $request->no_hp;
        $broadcaster->tanggal_bergabung = $request->tanggal_bergabung;

        // Check if new image file is uploaded
        if ($request->hasFile('broadcaster_image')) {
            // Hapus gambar lama jika ada
            if ($broadcaster->broadcaster_image && Storage::exists('public/' . $broadcaster->broadcaster_image)) {
                Storage::delete('public/' . $broadcaster->broadcaster_image);
            }

            // Upload gambar baru
            $fileName = time() . '.' . $request->broadcaster_image->extension();
            $request->broadcaster_image->storeAs('public/Broadcaster', $fileName);
            $broadcaster->broadcaster_image = 'Broadcaster/' . $fileName;
        }

        $broadcaster->save();

        return redirect()->back()->with('success', 'Data Broadcaster berhasil diperbarui');
    }
}
