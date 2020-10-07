<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\News;

class NewsController
{
    public function index() {
     //   $arr = News::getNews();
    //   \File::put(storage_path() . '\news.json' , json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        return view('news.all')->with('news', News::getNews());
    }

    public function show($id) {
        return view('news.newsOne')->with('news', News::getNewsId($id));
    }

    public function categoryNews($name) {
        return view('news.all')->with('news', News::getNewsByCategoryName($name));
    }

}
