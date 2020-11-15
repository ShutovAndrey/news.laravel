<?php

namespace App\Http\Controllers;

use App\News;

class HomeController extends Controller
{

    public function index()
    {
        $allNews = News::all();
        $news = $allNews->random(11);
        foreach ($news as $item) {
            $item->text = substr($item->text, 0, 250) . "… ";
        }
        return view('index')->with(
            [
                'news' => $news,
            ]);

    }

}
