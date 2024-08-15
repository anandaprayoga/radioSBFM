<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('session.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('admins', 'email')],
            'password' => ['required', 'min:5', 'max:20']
        ]);
        $attributes['password'] = bcrypt($attributes['password'] );

        

        session()->flash('success', 'Your account has been created.');
        $admin = Admin::create($attributes);
        Auth::login($admin); 
        return redirect('/admin/dashboard');
    }
}
