@extends('layouts.app')

@section('title')
    عرض المنتج
@endsection


@section('content')

  <div class="container">
    <div class="wrapper fadeInDown">
      <div id="formContent">
        <div class="card">
            <div class="card-body">
                <p class="card-text"> Product Name : {{$product->product_name}} </p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <p class="card-text"> Product photo : <img style="width: 100px;height: 80px" src="{{asset('images/offers/' . $product->file_name)}}"> </p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <p class="card-text"> Product price : {{$product->price}} </p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <p class="card-text"> Product quantity : {{$product->quantity}} </p>
            </div>
        </div>

    </div>
    </div>
  </div>


@endsection

