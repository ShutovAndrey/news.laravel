<?php

namespace App\Http\Controllers;

use File;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {

        return view('index');

    }

    public function contacts()
    {
        return view('contacts');
    }

    public function about()
    {
        return view('about');
    }
}
