<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorHomeController extends Controller
{
    public function index() {
        return view('visitor/dashboard');
    }
}
