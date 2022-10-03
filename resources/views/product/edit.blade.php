@extends('layouts.app')


@section('title')
    تعديل منتج
@endsection



@section('content')

    <div class="container">
        <div class="wrapper fadeInDown">
          <div id="formContent">
           <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group content-input mt-sm-2 mt-xs-1">
                <div class="div-label">
                   <label for="exampleFormControlInput1">Product name</label>
                </div>
                <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control" id="exampleFormControlInput1" placeholder="Product Name">
            </div>
            <div>
                <input type="hidden" name="user_id" value="{{$product->user_id}}">
            </div>
            <div class="form-group content-input mt-sm-2 mt-xs-1">
                <div class="div-label">
                    <label for="exampleFormControlInput1">Product file_name</label>
                </div>
                <input type="file" name="file_name" class="form-control" id="exampleFormControlInput1">
                <div class="div-label">
                    <img style="width: 100px;height: 80px" src="{{asset('images/offers/' . $product->file_name)}}">
                </div>
            </div>

            <div class="form-group content-input mt-sm-3 mt-xs-1">
                <div class="div-label">
                    <label for="exampleFormControlInput1">Product quantity</label>
                </div>
                <input type="text" name="quantity" value="{{$product->quantity}}" class="form-control" id="exampleFormControlInput1" placeholder="Product Price">
            </div>

            <div class="form-group content-input mt-sm-2 mt-xs-1">
                <div class="div-label">
                    <label for="exampleFormControlInput1">Product price</label>
                </div>
                <input type="text" name="price" value="{{$product->price}}" class="form-control" id="exampleFormControlInput1" placeholder="Product Price">
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-2 create-btn">Update</button>
            </div>

        </form>
          </div>
        </div>
    </div>

@endsection
