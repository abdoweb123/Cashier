<?php

namespace App\Repositories\web;

use App\Http\Requests\ClientRequest;
use App\Interfaces\ClientRepositoryInterface;
use App\Models\Client;
use App\Models\clientInvoice;
use App\Models\Sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientRepository implements ClientRepositoryInterface
{

    public function index(Request $request)
    {
        if ($request->has('input_search')){
            $client = Client::where('name', 'LIKE' ,'%'. $request->input_search . '%')->paginate(page);
        }
        else{
            $client = Client::latest()->paginate(page);
        }

        return view('client.index', compact('client'));
    }



    public function create()
    {
        return view('client.create');
    }



    public function store(ClientRequest $request)
    {
        $data = $request->all();
        $client = Client::create($data);

        return redirect()->route('clients.index')
            ->with('success','client is created successfully');
    }



    public function edit(Client $client)
    {
        return view('client.edit', compact('client'));
    }



    public function update(ClientRequest $request, Client $client)
    {
        $data = $request->all();
        $client->update($data);

        return redirect()->route('clients.index')
            ->with('success','client is updated successfully');
    }



    public function softDelete($id)
    {
        $client = Client::find($id)->delete();
        return redirect()->route('clients.index')->with('success','product is deleted successfully');
    }



    public function trashed()
    {
        $client = Client::onlyTrashed()->latest()->paginate(7);
        return view('client.trashed', compact('client'));
    }



    public function backFromSoftDelete($id)
    {
        $client = Client::onlyTrashed()->where('id', $id)->first()->restore();
        return redirect()->route('clients.index')
            ->with('success','client is back successfully');
    }



    public function deleteForever($id)
    {
        $client = Client::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('client.trash')
            ->with('success','product is deleted successfully');
    }



    public function showProductsOfClient(Request $request, $id)
    {
        $clientName = Client::find($id)->name;
        $sumPayments = clientInvoice::where('client_id',$id)->sum('paid_all');
        $sumSells = Sell::where('client_id',$id);

        if ($request->has('input_search'))
        {

            $productsOfClient = Sell::where('client_id',$id)->where('quantity','LIKE','%'.$request->input_search.'%')->latest()->paginate(page);
        }
        else{
            $productsOfClient = Sell::where('client_id',$id)->latest()->paginate(page);
        }
        return view('client.productsOfClient', compact('productsOfClient','clientName','id','sumSells','sumPayments'));
    }



}
