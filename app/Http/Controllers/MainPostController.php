<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainPostController extends Controller
{
    public function index()
    {
        return view('main');

    }
}
