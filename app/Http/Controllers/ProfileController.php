<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function updatePhoto(Request $request)
    {
        // Validasi input file
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:1000',
        ]);

        // Dapatkan user saat ini
        /** @var \App\Models\User $user */
        $user = auth()->user();

        // Jika user memiliki foto lama, hapus file lama
        if ($user->profile_image) {
            Storage::delete($user->profile_image);

            $filePath = $user->profile_image;

            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
        }

        // Simpan file baru
        $path = $request->file('photo')->store('photos', 'public');

        // Update path foto di database
        $user->profile_image = $path;
        $user->save();

        return redirect()->back()->with('success', 'Foto berhasil diperbarui');
    }
}
