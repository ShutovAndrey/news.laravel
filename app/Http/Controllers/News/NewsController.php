<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\News;
use App\Category;
use App\Comment;
use App\Events\PostHasViewed;


class NewsController
{
    public function index()
    {
        return view('news.all')->with(

            [
                'news' => News::query()->paginate(12),
                'category' => Category::all(),
            ]);
    }

    public function show(News $news)
    {
        event('postHasViewed', $news);
        return view('news.newsOne')->with([
            'news' => $news,
            'comments' => Comment::query()->where('news_id', $news->id)->get()->sortByDesc('created_at')
        ]);
    }

    public function categoryNews($name)
    {
        $category = Category::query()->where('category_url', $name)->first();
        return view('news.all')->with([
            'news' => $category->news()->paginate(8),
            'category' => Category::all()
        ]);
    }


}
