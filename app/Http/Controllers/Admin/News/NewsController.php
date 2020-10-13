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
    public function index(News $news){
        $news=News::query()->paginate(8);
        return view('admin.news')->with('news', $news);
    }

    public function destroy (News $news){
        $news->delete();
        return redirect()->route('admin.index')->with('success', 'Новость удалена');
    }

    public function edit (News $news){
        return view('admin.add', [
            'news'=> $news,
            'categories' => Category::all()
        ]);
    }

    public function update (News $news, Request $request){
        $url = null;
        if ($request->file('image')) {
            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
        }

        $news->image = $url;
        $news->fill($request->except('image'))->save();
        return redirect()->route('admin.add', $news->id)
            ->with(['success' => 'Новость изменена!']);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $requestArray = $request->except('_token', 'category_id');

            $url = null;
            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
            }

            $news=new News;
            $news->image = $url;
            $news->fill($request->except('image'))->save();

           // $id = DB::table('news')->insertGetId($news);
            return redirect()->route('admin.add', $news->id)
                ->with(['success' => 'Новость добавлена!', 'id' => $news->id]);
        }

        return view('admin.add', [
            'categories' => Category::all(),
            'news' => new News(),
        ]);
    }

}

