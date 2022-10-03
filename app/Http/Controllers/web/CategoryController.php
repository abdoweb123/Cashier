<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private $CategoryRepositoryInterface;


    public function __construct(CategoryRepositoryInterface $CategoryRepositoryInterface)
    {
        return $this->CategoryRepositoryInterface = $CategoryRepositoryInterface;
    }


    public function index()
    {
        return $this->CategoryRepositoryInterface->index();
    }


    public function create()
    {
        return $this->CategoryRepositoryInterface->create();
    }


    public function store(Request $request)
    {
        return $this->CategoryRepositoryInterface->store($request);
    }



    public function edit(Category $category)
    {
        return $this->CategoryRepositoryInterface->edit($category);
    }


    public function update(Request $request, Category $category)
    {
        return $this->CategoryRepositoryInterface->update($request,$category);
    }


    public function forceDelete($id)
    {
        return $this->CategoryRepositoryInterface->forceDelete($id);
    }

}// end of class
