<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $categories)
    {
        $categories = Category::all();
        $category = new Category();
        return view('admin.categories')->with(['categories' => $categories, 'category' => $category]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $category = new Category;
        $category->category_url = Str::slug($request->name);
        $category->fill($request->all())->save();
        return redirect()->route('admin.category.index')
            ->with(['success' => 'Категория добавлена!']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.categories')->with(['categories' => $categories, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Category $categories, Request $request)
    {
        $category = $categories->find($request->id);
        $category['category_url'] = Str::slug($request->name);
        $category->fill($request->except('_token'))->save();

        return redirect()->route('admin.category.index')->with('success', 'Категория изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Категория удалена');
    }
}
