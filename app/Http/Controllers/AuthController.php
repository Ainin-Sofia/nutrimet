<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function getLogin() {
        return view('auth.login');
    }

    function getRegister() {
        return view('auth.register');
    }

    function postRegister(Request $request): RedirectResponse {
        $user = new User;
 
        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->password = $request->password;
 
        $user->save();
 
        return redirect('/login')->with('status', "Akun Berhasil Dibuat!");
    }
}
