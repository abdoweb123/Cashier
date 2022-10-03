<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\SellCashRequest;
use App\Http\Requests\SellRationRequest;
use App\Http\Requests\SellRemainRequest;
use App\Interfaces\SellRepositoryInterface;
use App\Models\Sell;
use Illuminate\Http\Request;


class SellController extends Controller
{

    private $sellRepositoryInterface;


    public function __construct(SellRepositoryInterface $sellRepositoryInterface)
    {
        $this->sellRepositoryInterface = $sellRepositoryInterface;
    }



    public function index(Request $request)
    {
        return $this->sellRepositoryInterface->index($request);
    }


    public function searchProduct(Request $request)
    {
        return $this->sellRepositoryInterface->searchProduct($request);
    }


    public function createSell($id)
    {
        return $this->sellRepositoryInterface->createSell($id);
    }



    public function storeSellRation(SellRationRequest $request, $id)
    {
        return $this->sellRepositoryInterface->storeSellRation($request,$id);
    }



    public function storeSellCash(SellCashRequest $request,$id)
    {
        return $this->sellRepositoryInterface->storeSellCash($request,$id);
    }



    public function storeSellRemain(SellRemainRequest $request,$id)
    {
        return $this->sellRepositoryInterface->storeSellRemain($request,$id);
    }



    public function updateSellRation(SellRationRequest $request, $sell_id, $productBigStore_quantity)
    {
        return $this->sellRepositoryInterface->updateSellRation($request,$sell_id,$productBigStore_quantity);
    }



    public function updateSellCash(SellCashRequest $request,$sell_id,$productBigStore_quantity)
    {
        return $this->sellRepositoryInterface->updateSellCash($request,$sell_id,$productBigStore_quantity);
    }



    public function updateSellRemain(SellRemainRequest $request,$sell_id,$productBigStore_quantity)
    {
        return $this->sellRepositoryInterface->updateSellRemain($request,$sell_id,$productBigStore_quantity);
    }



    public function edit(Sell $sell)
    {
        return $this->sellRepositoryInterface->edit($sell);
    }



    public function show(Sell $sell)
    {
        return $this->sellRepositoryInterface->show($sell);
    }



    public function softDelete($id)
    {
        return $this->sellRepositoryInterface->softDelete($id);
    }



    public function trashedSells()
    {
        return $this->sellRepositoryInterface->trashedSells();
    }



    public function backTrashedSell($id)
    {
        return $this->sellRepositoryInterface->backTrashedSell($id);
    }



    public function deleteForever(Request $request, $sell_id, $product_id)
    {
        return $this->sellRepositoryInterface->deleteForever($request,$sell_id,$product_id);
    }






}
