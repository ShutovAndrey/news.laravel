<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\News;
use App\Category;
use DB;

class NewsController
{
    public function index() {
        $news=News::query()->paginate(3);
        return view('news.all')->with('news', $news);
    }

    public function show(News $news) {
        return view('news.newsOne')->with('news', $news);
    }

    public function categoryNews($name) {
      //  return view('news.all')->with('news', News::getNewsByCategoryName($name));
       $category = Category::query()->where('category_url', 'sport');
        return view('news.all')->with('news', $category);
    }

}
