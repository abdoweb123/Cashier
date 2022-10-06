<?php

namespace App\Interfaces\Web;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

interface SupplierRepositoryInterface
{


    public function index(Request $request);

    public function trashedProducts();

    public function backFromSoftDelete($id);

    public function deleteForever($id);

    public function create();

    public function store(SupplierRequest $request);


    public function edit(Supplier $supplier);

    public function update(SupplierRequest $request, Supplier $supplier);

    public function destroy(Supplier $supplier);

    public function softDelete($id);

    public function showProductOfSupplier(Request $request ,$id);






}
