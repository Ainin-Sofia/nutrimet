<?php

use App\Http\Controllers\AuthController;
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
});

Route::get('/status_gizi', [StatusGiziController::class, 'index']);

Route::get('/register', [AuthController::class, 'getRegister']);
Route::get('/login', [AuthController::class, 'getLogin']);
