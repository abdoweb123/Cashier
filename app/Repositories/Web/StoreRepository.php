<?php

namespace App\Repositories\Web;

use App\Interfaces\Web\StoreRepositoryInterface;
use App\Models\Store;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StoreRepository implements StoreRepositoryInterface
{


    public function index(Request $request)
    {
        if ($request->has('input_search')){
            $products = Store::where('product_name', 'LIKE' ,'%'. $request->input_search . '%')->paginate(page);
        }
        else{
            $products = Store::paginate(page);
        }
        return view('bought.index', compact('products'));
    }



    public function deleteForever($id)
    {
        $products = Store::where('id', $id)->forceDelete();
        return redirect()->route('index.buy')
            ->with('success','product is deleted successfully');
    }



    public function index_test(Request $request)
    {
        if ($request->has('input_search')){
            $products = Store::where('product_name', 'LIKE' ,'%'. $request->input_search . '%')->paginate(page);
        }
        else{
            $products = Store::paginate(page);
        }
        return view('bought.index', compact('products'));
    }

}









