<?php

namespace App\Interfaces\Api;


use App\Http\Requests\BigStoreRequestStore;
use App\Http\Requests\BigStoreRequestUpdate;
use App\Http\Resources\BigStoreResource;
use App\Models\BigStore;
use App\Models\Store;
use Illuminate\Http\Request;

interface BigStoreRepositoryInterface
{

    public function index(Request $request);

    public function store(BigStoreRequestStore $request);

    public function show($id);

    public function update(BigStoreRequestUpdate $request, $id);

    public function softDelete($id);

    public function trashedProducts();

    public function backFromSoftDelete($id);

    public function deleteForever($id);

} //end of class
