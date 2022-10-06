<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request){

        if ($request->has('input_search')){
            $user = User::where('name', 'LIKE' ,'%'. $request->input_search . '%')->paginate(page);
        }
        else{
            $user = User::latest()->paginate(page);
        }

        return view('admin.userIndex', compact('user'));
    }


    public function trashed()
    {
        $user = User::onlyTrashed()->latest()->paginate(7);
        return view('admin.userTrashed', compact('user'));
    }

    public function backFromSoftDelete($id)
    {
        $user = User::onlyTrashed()->where('id', $id)->first()->restore();
        return redirect()->route('users.index')
            ->with('success','product is back successfully');
    }

    public function deleteForever($id)
    {
        $user = User::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('users.trash')
            ->with('success','product is deleted successfully');
    }



    public function show(User $user)
    {
        return view('admin.userShow', compact('user'));
    }


    public function edit(User $user)
    {
        return view('admin.userEdit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        // هذه الحقول مطلوبة
        $request->validate([
            'name'=> 'required',
            'email'=>'required',
            'mobile'=>'required',
            'address'=> 'required'
        ]);
        // كل اللي المستخدم يدخّله اقبله واصنعه في ال database
        $user->update($request->all());
        // بعد كدا انقله لصفحة ال index عشان يشوف المنتج اللي  هو اضافه
        return redirect()->route('users.index')
            ->with('success','product is updated successfully');

    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','product is deleted successfully');
    }

    public function softDelete($id)
    {
        $user = User::find($id)->delete();
        return redirect()->route('users.index')->with('success','product is deleted successfully');
    }



    public function showProductsOfUser(Request $request,$id){

        $userProduct = User::find($id)->product;
        $userName = User::find($id)->where('id',$id)->get();
        if ($request->has('input_search')){
            $userProduct = Product::where('user_id',$id)->where('product_name', 'LIKE' ,'%'. $request->input_search . '%')->paginate(page);
        }

        else{
            $userProduct = Product::where('user_id',$id)->paginate(page);
        }
        return view('admin.ProductsOfUser',compact('userProduct','userName','id'));
    }





}
