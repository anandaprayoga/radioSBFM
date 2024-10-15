<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Broadcaster;

class HomeController extends Controller
{
    public function index()
    {
        $broadcaster = Broadcaster::count();
        $informasi = Informasi::count();
        return view('admin.dashboard', compact('broadcaster','informasi'));
    }
}
