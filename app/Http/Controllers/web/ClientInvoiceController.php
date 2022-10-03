<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientInvoiceRequest;
use App\Interfaces\ClientInvoiceRepositoryInterface;
use App\Models\clientInvoice;
use Illuminate\Http\Request;

class ClientInvoiceController extends Controller
{

    private $clientInvoiceRepositoryInterface;


    public function __construct(ClientInvoiceRepositoryInterface $clientInvoiceRepositoryInterface)
    {
        $this->clientInvoiceRepositoryInterface = $clientInvoiceRepositoryInterface;
    }



    public function index($id)
    {
       return $this->clientInvoiceRepositoryInterface->index($id);
    }



    public function getMoneyFromClient(ClientInvoiceRequest $request)
    {
        return $this->clientInvoiceRepositoryInterface->getMoneyFromClient($request);
    }



    public function edit(clientInvoice $clientInvoice)
    {
        return $this->clientInvoiceRepositoryInterface->edit($clientInvoice);
    }



    public function update(ClientInvoiceRequest $request, clientInvoice $clientInvoice)
    {
        return $this->clientInvoiceRepositoryInterface->update($request,$clientInvoice);
    }



    public function forceDelete(clientInvoice $clientInvoice)
    {
        return $this->clientInvoiceRepositoryInterface->forceDelete($clientInvoice);
    }


}
