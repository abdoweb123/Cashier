@extends('layouts.master')
@section('css')
@section('title')
    {{trans('شراء منتج')}}
@stop
@endsection

@section('PageText')

    شراء منتج
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

                    <form action="{{route('product_ForAdmin.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('اسم المنتج')}} : </label>
                                    <input type="text" name="product_name" class="form-control" value="{{ old('product_name') }}" required>
                                    @error('product_name')
                                    <span class="span-warning">
                                             {{ $errors->first('product_name') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('صورة المنتج')}} : </label>
                                    <input type="file" name="file_name" class="form-control" value="{{ old('file_name')}}" required>
                                    @error('file_name')
                                    <span class="span-warning">
                                            {{ $errors->first('file_name') }}
                                       </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group quantity">
                                    <label>{{trans('الكمية')}} : </label>
                                    <input type="number" name="quantity" class="form-control" value="{{old('quantity')}}" required>
                                    @error('quantity')
                                    <span class="span-warning">
                                           {{ $errors->first('quantity') }}
                                       </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group buy-price">
                                    <label>{{trans('سعر الشراء')}} : </label>
                                    <input type="number" name="price" class="form-control" value="{{old('price')}}" required>
                                    @error('price')
                                    <span class="span-warning">
                                           {{ $errors->first('price') }}
                                       </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('سعر البيع')}} : </label>
                                    <input type="number" name="sell_price" class="form-control" value="{{old('sell_price')}}" required>
                                    @error('sell_price')
                                    <span class="span-warning">
                                           {{ $errors->first('sell_price') }}
                                       </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group total-price">
                                    <label>{{trans('إجمالي المبلغ')}} : </label>
                                    <input type="number" name="total" class="form-control" value="{{old('total')}}" required>
                                    @error('total')
                                    <span class="span-warning">
                                           {{ $errors->first('total') }}
                                       </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group paid_money">
                                    <label>{{trans('المبلغ المدفوع')}} : </label>
                                    <input type="number" name="paid_money" class="form-control" value="{{old('paid_money')}}" required>
                                    @error('paid_money')
                                    <span class="span-warning">
                                           {{ $errors->first('paid_money') }}
                                       </span>
                                    @enderror
                                </div>
                            </div>


                                <div class="col-md-6">
                                    <div class="form-group remain_money">
                                        <label>{{trans('المبلغ المتبقي')}} : </label>
                                        <input type="number" name="remain_money" class="form-control" value="{{old('remain_money')}}" required>
                                        @error('remain_money')
                                        <span class="span-warning">
                                           {{ $errors->first('remain_money') }}
                                       </span>
                                        @enderror
                                    </div>
                                </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('اختر اسم المورد')}} : </label>
                                    <select class="form-control mr-sm-2 p-2" name="supplier_id" required>
                                        <option value="">اختر اسم المورد</option>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{$supplier->id}}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>{{$supplier->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('supplier_id')
                                    <span class="span-warning">
                                        {{ $errors->first('supplier_id') }}
                                     </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('اختر القسم')}} : </label>
                                    <select class="form-control mr-sm-2 p-2" name="category_id" required>
                                        <option value="">اختر القسم</option>
                                    @foreach($categories as $category)
                                            <option value="{{$category->id}}" value="{{ old('category_id') }}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="span-warning">
                                        {{ $errors->first('category_id') }}
                                     </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('حفظ')}}</button>
                    </form>

                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('script')

    <script>
    /*** Start create invoice ***/
    $('.quantity input').on('keyup', function (){
    $('.total-price input').val($('.buy-price input').val() * $('.quantity input').val());
    $('.remain_money input').val( $('.total-price input').val() - $('.paid_money input').val());
    });

    $('.buy-price input').on('keyup', function (){
    $('.total-price input').val($('.buy-price input').val() * $('.quantity input').val());
    $('.remain_money input').val( $('.total-price input').val() - $('.paid_money input').val());
    });

    $('.paid_money input').on('keyup', function (){
    $('.remain_money input').val( $('.total-price input').val() - $('.paid_money input').val());
    });
    /*** End create invoice ***/




    $('.quantity input').on('keyup', function (){
    $('.total_price input').val($('.price input').val() * $('.quantity input').val());
    });

    </script>

@endsection
