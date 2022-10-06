<?php

namespace App\Interfaces\Web;

use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;
use Illuminate\Http\Request;

interface InvoiceRepositoryInterface
{

    public function index($id);

    public function payMoneyToSupplier(InvoiceRequest $request, $id);

    public function edit(Invoice $invoice);

    public function update(InvoiceRequest $request, Invoice $invoice);

    public function forceDelete(Invoice $invoice);


}
