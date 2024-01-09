<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
 
        $user->nama = $request->nama_lengkap;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->password = $request->password;
        $user->gambar = "gambar.png";
 
        $user->save();
 
        return redirect('/login')->with('status', "Akun Berhasil Dibuat!");
    }

    function getLogout(Request $request): RedirectResponse {
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect('/');
    }

    function getLupaPassword() {
        return view('auth.lupa_password');
    }

    function postLupaPassword(Request $request) {
        $user_check = User::where('email', '=', $request->email)->where('tanggal_lahir', '=', $request->tanggal_lahir)->get();
        
        if ($user_check == "[]") {
            return redirect()->back()->with('no_user', "User tidak ditemukan!");
        } else {
            return view('auth.password_baru', ['user_check' => $user_check]);   
        }
        
    }

    function passwordBaru(Request $request): RedirectResponse {
        $user = DB::table('users')->where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        return redirect('/login')->with('status', "Berhasil merubah password!");
    }
}
