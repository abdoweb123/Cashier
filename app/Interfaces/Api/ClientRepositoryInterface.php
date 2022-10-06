<?php

namespace App\Interfaces\Api;

use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use App\Http\Resources\SellResource;
use App\Models\Client;
use App\Models\clientInvoice;
use App\Models\Sell;
use Illuminate\Http\Request;

interface ClientRepositoryInterface
{

    public function index(Request $request);

    public function store(ClientRequest $request);

    public function update(ClientRequest $request, $id);

    public function softDelete($id);

    public function backFromTrash($id);

    public function trashed();

    public function deleteForever($id);

    public function showProductsOfClient(Request $request, $id);


} //end of class
