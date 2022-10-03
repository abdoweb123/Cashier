@extends('layouts.master')
@section('css')
@section('title')
    {{trans('تعديل سعر المنتج')}}
@stop
@endsection

@section('PageText')

    تعديل سعر المنتج
@stop
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    قائمة المشتريات
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <form action="{{route('product_ForAdmin.update', $product_ForAdmin->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('اسم المنتج')}} : </label>
                                    <input type="text" name="product_name" class="form-control" value="{{$product_ForAdmin->product_name}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group quantity">
                                    <label>{{trans('الكمية')}} : </label>
                                    <input type="text" name="quantity" class="form-control" value="{{$product_ForAdmin->quantity}}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group buy-price">
                                    <label>{{trans('سعر الشراء')}} : </label>
                                    <input type="text" name="price" class="form-control" value="{{$product_ForAdmin->price}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('سعر البيع')}} : </label>
                                    <input type="text" name="sell_price" class="form-control" value="{{$product_ForAdmin->sell_price}}" required>
                                    @error('sell_price')
                                    <span class="span-warning">
                                           {{ $errors->first('sell_price') }}
                                       </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('اسم المورد')}} : </label>
                                    <select class="form-control mr-sm-2 p-2" name="supplier_id" readonly>
                                        <option value="{{$product_ForAdmin->supplier->id}}">{{$product_ForAdmin->supplier->name}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('اختر القسم')}} : </label>
                                    <select class="form-control mr-sm-2 p-2" name="category_id" readonly>
                                            <option value="{{$product_ForAdmin->category->id}}">{{$product_ForAdmin->category->name}}</option>
                                    </select>
                                    @error('category_id')
                                    <span class="span-warning">
                                        {{ $errors->first('category_id') }}
                                     </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('تعديل')}}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>



    <!-- row closed -->
@endsection
