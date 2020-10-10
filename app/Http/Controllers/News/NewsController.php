<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\News;
use DB;

class NewsController
{
    public function index() {
        $news=DB::table('news')->get();
        return view('news.all')->with('news', $news);
    }

    public function show($id) {
        //$news=DB::table('news')->where('id', '=', $id)->first();
        $news=DB::table('news')->find($id);
        //dd($news);
        return view('news.newsOne')->with('news', $news);
    }

    public function categoryNews($name) {
        return view('news.all')->with('news', News::getNewsByCategoryName($name));
    }

}
