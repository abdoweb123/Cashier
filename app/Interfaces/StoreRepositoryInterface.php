<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface StoreRepositoryInterface
{

    public function index(Request $request);

    public function deleteForever($id);


}
