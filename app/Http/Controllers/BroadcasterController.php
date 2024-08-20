<?php

namespace App\Http\Controllers;

use App\Models\Broadcaster;

use Illuminate\View\View;
use Illuminate\Http\Request;

class BroadcasterController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get broadcaster
        $broadcaster = Broadcaster::latest()->paginate(5);

        //render view with broadcaster
        return view('admin.broadcaster', compact('broadcaster'));
    }
}
