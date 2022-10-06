<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\BigStoreRequestStore;
use App\Http\Requests\BigStoreRequestUpdate;
use App\Interfaces\Web\BigStoreRepositoryInterface;
use App\Models\BigStore;
use Illuminate\Http\Request;

class BigStoreController extends Controller
{



    private $bigStoreRepositoryInterFace;


    public function __construct(BigStoreRepositoryInterface $bigStoreRepositoryInterFace)
    {
        $this->bigStoreRepositoryInterFace = $bigStoreRepositoryInterFace;

    }



    public function index(Request $request)
    {
       return $this->bigStoreRepositoryInterFace->index($request);
    }


    public function create()
    {
        return $this->bigStoreRepositoryInterFace->create();
    }


    public function store(BigStoreRequestStore $request)
    {
        return $this->bigStoreRepositoryInterFace->store($request);
    }



    public function edit(BigStore $product_ForAdmin)
    {
        return $this->bigStoreRepositoryInterFace->edit($product_ForAdmin);
    }


    public function update(BigStoreRequestUpdate $request, BigStore $product_ForAdmin)
    {
        return $this->bigStoreRepositoryInterFace->update($request,$product_ForAdmin);
    }


    public function destroy(BigStore $product_ForAdmin)
    {
        return $this->bigStoreRepositoryInterFace->destroy($product_ForAdmin);
    }


    public function softDelete($id)
    {
        return $this->bigStoreRepositoryInterFace->softDelete($id);

    }



    public function backFromSoftDelete($id)
    {
        return $this->bigStoreRepositoryInterFace->backFromSoftDelete($id);
    }


    public function deleteForever($id)
    {
        return $this->bigStoreRepositoryInterFace->deleteForever($id);
    }



}
