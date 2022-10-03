<?php

namespace App\Repositories\web;

use App\Http\Requests\SellCashRequest;
use App\Http\Requests\SellRationRequest;
use App\Http\Requests\SellRemainRequest;
use App\Interfaces\SellRepositoryInterface;
use App\Models\BigStore;
use App\Models\Client;
use App\Models\SalesProfits;
use App\Models\Sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SellRepository implements SellRepositoryInterface
{


    public function index(Request $request)
    {
        if ($request->has('input_search'))
        {
            $sells = Sell::where('name','LIKE','%'. $request->input_search .'%')->latest()->paginate(page);
        }else{
            $sells = Sell::latest()->paginate(page);
        }
        return view('sells.index',compact('sells'));
    }



    public function searchProduct(Request $request)
    {
        if ($request->has('input_search'))
        {
            $productsFromBigStore = BigStore::where('product_name','LIKE','%'. $request->input_search .'%')->latest()->paginate(page);
        }else{
            $productsFromBigStore = '';
        }
        return view('sells.searchProduct',compact('productsFromBigStore'));
    }



    public function createSell($id)
    {
        $productInfo = BigStore::find($id);
        $clients = Client::select('id','name')->get();
        return view('sells.create', compact('clients','productInfo'));
    }



    public function storeSellRation(SellRationRequest $request, $id)
    {
        $data = $request->all();

        $sells = Sell::create($data);

        $bigStore = BigStore::find($id);
        $bigStore->update([
            'quantity' => $request['bigStoreQuantity']
        ]);


        // Start sales_profit table
        $test  = SalesProfits::find($request['product_id']);

        if ($test){
            $newProfit         =  $test['profit'] + $request['profit'];
            $newBuy_totalPrice =  $test['buy_totalPrice'] + $request['buy_totalPrice'];
            $totalAfter        =  $test['totalAfter'] + $request['totalAfter'];
            $newSale           =  $test['sales']  + $request['quantity'];

            DB::table('sales_profits')
                ->where('product_id',$request['product_id'])
                ->update([
                    'profit'         => $newProfit,
                    'buy_totalPrice' => $newBuy_totalPrice,
                    'totalAfter'     => $totalAfter,
                    'sales'          => $newSale,
                ]);
        }
        else{
            $sales = SalesProfits::create([
                'product_id'     => $request['product_id'],
                'name'           => $request['name'],
                'profit'         => $request['profit'],
                'buy_totalPrice' => $request['buy_totalPrice'],
                'totalAfter'     => $request['totalAfter'],
                'sales'          => $request['quantity'],
            ]);
        }
        // End sales_profit table


        return redirect()->route('sells.index');
    }



    public function storeSellCash(SellCashRequest $request,$id)
    {
        $data = $request->all();
        $sells = Sell::create($data);

        $bigStore = BigStore::find($id);
        $bigStore->update([
            'quantity' => $request['bigStoreQuantity']
        ]);


        // Start sales_profit table
        $test  = SalesProfits::find($request['product_id']);

        if ($test){
            $newProfit         =  $test['profit'] + $request['profit'];
            $newBuy_totalPrice =  $test['buy_totalPrice'] + $request['buy_totalPrice'];
            $totalAfter        =  $test['totalAfter'] + $request['totalAfter'];
            $newSale           =  $test['sales']  + $request['quantity'];

            DB::table('sales_profits')
                ->where('product_id',$request['product_id'])
                ->update([
                    'profit'         => $newProfit,
                    'buy_totalPrice' => $newBuy_totalPrice,
                    'totalAfter'     => $totalAfter,
                    'sales'          => $newSale,
                ]);
        }
        else{
            $sales = SalesProfits::create([
                'product_id'     => $request['product_id'],
                'name'           => $request['name'],
                'profit'         => $request['profit'],
                'buy_totalPrice' => $request['buy_totalPrice'],
                'totalAfter'     => $request['totalAfter'],
                'sales'          => $request['quantity'],
            ]);
        }
        // End sales_profit table

        return redirect()->route('sells.index');
    }



    public function storeSellRemain(SellRemainRequest $request,$id)
    {

        $data = $request->all();

        $sells = Sell::create($data);

        $bigStore = BigStore::find($id);
        $bigStore->update([
            'quantity' => $request['bigStoreQuantity']
        ]);



        // Start sales_profit table
        $test  = SalesProfits::find($request['product_id']);

        if ($test){
            $newProfit         =  $test['profit'] + $request['profit'];
            $newBuy_totalPrice =  $test['buy_totalPrice'] + $request['buy_totalPrice'];
            $totalAfter        =  $test['totalAfter'] + $request['totalAfter'];
            $newSale           =  $test['sales']  + $request['quantity'];

            DB::table('sales_profits')
                ->where('product_id',$request['product_id'])
                ->update([
                    'profit'         => $newProfit,
                    'buy_totalPrice' => $newBuy_totalPrice,
                    'totalAfter'     => $totalAfter,
                    'sales'          => $newSale,
                ]);
        }
        else{
            $sales = SalesProfits::create([
                'product_id'     => $request['product_id'],
                'name'           => $request['name'],
                'profit'         => $request['profit'],
                'buy_totalPrice' => $request['buy_totalPrice'],
                'totalAfter'     => $request['totalAfter'],
                'sales'          => $request['quantity'],
            ]);
        }
        // End sales_profit table

        return redirect()->route('sells.index');

    }



    public function updateSellRation(SellRationRequest $request, $sell_id, $productBigStore_quantity)
    {
        $sell = Sell::find($sell_id);

        $data = $request->all();

        $bigStore = BigStore::find($productBigStore_quantity);
        $bigStore->update([
            'quantity' => $request['bigStoreQuantity']
        ]);


        // Start sales_profit table
        $test  = SalesProfits::find($data['product_id']);

        if ($test){

            if ($sell->buy_totalPrice == $data['buy_totalPrice'])
            {
                $newBuy_totalPrice =  $test['buy_totalPrice'];
            }
            elseif ($sell->buy_totalPrice > $data['buy_totalPrice'])
            {
                $minusSales = $sell->buy_totalPrice - $data['buy_totalPrice'];
                $newBuy_totalPrice = $test['buy_totalPrice'] - $minusSales;
            }
            elseif ($sell->buy_totalPrice < $data['buy_totalPrice'])
            {
                $minusSales =  $data['buy_totalPrice'] - $sell->buy_totalPrice;
                $newBuy_totalPrice = $test['buy_totalPrice'] + $minusSales;
            }



            if ($sell->profit == $data['profit'])
            {
                $newProfit = $test['profit'];
            }
            elseif ($sell->profit > $data['profit'])
            {
                $minusProfit =  $sell->profit - $data['profit'];
                $newProfit   =  $test['profit'] - $minusProfit;

            }
            elseif ($sell->profit < $data['profit'])
            {
                $minusProfit =  $data['profit'] - $sell->profit;
                $newProfit   =  $test['profit'] + $minusProfit;
            }



            if ($sell->quantity == $data['quantity'])
            {
                $newSale = $test['sales'];
            }
            elseif ($sell->quantity > $data['quantity'])
            {
                $minusSales =  $sell->quantity - $data['quantity'];
                $newSale    =  $test['sales'] - $minusSales;

            }
            elseif ($sell->quantity < $data['quantity'])
            {
                $minusSales =  $data['quantity'] - $sell->quantity;
                $newSale    =  $test['sales'] + $minusSales;
            }



            if ($sell->totalAfter == $data['totalAfter'])
            {
                $newTotalAfter = $test['totalAfter'];
            }
            elseif ($sell->totalAfter > $data['totalAfter'])
            {
                $minusSales =  $sell->totalAfter - $data['totalAfter'];
                $newTotalAfter    =  $test['totalAfter'] - $minusSales;

            }
            elseif ($sell->totalAfter < $data['totalAfter'])
            {
                $minusSales =  $data['totalAfter'] - $sell->totalAfter;
                $newTotalAfter    =  $test['totalAfter'] + $minusSales;
            }


            DB::table('sales_profits')
                ->where('product_id',$data['product_id'])
                ->update([
                    'product_id'     => $data['product_id'],
                    'profit'         => $newProfit,
                    'buy_totalPrice' => $newBuy_totalPrice,
                    'totalAfter'     => $newTotalAfter,
                    'sales'          => $newSale,
                ]);
        }
        // End sales_profit table


        $sell->update($data);

        return redirect()->route('sells.index');
    }



    public function updateSellCash(SellCashRequest $request,$sell_id,$productBigStore_quantity)
    {
        $sell = Sell::find($sell_id);

        $data = $request->all();

        $bigStore = BigStore::find($productBigStore_quantity);
        $bigStore->update([
            'quantity' => $request['bigStoreQuantity']
        ]);



        // Start sales_profit table
        $test  = SalesProfits::find($data['product_id']);

        if ($test){

            if ($sell->buy_totalPrice == $data['buy_totalPrice'])
            {
                $newBuy_totalPrice =  $test['buy_totalPrice'];
            }
            elseif ($sell->buy_totalPrice > $data['buy_totalPrice'])
            {
                $minusSales = $sell->buy_totalPrice - $data['buy_totalPrice'];
                $newBuy_totalPrice = $test['buy_totalPrice'] - $minusSales;
            }
            elseif ($sell->buy_totalPrice < $data['buy_totalPrice'])
            {
                $minusSales =  $data['buy_totalPrice'] - $sell->buy_totalPrice;
                $newBuy_totalPrice = $test['buy_totalPrice'] + $minusSales;
            }



            if ($sell->profit == $data['profit'])
            {
                $newProfit = $test['profit'];
            }
            elseif ($sell->profit > $data['profit'])
            {
                $minusProfit =  $sell->profit - $data['profit'];
                $newProfit   =  $test['profit'] - $minusProfit;

            }
            elseif ($sell->profit < $data['profit'])
            {
                $minusProfit =  $data['profit'] - $sell->profit;
                $newProfit   =  $test['profit'] + $minusProfit;
            }



            if ($sell->quantity == $data['quantity'])
            {
                $newSale = $test['sales'];
            }
            elseif ($sell->quantity > $data['quantity'])
            {
                $minusSales =  $sell->quantity - $data['quantity'];
                $newSale    =  $test['sales'] - $minusSales;

            }
            elseif ($sell->quantity < $data['quantity'])
            {
                $minusSales =  $data['quantity'] - $sell->quantity;
                $newSale    =  $test['sales'] + $minusSales;
            }



            if ($sell->totalAfter == $data['totalAfter'])
            {
                $newTotalAfter = $test['totalAfter'];
            }
            elseif ($sell->totalAfter > $data['totalAfter'])
            {
                $minusSales =  $sell->totalAfter - $data['totalAfter'];
                $newTotalAfter    =  $test['totalAfter'] - $minusSales;

            }
            elseif ($sell->totalAfter < $data['totalAfter'])
            {
                $minusSales =  $data['totalAfter'] - $sell->totalAfter;
                $newTotalAfter    =  $test['totalAfter'] + $minusSales;
            }


            DB::table('sales_profits')
                ->where('product_id',$data['product_id'])
                ->update([
                    'product_id'     => $data['product_id'],
                    'profit'         => $newProfit,
                    'buy_totalPrice' => $newBuy_totalPrice,
                    'totalAfter'     => $newTotalAfter,
                    'sales'          => $newSale,
                ]);
        }
        // End sales_profit table



        $sell->update($data);

        return redirect()->route('sells.index');
    }



    public function updateSellRemain(SellRemainRequest $request,$sell_id,$productBigStore_quantity)
    {
        $sell = Sell::find($sell_id);

        $data = $request->all();

        $bigStore = BigStore::find($productBigStore_quantity);
        $bigStore->update([
            'quantity' => $request['bigStoreQuantity']
        ]);


        // Start sales_profit table
        $test  = SalesProfits::find($data['product_id']);

        if ($test){

            if ($sell->buy_totalPrice == $data['buy_totalPrice'])
            {
                $newBuy_totalPrice =  $test['buy_totalPrice'];
            }
            elseif ($sell->buy_totalPrice > $data['buy_totalPrice'])
            {
                $minusSales = $sell->buy_totalPrice - $data['buy_totalPrice'];
                $newBuy_totalPrice = $test['buy_totalPrice'] - $minusSales;
            }
            elseif ($sell->buy_totalPrice < $data['buy_totalPrice'])
            {
                $minusSales =  $data['buy_totalPrice'] - $sell->buy_totalPrice;
                $newBuy_totalPrice = $test['buy_totalPrice'] + $minusSales;
            }



            if ($sell->profit == $data['profit'])
            {
                $newProfit = $test['profit'];
            }
            elseif ($sell->profit > $data['profit'])
            {
                $minusProfit =  $sell->profit - $data['profit'];
                $newProfit   =  $test['profit'] - $minusProfit;

            }
            elseif ($sell->profit < $data['profit'])
            {
                $minusProfit =  $data['profit'] - $sell->profit;
                $newProfit   =  $test['profit'] + $minusProfit;
            }



            if ($sell->quantity == $data['quantity'])
            {
                $newSale = $test['sales'];
            }
            elseif ($sell->quantity > $data['quantity'])
            {
                $minusSales =  $sell->quantity - $data['quantity'];
                $newSale    =  $test['sales'] - $minusSales;

            }
            elseif ($sell->quantity < $data['quantity'])
            {
                $minusSales =  $data['quantity'] - $sell->quantity;
                $newSale    =  $test['sales'] + $minusSales;
            }



            if ($sell->totalAfter == $data['totalAfter'])
            {
                $newTotalAfter = $test['totalAfter'];
            }
            elseif ($sell->totalAfter > $data['totalAfter'])
            {
                $minusSales =  $sell->totalAfter - $data['totalAfter'];
                $newTotalAfter    =  $test['totalAfter'] - $minusSales;

            }
            elseif ($sell->totalAfter < $data['totalAfter'])
            {
                $minusSales =  $data['totalAfter'] - $sell->totalAfter;
                $newTotalAfter    =  $test['totalAfter'] + $minusSales;
            }


            DB::table('sales_profits')
                ->where('product_id',$data['product_id'])
                ->update([
                    'product_id'     => $data['product_id'],
                    'profit'         => $newProfit,
                    'buy_totalPrice' => $newBuy_totalPrice,
                    'totalAfter'     => $newTotalAfter,
                    'sales'          => $newSale,
                ]);
        }
        // End sales_profit table


        $sell->update($data);
        return redirect()->route('sells.index');
    }



    public function edit(Sell $sell)
    {
        $clients = Client::select('id','name')->get();
        $productBigStore_quantity = $sell->bigStore->quantity;
        $productBigStore_id = $sell->bigStore->id;
        return view('sells.edit', compact('sell','clients','productBigStore_quantity','productBigStore_id'));
    }



    public function show(Sell $sell)
    {
        return view('sells.show', compact('sell'));
    }



    public function softDelete($id)
    {
        $sell = Sell::find($id)->delete();
        return redirect()->back()->with('success','sell is deleted successfully');
    }



    public function trashedSells()
    {
        $sells = Sell::onlyTrashed()->latest()->paginate(page);
        return view('sells.trashed', compact('sells'));
    }



    public function backTrashedSell($id)
    {
        $sell = Sell::onlyTrashed()->where('id',$id)->first()->restore();
        return redirect()->route('trashed.sells')->with('success','sell is back successfully');
    }



    public function deleteForever(Request $request, $sell_id, $product_id)
    {
        $salesProfit = SalesProfits::find($product_id);
        if ($salesProfit){
            $profit = $salesProfit->profit;
            $sales = $salesProfit->sales;
            $buy_totalPrice = $salesProfit->buy_totalPrice;
            $totalAfter     = $salesProfit->totalAfter;

            $salesProfit->update([
                'profit'         => $profit - $request['profit'],
                'sales'          => $sales  - $request['quantity'],
                'buy_totalPrice' => $buy_totalPrice  - $request['buy_totalPrice'],
                'totalAfter'     => $totalAfter  - $request['totalAfter'],
            ]);
        }


        $bigStoreUpdate = BigStore::find($product_id);
        $bigStoreUpdate->update([
            'quantity'=>$request['BigStore_quantity'],
        ]);

        $deleteSell = Sell::onlyTrashed()->where('id',$sell_id)->forceDelete();
        return redirect()->route('trashed.sells')->with('success','sell is deleted forever successfully');
    }



}
