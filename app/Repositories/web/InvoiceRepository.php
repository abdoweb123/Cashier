<?php

namespace App\Repositories\web;

use App\Http\Requests\InvoiceRequest;
use App\Interfaces\InvoiceRepositoryInterface;
use App\Models\Invoice;
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;

class InvoiceRepository implements InvoiceRepositoryInterface
{


    public function index($id)
    {
        $supplierName  = Supplier::find($id)->name;
        $invoices = Invoice::where('supplier_id',$id)->latest()->paginate(page);
        return view('invoices.index', compact('invoices','supplierName','id'));
    }



    public function payMoneyToSupplier(InvoiceRequest $request, $id)
    {
        $supplier = Supplier::find($id);

        $makePayment = Invoice::create([
            'paid_all'     => $request['paid_all'],
            'supplier_id'  => $id,
            'paid_notes'   => $request['paid_notes'],
            'paid_date'    => $request['paid_date'],
        ]);
        return redirect()->back()->with('success','Payment is added successfully');
    }



    public function edit(Invoice $invoice)
    {
        return view('invoices.edit', compact('invoice'));
    }



    public function update(InvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update([
            'paid_all'     => $request['paid_all'],
            'supplier_id'  => $request['supplier_id'],
            'paid_notes'   => $request['paid_notes'],
            'paid_date'    => $request['paid_date'],
        ]);

        return redirect()->route('invoices.index', $invoice->supplier_id)->with('success','Payment is updated successfully');
    }



    public function forceDelete(Invoice $invoice)
    {
        $invoice->forceDelete();
        return redirect()->route('invoices.index', $invoice->supplier_id)->with('success','Payment is deleted successfully');
    }




}
