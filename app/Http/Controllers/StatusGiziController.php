<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusGiziController extends Controller
{
    function index() {
        return view('status_gizi.index');
    }
}
