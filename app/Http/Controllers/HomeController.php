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
        $arr = (array)(\File::get(storage_path() . '\news.json'));
        $el = [];
        /*foreach ($arr as $item) {
            $el[] = (array)$item;
        }*/
        dump($arr);
        dump(gettype($arr));
        // dump( \File::get(storage_path() . '\news.json'));
        return view('about');
    }
}
