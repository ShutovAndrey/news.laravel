<?php

namespace App\Http\Controllers\Admin\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\News;
use App\Category;

class NewsController extends Controller
{
    public function add(Request $request)
    {
        // $request->flash();
        if ($request->isMethod('post')) {
            $requestArray = $request->except('_token');
            $news = News::getNews();
            $news[] = $requestArray;
           // dd($request->file());
            $url = null;
           /* if ($request->file('image')) {
                $path = \Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
            }*/

            if ($request->image) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
            }

            $id = array_key_last($news);
            $news[$id]['private'] = isset($requestArray['private']);
            $news[$id]['id'] = $id;
            $news[$id]['image'] = $url;

            \File::put(storage_path() . '\news.json', json_encode($news, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            return redirect()->route('admin.add', $id)->with(['success'=> 'Новость добавлена!', 'id' => $id]);
        }
        return view('admin.add'  , [
            'categories' => Category::getCategories()
        ]);
    }

    public function test2()
    {
        return view('admin.test2');
    }


}

