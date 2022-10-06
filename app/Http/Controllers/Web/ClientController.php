<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Interfaces\Web\ClientRepositoryInterface;
use App\Models\Client;
use Illuminate\Http\Request;


class ClientController extends Controller
{

    private $clientRepositoryInterface;


    public function __construct(ClientRepositoryInterface $clientRepositoryInterface)
    {
        $this->clientRepositoryInterface = $clientRepositoryInterface;
    }


    public function index(Request $request)
    {
       return $this->clientRepositoryInterface->index($request);
    }


    public function create()
    {
        return $this->clientRepositoryInterface->create();
    }


    public function store(ClientRequest $request)
    {
        return $this->clientRepositoryInterface->store($request);
    }


    public function edit(Client $client)
    {
        return $this->clientRepositoryInterface->edit($client);
    }


    public function update(ClientRequest $request, Client $client)
    {
        return $this->clientRepositoryInterface->update($request,$client);
    }


    public function softDelete($id)
    {
        return $this->clientRepositoryInterface->softDelete($id);
    }


    public function trashed()
    {
        return $this->clientRepositoryInterface->trashed();
    }


    public function backFromSoftDelete($id)
    {
        return $this->clientRepositoryInterface->backFromSoftDelete($id);
    }


    public function deleteForever($id)
    {
        return $this->clientRepositoryInterface->deleteForever($id);
    }


    public function showProductsOfClient(Request $request, $id)
    {
        return $this->clientRepositoryInterface->showProductsOfClient($request,$id);
    }



}
