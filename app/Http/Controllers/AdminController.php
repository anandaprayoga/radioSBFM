<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Admin::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nama_admin', 'like', "%{$search}%");
        }

        $admins = $query->paginate(5);

        return view('admin.admin', compact('admins'));
    }

    public function insertAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|min:5|max:25',
            'nama_admin' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:50', Rule::unique('admins')],
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
            'about_me' => 'nullable|string|max:255',
            'peran' => 'required|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,jpg,png|max:50000',
        ]);

        $hashedPassword = Hash::make($request->input('password')); // Menggunakan Hash::make

        $admin = new Admin();
        $admin->username = $request->username;
        $admin->password = $hashedPassword;
        $admin->nama_admin = $request->nama_admin;
        $admin->email = $request->email;
        $admin->no_hp = $request->no_hp;
        $admin->alamat = $request->alamat;
        $admin->about_me = $request->about_me;
        $admin->peran = $request->peran;
        if ($request->hasFile('profile_image')) {
            $admin->profile_image = $request->file('profile_image')->store('Admin', 'public');
        }

        $admin->save();

        return redirect()->back()->with('success', 'Data Admin berhasil ditambahkan');
    }


    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        $admin->delete();

        return redirect()->back()->with('success', 'Data Admin berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'nullable|min:5|max:25',
            'nama_admin' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
            'about_me' => 'nullable|string|max:255',
            'peran' => 'required|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,jpg,png|max:50000',
        ]);

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->input('password')); // Menggunakan Hash::make
        }

        $admin->username = $request->username;
        $admin->nama_admin = $request->nama_admin;
        $admin->email = $request->email;
        $admin->no_hp = $request->no_hp;
        $admin->alamat = $request->alamat;
        $admin->about_me = $request->about_me;
        $admin->peran = $request->peran;

        if ($request->hasFile('profile_image')) {
            if ($admin->profile_image && Storage::exists('public/' . $admin->profile_image)) {
                Storage::delete('public/' . $admin->profile_image);
            }

            $fileName = time() . '.' . $request->profile_image->extension();
            $request->profile_image->storeAs('public/Admin', $fileName);
            $admin->profile_image = 'Admin/' . $fileName;
        }

        $admin->save();

        return redirect()->back()->with('success', 'Data Admin berhasil diubah');
    }
}
