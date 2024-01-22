<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    function index() {
        return view('home');
    }

    function pengaturanAkun() {
        $authenticatedUser = Auth::user();
        return view('pengaturan-akun', compact('authenticatedUser'));
    }

    function storeAkun(Request $request) {
        $updateData = $request->validate([
            'profile_picture'  => 'image|file|max:3024',
            'nama_lengkap' => 'required',
            'tanggal_lahir' => 'required'
        ]);

        if ($request->file('profile_picture')) {
            $updateData['profile_picture'] = $request->file('profile_picture')->store('public/profile_picture/');
            $gambar = $request->file('profile_picture')->hashName();
            Storage::delete('public/profile_picture/' . Auth::user()->gambar);
        } else {
            $gambar = Auth::user()->gambar;
        }

        User::where('id', auth()->user()->id)->update([
            'gambar' => $gambar,
            'nama' => $request->nama_lengkap,
            'tanggal_lahir' => $request->tanggal_lahir
        ]);

            return redirect()->back();
    }
}
