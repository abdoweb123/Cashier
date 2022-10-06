<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CheckApi;
use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use App\Http\Resources\SellResource;
use App\Interfaces\Api\ClientRepositoryInterface;
use App\Models\Client;
use App\Models\clientInvoice;
use App\Models\Sell;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    use CheckApi;

    private $clientRepositoryInterface;

    public function __construct(ClientRepositoryInterface $clientRepositoryInterface)
    {
        $this->clientRepositoryInterface = $clientRepositoryInterface;
    }

    public function index(Request $request)
    {
        return $this->clientRepositoryInterface->index($request);
    }



    public function store(ClientRequest $request)
    {
        return $this->clientRepositoryInterface->store($request);
    }



    public function update(ClientRequest $request, $id)
    {
        return $this->clientRepositoryInterface->update($request,$id);
    }



    public function softDelete($id)
    {
        return $this->clientRepositoryInterface->softDelete($id);
    }



    public function backFromTrash($id)
    {
        return $this->clientRepositoryInterface->backFromTrash($id);
    }



    public function trashed()
    {
        return $this->clientRepositoryInterface->trashed();
    }



    public function deleteForever($id)
    {
        return $this->clientRepositoryInterface->deleteForever($id);
    }



    public function showProductsOfClient(Request $request, $id)
    {
        return $this->clientRepositoryInterface->showProductsOfClient($request,$id);
    }




} //end of class
