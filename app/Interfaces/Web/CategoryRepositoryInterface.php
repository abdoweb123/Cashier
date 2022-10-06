<?php

namespace App\Interfaces\Web;

use App\Models\Category;
use Illuminate\Http\Request;

interface CategoryRepositoryInterface
{
    public function index();

    public function create();

    public function store(Request $request);

    public function edit(Category $category);

    public function update(Request $request, Category $category);

    public function forceDelete($id);

}
