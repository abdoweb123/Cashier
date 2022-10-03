<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Interfaces\StoreRepositoryInterface;
use Illuminate\Http\Request;


class StoreController extends Controller
{


    private $storeRepositoryInterface;


    public function __construct(StoreRepositoryInterface $storeRepositoryInterface)
    {
        $this->storeRepositoryInterface = $storeRepositoryInterface;
    }



    public function index(Request $request)
    {
        return $this->storeRepositoryInterface->index($request);
    }



    public function deleteForever($id)
    {
        return $this->storeRepositoryInterface->deleteForever($id);
    }



}
