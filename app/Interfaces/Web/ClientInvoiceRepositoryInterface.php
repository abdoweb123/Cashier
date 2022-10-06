<?php

namespace App\Interfaces\Web;

use App\Http\Requests\ClientInvoiceRequest;
use App\Models\clientInvoice;
use Illuminate\Http\Request;

interface ClientInvoiceRepositoryInterface
{

    public function index($id);

    public function getMoneyFromClient(ClientInvoiceRequest $request);

    public function edit(clientInvoice $clientInvoice);

    public function update(ClientInvoiceRequest $request, clientInvoice $clientInvoice);

    public function forceDelete(clientInvoice $clientInvoice);


}
