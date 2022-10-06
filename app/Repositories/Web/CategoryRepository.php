<?php

namespace App\Repositories\Web;

use App\Interfaces\Web\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }


    public function create()
    {
        return view('category.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);

        Category::create($request->all());
        return redirect()->route('category.index');
    }



    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $category->update($request->all());
        return redirect()->route('category.index');
    }


    public function forceDelete($id)
    {
        $category = Category::findOrFail($id)->forceDelete();
        return redirect()->route('category.index');
    }

}//end of class
