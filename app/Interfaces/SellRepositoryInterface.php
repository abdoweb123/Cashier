<?php

namespace App\Interfaces;

use App\Http\Requests\SellCashRequest;
use App\Http\Requests\SellRationRequest;
use App\Http\Requests\SellRemainRequest;
use App\Models\Sell;
use Illuminate\Http\Request;

interface SellRepositoryInterface
{

    public function index(Request $request);

    public function searchProduct(Request $request);

    public function createSell($id);

    public function storeSellRation(SellRationRequest $request, $id);

    public function storeSellCash(SellCashRequest $request,$id);

    public function storeSellRemain(SellRemainRequest $request,$id);

    public function updateSellRation(SellRationRequest $request, $sell_id, $productBigStore_quantity);

    public function updateSellCash(SellCashRequest $request,$sell_id,$productBigStore_quantity);

    public function updateSellRemain(SellRemainRequest $request,$sell_id,$productBigStore_quantity);

    public function edit(Sell $sell);

    public function show(Sell $sell);

    public function softDelete($id);

    public function trashedSells();

    public function backTrashedSell($id);

    public function deleteForever(Request $request, $sell_id, $product_id);

}
