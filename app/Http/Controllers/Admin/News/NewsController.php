<?php

namespace App\Http\Controllers\Admin\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\News;
use App\Category;
use DB;

class NewsController extends Controller
{
    public function add(Request $request)
    {
        // $request->flash();
        if ($request->isMethod('post')) {
            $requestArray = $request->except('_token', 'category_id');
           // dd($requestArray);  category_id нет

            $url = null;
            if ($request->file('image')){
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
            }

            $news = [
                'title' => $requestArray['title'],
                'image' => $requestArray['image'],
                'text' => $requestArray['text'],
                'private' => isset($requestArray['private']),
      //          'image'=> $url

            ];

            DB::table('news')->insert($news);
            $id = DB::getPdo()->lastInsertId();

           // \File::put(storage_path() . '\news.json', json_encode($news, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
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

