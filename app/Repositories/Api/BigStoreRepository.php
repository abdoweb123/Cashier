<?php

namespace App\Repositories\Api;

use App\Http\Controllers\Traits\CheckApi;
use App\Http\Requests\BigStoreRequestStore;
use App\Http\Requests\BigStoreRequestUpdate;
use App\Http\Resources\BigStoreResource;
use App\Interfaces\Api\BigStoreRepositoryInterface;
use App\Models\BigStore;
use App\Models\Store;
use Illuminate\Http\Request;

class BigStoreRepository implements BigStoreRepositoryInterface
{

    use CheckApi;

    public function index(Request $request)
    {
        if ($request->has('input_search')){
            $products = BigStoreResource::collection(BigStore::where('product_name', 'LIKE' ,'%'. $request->input_search . '%')->get());
        }
        else{
            $products = BigStoreResource::collection(BigStore::get());
        }
        return $this->returnMessageData('Data is fetched successfully','200','Products of Store',$products);
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

        return $this->returnMessageSuccess('Data is created successfully','200');
    }



    public function show($id)
    {
        $product =  BigStore::find($id);

        if (!$product)
        {
            return $this->returnMessageError('Not found','404');
        }

        $product =  BigStoreResource::make(BigStore::find($id));

        return $this->returnMessageData('Data is fetched successfully','200','Products of Store',$product);
    }



    public function update(BigStoreRequestUpdate $request, $id)
    {
        $product = BigStore::find($id);

        if (!$product)
        {
            return $this->returnMessageError('Not found','404');
        }

        $data = $request->all();

        // update picture
        if( $image = $request->file('file_name'))
        {
            $path = 'images/offers/';
            $photo = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path,$photo);
            $data['file_name'] = "$photo";
        }
        else{
            unset($data['file_name']);
        }

        $product->update($data);

        return $this->returnMessageSuccess('Data is updated successfully','200');
    }



    public function softDelete($id)
    {
        $product = BigStore::find($id);

        if (!$product)
        {
            return $this->returnMessageError('Not found','404');
        }

        $product->delete();
        return $this->returnMessageSuccess('Data is deleted successfully','200');
    }



    public function trashedProducts()
    {
        try {
            $products = BigStoreResource::collection(BigStore::onlyTrashed()->latest()->get());
        }
        catch (\Exception $exception)
        {
            return $this->returnMessageError($exception->getMessage(),'500');
        }

        return $this->returnMessageData('Data is fetched successfully','200','trashed products',$products);
    }



    public function backFromSoftDelete($id)
    {
        $product = BigStore::onlyTrashed()->find($id);

        if (!$product)
        {
            return $this->returnMessageError('Not found','404');
        }

        $product = BigStore::onlyTrashed()->where('id', $id)->first()->restore();

        return $this->returnMessageSuccess('Data is back successfully','200');
    }



    public function deleteForever($id)
    {
        $product = BigStore::onlyTrashed()->find($id);

        if (!$product)
        {
            return $this->returnMessageError('Not found','404');
        }

        $product = BigStore::onlyTrashed()->where('id', $id)->forceDelete();
        return $this->returnMessageSuccess('Data is deleted forever successfully','200');
    }

} //end of class
