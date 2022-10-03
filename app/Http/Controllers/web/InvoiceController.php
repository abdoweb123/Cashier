<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceRequest;
use App\Interfaces\InvoiceRepositoryInterface;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    private $invoiceRepositoryInterface;


    public function __construct(InvoiceRepositoryInterface $invoiceRepositoryInterface)
    {
        $this->invoiceRepositoryInterface = $invoiceRepositoryInterface;
    }



    public function index($id)
    {
       return  $this->invoiceRepositoryInterface->index($id);
    }



    public function payMoneyToSupplier(InvoiceRequest $request, $id)
    {
        return  $this->invoiceRepositoryInterface->payMoneyToSupplier($request,$id);
    }



    public function edit(Invoice $invoice)
    {
        return  $this->invoiceRepositoryInterface->edit($invoice);
    }


    public function update(InvoiceRequest $request, Invoice $invoice)
    {
        return  $this->invoiceRepositoryInterface->update($request,$invoice);
    }


    public function forceDelete(Invoice $invoice)
    {
        return  $this->invoiceRepositoryInterface->forceDelete($invoice);
    }


}
