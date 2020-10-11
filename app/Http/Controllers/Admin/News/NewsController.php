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
        if ($request->isMethod('post')) {
            $requestArray = $request->except('_token', 'category_id');

            $url = null;
            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
            }

           /* $news = [
                'title' => $requestArray['title'],
                'image' => $url,
                'text' => $requestArray['text'],
                'private' => isset($requestArray['private']),
            ];*/

            $news=new News;
            $news->image = $url;
            $news->fill($request->except('image'))->save();

           // $id = DB::table('news')->insertGetId($news);
            return redirect()->route('admin.add', $news->id)
                ->with(['success' => 'Новость добавлена!', 'id' => $news->id]);
        }

        return view('admin.add', [
            'categories' => Category::all()
        ]);
    }

    public function test2()
    {
        return view('admin.test2');
    }


}

