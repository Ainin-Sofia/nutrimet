<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function getLogin() {
        return view('auth.login');
    }

    function postLogin(Request $request): RedirectResponse {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/home')->with('login', "Sukses melakukan login!");
        }

        return back()->with('failed', "Gagal melakukan login!")->withInput();
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

    function getLogout(Request $request): RedirectResponse {
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect('/');
    }
}
