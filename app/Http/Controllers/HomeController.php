<?php

namespace App\Http\Controllers;

use App\News;

class HomeController extends Controller
{

    public function index()
    {
        return view('index')->with(
            [
                'news'=> News::take(10)->get()->toArray(),

            ]);

    }

}
