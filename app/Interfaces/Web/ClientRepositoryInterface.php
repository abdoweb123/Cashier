<?php

namespace App\Interfaces\Web;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

interface ClientRepositoryInterface
{


    public function index(Request $request);

    public function create();

    public function store(ClientRequest $request);

    public function edit(Client $client);

    public function update(ClientRequest $request, Client $client);

    public function softDelete($id);

    public function trashed();

    public function backFromSoftDelete($id);

    public function deleteForever($id);

    public function showProductsOfClient(Request $request, $id);

}
