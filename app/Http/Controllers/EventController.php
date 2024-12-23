<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $this->updateEventStatuses();
        $query = Event::query();

        // Jika ada input pencarian, tambahkan filter ke query
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nama_event', 'like', "%{$search}%")->orWhere('keterangan', 'like', "%{$search}%");
        }
        // Mengambil semua data Events
        $events = $query->orderBy('created_at', 'desc')->paginate(5);

        // Mengirim data ke view
        return view('admin.event', compact('events'));
    }
    private function updateEventStatuses()
    {
        $events = Event::all();
        $today = Carbon::today();

        foreach ($events as $event) {
            if ($today->lt($event->tanggal_mulai)) {
                $event->status_event = 'Segera Datang';
            } elseif ($today->between($event->tanggal_mulai, $event->tanggal_selesai)) {
                $event->status_event = 'Sedang Berlangsung';
            } else {
                $event->status_event = 'Selesai';
            }

            // Simpan hanya jika status berubah
            if ($event->isDirty('status_event')) {
                $event->save();
            }
        }
    }

    public function insertEvent(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_event' => 'required|string|min:10',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'date|nullable',
            'keterangan' => 'string|nullable',
            'gambar_event' => 'required|image|mimes:jpeg,jpg,png|max:50000',
        ]);



        // Menyimpan data ke database
        $event = new Event();
        $event->nama_event = $request->nama_event;
        $event->tanggal_mulai = $request->tanggal_mulai;
        $event->tanggal_selesai = $request->tanggal_selesai;
        $event->keterangan = $request->keterangan;
        $event->gambar_event = $request->file('gambar_event')->store('Events', 'public');
        
        $today = now()->toDateString();
        if ($today < $event->tanggal_mulai) {
            $event->status_event = 'Segera Datang';
        } elseif ($today >= $event->tanggal_mulai && $today <= $event->tanggal_selesai) {
            $event->status_event = 'Sedang Berlangsung';
        } else {
            $event->status_event = 'Selesai';
        }

        $event->save();

        return redirect()->back()->with('success', 'Data Event berhasil ditambahkan');
    }


    public function destroy($id)
    {
        // Cari data event berdasarkan ID
        $event = Event::findOrFail($id);

        // Cek apakah ada gambar yang terkait dengan event dan file tersebut ada di penyimpanan
        if ($event->gambar_event && Storage::exists('public/Events/' . $event->gambar_event)) {
        // Hapus gambar dari penyimpanan
        Storage::delete('public/Events/' . $event->gambar_event);
        }

        // Hapus data event
        $event->delete();

        // Redirect kembali ke halaman event dengan pesan sukses
        return redirect()->back()->with('success', 'Data Event berhasil dihapus');
    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_event' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'keterangan' => 'required|string',
            'gambar_event' => 'nullable|image|max:50000',
        ]);

        // Temukan event berdasarkan ID
        $event = Event::findOrFail($id);

        // Update data event
        $event->nama_event = $request->nama_event;
        $event->tanggal_mulai = $request->tanggal_mulai;
        $event->tanggal_selesai = $request->tanggal_selesai;
        $event->keterangan = $request->keterangan;

        // Check if new image file is uploaded
        if ($request->hasFile('gambar_event')) {
            // Hapus gambar lama jika ada
            if ($event->gambar_event && Storage::exists('public/' . $event->gambar_event)) {
                Storage::delete('public/' . $event->gambar_event);
            }

            // Upload gambar baru
            $fileName = time() . '.' . $request->gambar_event->extension();
            $request->gambar_event->storeAs('public/Events', $fileName);
            $event->gambar_event = 'Events/' . $fileName;
        }

        // Update status event berdasarkan tanggal
        $today = now()->toDateString();
        if ($today < $event->tanggal_mulai) {
            $event->status_event = 'Segera Datang';
        } elseif ($today >= $event->tanggal_mulai && $today <= $event->tanggal_selesai) {
            $event->status_event = 'Sedang Berlangsung';
        } else {
            $event->status_event = 'Selesai';
        }

        // Simpan perubahan
        $event->save();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data event berhasil diupdate.');
    }
}
