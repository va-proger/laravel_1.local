<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactPostController extends Controller
{
    public function index()
    {
        return view('contacts');

    }
}
