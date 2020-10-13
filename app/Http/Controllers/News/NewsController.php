<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\News;
use App\Category;
use DB;

class NewsController
{
    public function index() {
       // $news=News::query()->paginate(3);
        return view('news.all')->with(
            [
                'news'=> News::query()->paginate(3),
                'category'=>Category::all()
            ]);

        //return view('news.all')->with('news', $news);
    }

    public function show(News $news) {
        return view('news.newsOne')->with('news', $news);
    }

    public function categoryNews($name) {
       $category = Category::query()->where('category_url', $name)->first();
       //dd($category->news);
        return view('news.all')->with([
            'news'=> $category->news(),
            'category'=>Category::all()
        ]);
    }

}
