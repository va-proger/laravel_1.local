<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutPostController extends Controller
{
    public function index()
    {
        return view('about');

    }
}
