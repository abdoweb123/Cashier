<?php

namespace App\Repositories\Web;



use App\Http\Requests\BigStoreRequestStore;
use App\Http\Requests\BigStoreRequestUpdate;
use App\Interfaces\Web\BigStoreRepositoryInterface;
use App\Models\BigStore;
use App\Models\Category;
use App\Models\Store;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BigStoreRepository implements BigStoreRepositoryInterface
{

    public function index(Request $request)
    {
        $categories = Category::select('id','name')->get();

        $products = BigStore::when($request->search, function ($q) use ($request) {

            return $q->where('product_name', 'LIKE', '%'.$request->search.'%');

        })->when($request->category_id , function ($q) use ($request) {

            return $q->where('category_id', $request->category_id);

        })->latest()->paginate(5);



        return view('admin.index', compact('categories','products'));
    }



    public function create()
    {
        $suppliers = Supplier::select('id','name')->get();
        $categories = Category::select('id','name')->get();
        return view('productForAdmin.create', compact('suppliers','categories'));
    }



    public function store(BigStoreRequestStore $request)
    {
        $data = $request->all();

        // add picture
        if( $image = $request->file('file_name'))
        {
            $path = 'images/offers/';
            $photo = time() . rand(1,20000). uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($path,$photo);
            $data['file_name'] = "$photo";
        }
        $product = Store::create($data);

        $bigStore = BigStore::create([

            'product_name'=>$data['product_name'],
            'file_name'   =>$data['file_name'],
            'supplier_id' =>$data['supplier_id'],
            'category_id' =>$data['category_id'],
            'quantity'    =>$data['quantity'],
            'price'       =>$data['price'],
            'sell_price'  =>$data['sell_price'],
            'total'       =>$data['total'],
        ]);

        return redirect()->route('index.buy')->with('success','product is created successfully');
    }



    public function edit(BigStore $product_ForAdmin)
    {
        return view('productForAdmin.edit', compact('product_ForAdmin'));
    }



    public function update(BigStoreRequestUpdate $request, BigStore $product_ForAdmin)
    {

        $product_ForAdmin->update([

            'sell_price'=>$request['sell_price'],

        ]);

        return redirect()->route('admin_home')
            ->with('success','product is updated successfully');
    }



    public function destroy(BigStore $product_ForAdmin)
    {
        $product_ForAdmin->delete();
        return redirect()->route('admin_home')->with('success','product is deleted successfully');
    }



    public function softDelete($id)
    {
        $product = BigStore::find($id)->delete();
        return redirect()->route('admin_home')->with('success','product is deleted successfully');

    }



    public function backFromSoftDelete($id)
    {
        $products = BigStore::onlyTrashed()->where('id', $id)->first()->restore();
        return redirect()->route('admin_home')
            ->with('success','product is back successfully');
    }



    public function deleteForever($id)
    {
        $products = BigStore::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('productForAdmin.trash')
            ->with('success','product is deleted successfully');
    }


}

