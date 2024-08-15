<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class InfoUserController extends Controller
{
    public function create()
    {
        return view('/admin/user-profile');
    }

    public function store(Request $request)
    {
        // Validasi input
        $attributes = $request->validate([
            // 'username' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('admins')->ignore(Auth::user()->id)],
            'nama_admin' => ['max:150'],
            'no_hp' => ['max:50'],
            'alamat' => ['max:150'],
            'about_me' => ['max:150'],
        ]);

        // Cek apakah email berubah
        if($request->get('email') != Auth::user()->email)
        {
            if(env('IS_DEMO') && Auth::user()->id == 1)
            {
                return redirect()->back()->withErrors(['msg2' => 'You are in a demo version, you can\'t change the email address.']);
            }
        }

        // Update admin
        Admin::where('id', Auth::user()->id)
            ->update([
                // 'username' => $attributes['username'],
                'email' => $attributes['email'],
                'nama_admin' => $attributes['nama_admin'],
                'no_hp' => $attributes['no_hp'],
                'alamat' => $attributes['alamat'],
                'about_me' => $attributes['about_me'],
            ]);

        return redirect('/admin/user-profile')->with('success', 'Profile updated successfully');
    }
}

