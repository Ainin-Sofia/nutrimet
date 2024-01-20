<?php

namespace App\Http\Controllers;

use DateTime;

class HomeController extends Controller
{
    function index() {
        return view('home');
    }
}
