<?php

namespace App\Http\Controllers;

use App\News;

class HomeController extends Controller
{

    public function index()
    {
        $allNews = News::all();
        if (count($allNews)){
        $news = $allNews->random(11);
        foreach ($news as $item) {
            $item->text = substr($item->text, 0, 250) . "… ";
        }} else{
            $news = null;
        }
        return view('index')->with(
            [
                'news' => $news,
            ]);

    }

}
