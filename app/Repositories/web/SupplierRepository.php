<?php

namespace App\Repositories\web;

use App\Http\Requests\SupplierRequest;
use App\Interfaces\SupplierRepositoryInterface;
use App\Models\Invoice;
use App\Models\Store;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierRepository implements SupplierRepositoryInterface
{


    public function index(Request $request)
    {
        if ($request->has('input_search')){
            $suppliers = Supplier::where('name', 'LIKE' ,'%'. $request->input_search . '%')->paginate(page);
        }
        else{
            $suppliers = Supplier::latest()->paginate(page);
        }
        return view('supplier.index', compact('suppliers'));
    }



    public function trashedProducts()
    {
        $suppliers = Supplier::onlyTrashed()->latest()->paginate(4);
        return view('supplier.trashed', compact('suppliers'));
    }



    public function backFromSoftDelete($id)
    {
        $suppliers = Supplier::onlyTrashed()->where('id', $id)->first()->restore();
        return redirect()->route('suppliers.index')
            ->with('success','supplier is back successfully');
    }



    public function deleteForever($id)
    {
        $suppliers = Supplier::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('supplier.trash')
            ->with('success','supplier is deleted successfully');
    }



    public function create()
    {
        return view('supplier.create');
    }



    public function store(SupplierRequest $request)
    {
        $data = $request->all();

        $product = Supplier::create($data);
        return redirect()->route('suppliers.index')->with('success','supplier is created successfully');
    }



    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }



    public function update(SupplierRequest $request, Supplier $supplier)
    {
        $data = $request->all();

        $supplier->update($data);

        return redirect()->route('suppliers.index')
            ->with('success','supplier is updated successfully');

    }



    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success','supplier is deleted successfully');
    }



    public function softDelete($id)
    {
        $product = Supplier::find($id)->delete();
        return redirect()->route('suppliers.index')->with('success','supplier is deleted successfully');

    }



    public function showProductOfSupplier(Request $request ,$id)
    {
        $suppliersProducts = Supplier::find($id)->store;
        $sumProducts = Store::where('supplier_id',$id);
        $sumPayments = Invoice::where('supplier_id',$id)->sum('paid_all');
        $supplierName      = Supplier::find($id)->where('id',$id)->get();

        if ($request->has('input_search')){
            $suppliersProducts = Store::where('supplier_id',$id)->where('product_name','LIKE','%'.$request->input_search .'%')->paginate(page);
        }
        else{
            $suppliersProducts = Store::where('supplier_id',$id)->paginate(page);
        }
        return view('supplier.productsOfSupplier', compact('supplierName','suppliersProducts','id','sumProducts','sumPayments'));
    }



}
