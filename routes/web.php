<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatusGiziController;
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

Route::get('/status_gizi', [StatusGiziController::class, 'index'])->middleware('auth');

Route::get('/register', [AuthController::class, 'getRegister'])->middleware('guest');
Route::post('/register', [AuthController::class, 'postRegister']);
Route::get('/login', [AuthController::class, 'getLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'postLogin']);
Route::get('/logout', [AuthController::class, 'getLogout'])->middleware('auth');

Route::get('home', [HomeController::class, 'index'])->middleware('auth');
