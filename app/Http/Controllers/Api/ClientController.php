<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CheckApi;
use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use App\Http\Resources\SellResource;
use App\Models\Client;
use App\Models\clientInvoice;
use App\Models\Sell;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    use CheckApi;

    public function index(Request $request)
    {
        try {
            if ($request->has('input_search')){
                $client = ClientResource::collection(Client::where('name', 'LIKE' ,'%'. $request->input_search . '%')->get());
            }
            else{
                $client = ClientResource::collection(Client::all());
            }
        }
         catch (\Exception $exception)
         {
            return $this->returnMessageError($exception->getMessage(),'500');
         }

         return $this->returnMessageData('Data is fetched successfully','200','clients', $client);
    }



    public function store(ClientRequest $request)
    {
        $client = new ClientResource(Client::create($request->all()));

        return $this->returnMessageSuccess('Data is created successfully','200');
    }



    public function update(ClientRequest $request, $id)
    {

        $client = Client::find($id);

        if (!$client)
        {
            return $this->returnMessageError('Not found','404');
        }

        $client->update($request->all());

        return $this->returnMessageSuccess('Data updated successfully','200');
    }



    public function softDelete($id)
    {
        $client = Client::find($id);

        if (!$client)
        {
            return $this->returnMessageError('Not found','404');
        }

        $client->delete();
        return $this->returnMessageSuccess('Data is deleted successfully','200');
    }



    public function backFromTrash($id)
    {
        $client = Client::onlyTrashed()->find($id);

        if (!$client)
        {
            return $this->returnMessageError('Not found','404');
        }

        $client = Client::onlyTrashed()->where('id', $id)->first()->restore();
        return $this->returnMessageSuccess('client is back successfully','200');
    }



    public function trashed()
    {
        try {
            $clients = ClientResource::collection(Client::onlyTrashed()->get());
        }
        catch (\Exception $exception)
        {
            return $this->returnMessageError($exception->getMessage(),'500');
        }
        return $this->returnMessageData('Trashed data','200','Trashed Clients',$clients);
    }



    public function deleteForever($id)
    {
        $client = Client::onlyTrashed()->find($id);

        if (!$client)
        {
            return $this->returnMessageError('Not found','404');
        }

        $client = Client::onlyTrashed()->where('id', $id)->forceDelete();
        return $this->returnMessageSuccess('Data is deleted forever successfully','200');
    }



    public function showProductsOfClient(Request $request, $id)
    {
        $client = Client::find($id);

        if (!$client)
        {
            return $this->returnMessageError('Not found','404');
        }


        $clientName = Client::find($id)->name;
        $sumPayments = clientInvoice::where('client_id',$id)->sum('paid_all');

        if ($request->has('input_search'))
        {

            $productsOfClient = SellResource::collection(Sell::where('client_id',$id)->where('name','LIKE','%'.$request->input_search.'%')->latest()->get());
        }
        else{
            $productsOfClient = SellResource::collection(Sell::where('client_id',$id)->latest()->get());
        }
        return $this->returnMessageData('Data fetched successfully','200','products of client',[$productsOfClient,$clientName,$id,$sumPayments]);
    }




}
