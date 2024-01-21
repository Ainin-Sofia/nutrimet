<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // $validated = $request->validate([
        //     'profile_picture' => 'image|file|max:3024',
        //     'nama' => 'required',
        //     'tanggal_lahir' => 'required'
        // ]);

        dd($request);

        // return $request->file('profile_picture')->store('public/profile_picture');
    }
}
