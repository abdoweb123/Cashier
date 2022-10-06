<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web');
    }


    public function index(Request $request)
    {
            if ($request->has('input_search')){
                $products = Product::where('product_name', 'LIKE' ,'%'. $request->input_search . '%')->where('user_id',Auth::id())->paginate(page);
            }
            else{
                $products = Product::where('user_id',Auth::id())->paginate(page);
            }
            return view('user.index', compact('products'));
    }

    public function trashedProducts()
    {
        $products = Product::onlyTrashed()/*->where('user_id',Auth::id())*/->latest()->paginate(4);
        return view('product.trashed', compact('products'));
    }

    public function backFromSoftDelete($id)
    {
        $products = Product::onlyTrashed()->where('id', $id)->first()->restore();
        return redirect()->route('home')
            ->with('success','product is back successfully');
    }

    public function deleteForever($id)
    {
        $products = Product::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('product.trash')
            ->with('success','product is deleted successfully');
    }

    public function create()
    {
        return view('product.create');
    }


    public function store(Request $request)
    {

    /*    $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->quantity = $request->input('quantity');
        $product->price = $request->input('price');
        $product->user_id = $request->input('user_id');
        if ($request->hasFile('file_name'))
        {
            $file = $request->file('file_name');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/offers/',$filename);
            $product->file_name = $filename;
        }
        $product->save();
*/
        $rules = [
            'product_name'=>'required',
            'file_name'   =>'required|image|mimes:jpg,png,gif,jpeg,jfif|max:2048',
            'quantity'    =>'required',
            'price'       =>'required',
        ];

        $messages = [
            'product_name'=>'This field is required',
            'file_name'   =>'This field is required',
            'quantity'    =>'This field is required',
            'price'       =>'This field is required',
        ];

       $this->validate($request,$rules,$messages);

       $data = $request->all();
        if( $image = $request->file('file_name')){

             $path = 'images/offers/';
             $photo = time() . '.' . $image->getClientOriginalExtension();
             $image->move($path,$photo);
             $data['file_name'] = "$photo";
        }
        $product = Product::create($data);
        return redirect()->route('home')->with('success','product is created successfully');
    }


    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }


    public function edit(Product $product)
    {
        $admin = User::all();
        if((isset(Auth::user()->id) && Auth::user()->id == $product->user_id) || Auth::user()->role == 'admin'){
            return view('product.edit', compact('product'));
        }
          return redirect()->route('home');
    }


    public function update(Request $request, Product $product)
    {
       /*
        $request->validate([
            'product_name'=> 'required',
            'file_name'=>'required',
            'quantity'=>'required',
            'price'=> 'required'
        ]);
        $product->update($request->all());
       */
        $rules = [
            'product_name'=>'required',
            'file_name'   =>'image|mimes:jpg,png,gif,jpeg,jfif|max:2048',
            'quantity'    =>'required',
            'price'       =>'required',
        ];

        $messages = [
            'product_name'=>'This field is required',
            'quantity'    =>'This field is required',
            'price'       =>'This field is required',
        ];

        $this->validate($request,$rules,$messages);

        $data = $request->all();
        if( $image = $request->file('file_name')){

            $path = 'images/offers/';
            $photo = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path,$photo);
            $data['file_name'] = "$photo";
        }
         else{
             unset($data['file_name']);
         }
        $product->update($data);

        return redirect()->route('home')
            ->with('success','product is updated successfully');

    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('home')->with('success','product is deleted successfully');
    }

    public function softDelete($id)
    {
        $product = Product::find($id)->delete();
        return redirect()->route('home')->with('success','product is deleted successfully');

    }




}
