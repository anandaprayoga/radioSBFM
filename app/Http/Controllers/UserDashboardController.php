<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Informasi;
use App\Models\Kategori;

class UserDashboardController extends Controller
{
    public function indexUser()
    {
        // Ambil semua data event dengan status 'Segera Datang' dan 'Sedang Berlangsung'
        $events = Event::whereIn('status_event', ['Segera Datang', 'Sedang Berlangsung'])->get();

        // Ambil 4 berita terbaru
        $informasis = Informasi::with('kategori')->orderBy('created_at', 'desc')->take(4)->get();

        // Kirim data event dan informasi ke view
        return view('visitor.dashboard', compact('events', 'informasis'));
    }
    public function detailInformasi($id)
    {
        // Ambil detail berita berdasarkan ID
        $informasi = Informasi::with('kategori')->findOrFail($id);

        // Kirim data ke view detail
        return view('visitor.berita', compact('informasi'));
    }

}
