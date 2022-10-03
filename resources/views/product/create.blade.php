@extends('layouts.app')


@section('title')
   إضافة منتج
@endsection



@section('content')

<div class="container">

  @if($errors->any())
       @foreach($errors->all() as $error)
        <div class="alert alert-primary">
            {{$error}}
        </div>
        @endforeach


    @endif
<div class="wrapper fadeInDown">
    <h2>Create New Product</h2>
    <div id="formContent">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="user_id"  value="{{Auth::id()}}">
            <div class="form-group content-input mt-sm-3 mt-xs-1">
                <div class="div-label">
                   <label for="exampleFormControlInput1">Product Name</label>
                </div>
                <input type="text" name="product_name" class="form-control mt-1" id="exampleFormControlInput1" placeholder="Product Name">
            </div>
            <div class="form-group content-input mt-sm-3 mt-xs-1">
                <div class="div-label">
                    <label for="exampleFormControlInput1">Product photo</label>
                </div>
                <input type="file" name="file_name" class="form-control" id="exampleFormControlInput1">
            </div>

            <div class="form-group content-input mt-sm-3 mt-xs-1">
                <div class="div-label">
                    <label for="exampleFormControlInput1">Product quantity</label>
                </div>
                <input type="text" name="quantity" class="form-control" id="exampleFormControlInput1" placeholder="Product quantity">
            </div>

            <div class="form-group content-input mt-sm-3 mt-xs-1">
                <div class="div-label">
                    <label for="exampleFormControlInput1">Product Price</label>
                </div>
                <input type="text" name="price" class="form-control" id="exampleFormControlInput1" placeholder="Product Price">
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-3 create-btn">Save</button>
            </div>
        </form>
    </div>
</div>
</div>

@endsection
