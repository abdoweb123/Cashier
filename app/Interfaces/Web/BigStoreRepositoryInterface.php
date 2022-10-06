<?php

namespace App\Interfaces\Web;

use App\Http\Requests\BigStoreRequestStore;
use App\Http\Requests\BigStoreRequestUpdate;
use App\Models\BigStore;
use Illuminate\Http\Request;

interface BigStoreRepositoryInterface
{

    public function index(Request $request);

    public function create();

    public function store(BigStoreRequestStore $request);

    public function edit(BigStore $product_ForAdmin);

    public function update(BigStoreRequestUpdate $request, BigStore $product_ForAdmin);

    public function destroy(BigStore $product_ForAdmin);

    public function softDelete($id);


    public function backFromSoftDelete($id);

    public function deleteForever($id);


}
