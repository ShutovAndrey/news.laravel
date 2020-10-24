<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Category;

class CategoryController extends Controller
{
    public function index(Category $categories){
        $categories = Category::all();
        $category = new Category();
        return view('admin.categories')->with(['categories' => $categories, 'category'=> $category]);
    }

    public function edit (Category $category){
        $categories = Category::all();
        return view('admin.categories')->with(['categories' => $categories, 'category'=> $category]);
    }

    public function destroy (Category $category){
        $category->delete();   //продумать и допилить, ругается на oreign key
        return redirect()->route('admin.category.index')->with('success', 'Категория удалена');
    }

    public function update (Category $categories, Request $request){
        $category = $categories->find($request->id);
        $category['category_url']= Str::slug($request->name);
       $category->fill($request->except('_token'))->save();

        return redirect()->route('admin.category.index')->with('success', 'Категория изменена');
    }

}
