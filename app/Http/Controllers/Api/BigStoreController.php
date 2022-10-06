<?php

namespace App\Http\Controllers\Api;



use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CheckApi;
use App\Http\Requests\BigStoreRequestStore;
use App\Http\Requests\BigStoreRequestUpdate;
use App\Http\Resources\BigStoreResource;
use App\Interfaces\Api\BigStoreRepositoryInterface;
use App\Models\BigStore;
use App\Models\Store;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BigStoreController extends Controller
{

    use CheckApi;

    private $bigStoreRepositoryInterface;

    public function __construct(BigStoreRepositoryInterface $bigStoreRepositoryInterface)
    {
        $this->bigStoreRepositoryInterface = $bigStoreRepositoryInterface;
    }



    public function index(Request $request)
    {
        return $this->bigStoreRepositoryInterface->index($request);
    }



    public function store(BigStoreRequestStore $request)
    {
        return $this->bigStoreRepositoryInterface->store($request);
    }



    public function show($id)
    {
        return $this->bigStoreRepositoryInterface->show($id);
    }



    public function update(BigStoreRequestUpdate $request, $id)
    {
        return $this->bigStoreRepositoryInterface->update($request,$id);
    }



    public function softDelete($id)
    {
        return $this->bigStoreRepositoryInterface->softDelete($id);
    }



    public function trashedProducts()
    {
        return $this->bigStoreRepositoryInterface->trashedProducts();
    }



    public function backFromSoftDelete($id)
    {
        return $this->bigStoreRepositoryInterface->backFromSoftDelete($id);
    }



    public function deleteForever($id)
    {
        return $this->bigStoreRepositoryInterface->deleteForever($id);
    }


} //end of class

