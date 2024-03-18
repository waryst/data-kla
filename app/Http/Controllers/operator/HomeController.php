<?php

namespace App\Http\Controllers\operator;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('operator.conten.v_home');
    }
}
