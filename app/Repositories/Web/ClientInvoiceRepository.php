<?php

namespace App\Repositories\Web;

use App\Http\Requests\ClientInvoiceRequest;
use App\Interfaces\Web\ClientInvoiceRepositoryInterface;
use App\Models\Client;
use App\Models\clientInvoice;
use Illuminate\Support\Facades\Validator;

class ClientInvoiceRepository implements ClientInvoiceRepositoryInterface
{

    public function index($id)
    {
        $clientName = Client::find($id)->name;
        $clientInvoices = clientInvoice::where('client_id',$id)->latest()->paginate(page);

        return view('clientInvoices.index', compact('clientName','clientInvoices','id'));
    }



    public function getMoneyFromClient(ClientInvoiceRequest $request)
    {

        $makePayment = clientInvoice::create([
            'paid_all'          => $request['paid_all'],
            'client_id'         => $request['client_id'],
            'paid_notes'        => $request['paid_notes'],
            'paid_date'         => $request['paid_date'],
        ]);

        return redirect()->back()->with('success','Payment is added successfully');
    }



    public function edit(clientInvoice $clientInvoice)
    {
        return view('clientInvoices.edit', compact('clientInvoice'));
    }



    public function update(ClientInvoiceRequest $request, clientInvoice $clientInvoice)
    {
        $clientInvoice->update([
            'paid_all'          => $request['paid_all'],
            'client_id'         => $request['client_id'],
            'paid_notes'        => $request['paid_notes'],
            'paid_date'         => $request['paid_date'],
        ]);

        return redirect()->route('invoices.client.index', $clientInvoice->client_id)->with('success','Payment is updated successfully');
    }



    public function forceDelete(clientInvoice $clientInvoice)
    {
        $clientInvoice->forceDelete();
        return redirect()->back()->with('success','Payment is deleted successfully');
    }




}
