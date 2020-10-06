<?php

namespace App\Http\Controllers\Admin\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
    public function add(Request $request)
    {
        $news = News::getNews();
        $next = [];
        $next['id'] = end($news)['id'] + 1;
        if ($request->isMethod('post')) {
            $requestArray = $request->except('_token');
            $nextNews[] = array_merge($next, $requestArray);
            dump($nextNews);
            // перезаписывает ((
            \File::put(storage_path() . '\news.json', json_encode($nextNews, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
        return view('admin.add');
    }

    public function test2()
    {
        return view('admin.test2');
    }


}

