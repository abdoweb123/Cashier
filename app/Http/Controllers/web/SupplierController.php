<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Interfaces\SupplierRepositoryInterface;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{


    private $supplierRepositoryInterface;


    public function __construct(SupplierRepositoryInterface $supplierRepositoryInterface)
    {
        $this->supplierRepositoryInterface = $supplierRepositoryInterface;
    }


    public function index(Request $request)
    {
        return $this->supplierRepositoryInterface->index($request);
    }



    public function trashedProducts()
    {
        return $this->supplierRepositoryInterface->trashedProducts();
    }



    public function backFromSoftDelete($id)
    {
        return $this->supplierRepositoryInterface->backFromSoftDelete($id);
    }



    public function deleteForever($id)
    {
        return $this->supplierRepositoryInterface->deleteForever($id);
    }



    public function create()
    {
        return $this->supplierRepositoryInterface->create();
    }



    public function store(SupplierRequest $request)
    {
        return $this->supplierRepositoryInterface->store($request);
    }



    public function edit(Supplier $supplier)
    {
        return $this->supplierRepositoryInterface->edit($supplier);
    }



    public function update(SupplierRequest $request, Supplier $supplier)
    {
        return $this->supplierRepositoryInterface->update($request,$supplier);
    }



    public function destroy(Supplier $supplier)
    {
        return $this->supplierRepositoryInterface->destroy($supplier);
    }



    public function softDelete($id)
    {
        return $this->supplierRepositoryInterface->softDelete($id);
    }



    public function showProductOfSupplier(Request $request ,$id)
    {
        return $this->supplierRepositoryInterface->showProductOfSupplier($request,$id);
    }



}
