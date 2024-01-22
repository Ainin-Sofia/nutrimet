<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Livewire\CekRiwayat;
use App\Livewire\PreMetabolicSyndrome as LivewirePreMetabolicSyndrome;
use App\Livewire\StatusGizi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->middleware('guest');

Route::get('/register', [AuthController::class, 'getRegister'])->middleware('guest');
Route::post('/register', [AuthController::class, 'postRegister']);

Route::get('/login', [AuthController::class, 'getLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'postLogin']);

Route::get('/logout', [AuthController::class, 'getLogout'])->middleware('auth');

Route::get('/lupa_password', [AuthController::class, 'getLupaPassword'])->middleware('guest');
Route::post('/lupa_password', [AuthController::class, 'postLupaPassword']);

Route::post('/password_baru', [AuthController::class, 'passwordBaru']);

Route::get('home', [HomeController::class, 'index'])->middleware('auth');
Route::get('/cek_status_gizi', StatusGizi::class)->middleware('auth');
Route::get('/cek_pms', LivewirePreMetabolicSyndrome::class)->middleware('auth');

Route::get('/pengaturan_akun', [HomeController::class, 'pengaturanAkun'])->middleware('auth');
Route::post('/pengaturan_akun', [HomeController::class, 'storeAkun'])->middleware('auth');

Route::get('/cek_riwayat', CekRiwayat::class)->middleware('auth');

Route::get('/cek_riwayat/status_gizi/{id}', [HomeController::class, 'cekDetail'])->middleware('auth');
