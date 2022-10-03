@extends('layouts.master')
@section('css')
@section('title')
    {{trans('إنشاء فاتورة بيع')}}
@stop
@endsection

@section('PageText')

    إنشاء فاتورة بيع
@stop
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    فواتير العملاء
@stop
<!-- breadcrumb -->
@endsection

@section('style')
    .custom-select
    {
    appearance: auto;
    }
    #formContent{
    max-width: 1000px;
    }
    .cash_link, .ration_link , .remain_link{
    color:white !important;
    margin:0;
    margin-left:5px;
    }

    .remain-form, .ration-form {
    display:none
    }
    .span-warning-option{
    padding-right: 3%;
    }
@endsection

@section('content')
    <!-- row -->
    <div class="row">

        <div class="text-center m-2">
            <a href="#" class="cash_link btn btn-info">فوري</a>
            <a href="#" class="ration_link btn btn-info">قسط</a>
            <a href="#" class="remain_link btn btn-info">آجل</a>
        </div>

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100 cash-form">
                <div class="card-body">
                    <h2>فوري</h2>
                    <form action="{{ route('store.sell.cash',$productInfo->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="product_id" value="{{$productInfo->id}}">
                            <input type="hidden" name="bigStoreQuantity" class="bigStoreQuantity">
                            <input type="hidden" name="buy_totalPrice" class="buy_totalPrice">
                            <input type="hidden" name="profit" class="profit_cash">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('اسم المنتج')}} : </label>
                                    <input type="text" name="name" class="form-control" value="{{$productInfo->product_name}}" readonly>
                                    @error('name')
                                    <span class="span-warning">
                                             {{ $errors->first('name') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('صورة المنتج')}} : </label>
                                    <input type="hidden" name="photo" value="{{$productInfo->file_name}}">
                                    <input type="hidden" name="buy_price" value="{{$productInfo->price}}">
                                    <img style="width:220px; height:165px" src="{{asset('images/offers/' . $productInfo->file_name)}}" alt="photo">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group price_cash">
                                    <label>{{trans('السعر')}} : </label>
                                    <input type="number" name="sell_price" value="{{$productInfo->sell_price}}" class="form-control" readonly>
                                    @error('sell_price')
                                    <span class="span-warning">
                                             {{ $errors->first('sell_price')}}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group quantity_cash">
                                    <label>{{trans('الكمية')}} : </label>
                                    <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}">
                                    @error('quantity')
                                    <span class="span-warning">
                                           {{ $errors->first('quantity')}}
                                       </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group total_price_cash">
                                    <label>{{trans('إجمالي المبلغ قبل الخصم')}} : </label>
                                    <input type="number" name="totalBefore" class="form-control" value="{{ old('totalBefore') }}" readonly>
                                    @error('totalBefore')
                                    <span class="span-warning">
                                             {{ $errors->first('totalBefore')}}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group discount_cash">
                                    <label>{{trans('الخصم')}} : </label>
                                    <input type="number" name="discount" value="0" class="form-control">
                                    @error('discount')
                                    <span class="span-warning">
                                           {{ $errors->first('discount')}}
                                       </span>
                                    @enderror
                                    <span>%</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 total_after_cash">
                                <div class="form-group">
                                    <label>{{trans('إجمالي المبلغ بعد الخصم')}} : </label>
                                    <input type="number" name="totalAfter" class="form-control" value="{{ old('totalAfter') }}" readonly>
                                    @error('totalAfter')
                                    <span class="span-warning">
                                             {{ $errors->first('totalAfter')}}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group given_cash">
                                    <label>{{trans('إجمالي المبلغ بعد الخصم و المدفوع')}} : </label>
                                    <input type="number" name="given" class="form-control" value="{{ old('given') }}" readonly>
                                    @error('given')
                                    <span class="span-warning">
                                           {{ $errors->first('given')}}
                                       </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('التاريخ')}} : </label>
                                    <input type="date" name="date" class="form-control" value="{{ old('date')}}" id="datepicker-action" data-date-format="yyyy-mm-dd">
                                    @error('date')
                                    <span class="span-warning">
                                           {{ $errors->first('date')}}
                                       </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="parent_id">{{trans('اسم العميل')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2 form-control h-50" name="client_id" required>
                                        <option selected disabled>{{trans('اختر سم العميل')}}...</option>
                                        @foreach($clients as $client)
                                            <option value="{{$client->id}}">{{$client->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('client_id')
                                    <span class="span-warning span-warning-option">
                                           {{ $errors->first('client_id') }}
                                       </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('حفظ')}}</button>
                    </form>
                </div>
            </div>

            <div class="card card-statistics h-100 ration-form">
                <div class="card-body">
                    <h2>قسط</h2>
                    <form action="{{ route('store.sell.ration',$productInfo->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="product_id" value="{{$productInfo->id}}">
                            <input type="hidden" name="bigStoreQuantity" class="bigStoreQuantity">
                            <input type="hidden" name="buy_totalPrice" class="buy_totalPrice">
                            <input type="hidden" name="profit" class="profit_ration">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('اسم المنتج')}} : </label>
                                    <input type="text" name="name" class="form-control" value="{{$productInfo->product_name}}" readonly>
                                    @error('name')
                                    <span class="span-warning">
                                             {{ $errors->first('name') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('صورة المنتج')}} : </label>
                                    <input type="hidden" name="photo" value="{{$productInfo->file_name}}">
                                    <input type="hidden" name="buy_price" value="{{$productInfo->price}}">
                                    <img style="width:220px; height:165px" src="{{asset('images/offers/' . $productInfo->file_name)}}" alt="photo">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group price_ration">
                                    <label>{{trans('السعر')}} : </label>
                                    <input type="number" name="sell_price" value="{{$productInfo->sell_price}}" class="form-control" readonly>
                                    @error('sell_price')
                                    <span class="span-warning">
                                             {{ $errors->first('sell_price')}}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group quantity_ration">
                                    <label>{{trans('الكمية')}} : </label>
                                    <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}">
                                    @error('quantity')
                                    <span class="span-warning">
                                           {{ $errors->first('quantity')}}
                                       </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group total_price_ration">
                                    <label>{{trans('إجمالي المبلغ قبل الخصم')}} : </label>
                                    <input type="number" name="totalBefore" class="form-control" value="{{ old('totalBefore') }}" readonly>
                                    @error('totalBefore')
                                    <span class="span-warning">
                                             {{ $errors->first('totalBefore')}}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group discount_ration">
                                    <label>{{trans('الخصم')}} : </label>
                                    <input type="number" name="discount" value="0" class="form-control">
                                    @error('discount')
                                    <span class="span-warning">
                                           {{ $errors->first('discount')}}
                                       </span>
                                    @enderror
                                    <span>%</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 total_after_ration">
                                <div class="form-group">
                                    <label>{{trans('إجمالي المبلغ بعد الخصم')}} : </label>
                                    <input type="number" name="totalAfter" class="form-control" value="{{ old('totalAfter') }}" readonly>
                                    @error('totalAfter')
                                    <span class="span-warning">
                                             {{ $errors->first('totalAfter')}}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group given_ration">
                                    <label>{{trans('المقدم')}} : </label>
                                    <input type="number" name="given" class="form-control" value="{{ old('given') }}" required>
                                    @error('given')
                                    <span class="span-warning">
                                             {{ $errors->first('given')}}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group remaining_ration">
                                    <label>{{trans('المبلغ المتبقي')}} : </label>
                                    <input type="number" name="remaining" class="form-control" value="{{ old('remaining') }}" readonly>
                                    @error('remaining')
                                    <span class="span-warning">
                                           {{ $errors->first('remaining')}}
                                       </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group months_ration">
                                    <label>{{trans('عدد الأشهر')}} : </label>
                                    <input type="number" name="months" class="form-control" value="{{ old('months') }}" required>
                                    @error('months')
                                    <span class="span-warning">
                                           {{ $errors->first('months')}}
                                       </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ration_value">
                                    <label>{{trans('قيمة القسط')}} : </label>
                                    <input type="number" name="ration" value="0" class="form-control" required>
                                    @error('ration')
                                    <span class="span-warning">
                                             {{ $errors->first('ration')}}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('اسم الضامن')}} : </label>
                                    <input type="text" name="surety" class="form-control" value="{{ old('surety') }}" required>
                                    @error('surety')
                                    <span class="span-warning">
                                           {{ $errors->first('surety')}}
                                       </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('هاتف الضامن')}} : </label>
                                    <input type="text" name="surety_phone" class="form-control" value="{{ old('surety_phone') }}" required>
                                    @error('surety_phone')
                                    <span class="span-warning">
                                           {{ $errors->first('surety_phone')}}
                                       </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('التاريخ')}} : </label>
                                    <input type="date" name="date" class="form-control" value="{{ old('date')}}" id="datepicker-action" data-date-format="yyyy-mm-dd">
                                    @error('date')
                                    <span class="span-warning">
                                           {{ $errors->first('date')}}
                                       </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="parent_id">{{trans('اسم العميل')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2 form-control h-50" name="client_id" required>
                                        <option selected disabled>{{trans('اختر سم العميل')}}...</option>
                                        @foreach($clients as $client)
                                            <option value="{{$client->id}}">{{$client->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('client_id')
                                    <span class="span-warning span-warning-option">
                                           {{ $errors->first('client_id') }}
                                       </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('حفظ')}}</button>
                    </form>
                </div>
            </div>

            <div class="card card-statistics h-100 remain-form">
                <div class="card-body">
                    <h2>آجل</h2>
                    <form action="{{route('store.sell.remain',$productInfo->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="product_id" value="{{$productInfo->id}}">
                            <input type="hidden" name="bigStoreQuantity" class="bigStoreQuantity">
                            <input type="hidden" name="buy_totalPrice" class="buy_totalPrice">
                            <input type="hidden" name="profit" class="profit_remain">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('اسم المنتج')}} : </label>
                                    <input type="text" name="name" class="form-control" value="{{$productInfo->product_name}}" readonly>
                                    @error('name')
                                    <span class="span-warning">
                                             {{ $errors->first('name') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('صورة المنتج')}} : </label>
                                    <input type="hidden" name="photo" value="{{$productInfo->file_name}}">
                                    <input type="hidden" name="buy_price" value="{{$productInfo->price}}">
                                    <img style="width:220px; height:165px" src="{{asset('images/offers/' . $productInfo->file_name)}}" alt="photo">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group price_remain">
                                    <label>{{trans('السعر')}} : </label>
                                    <input type="number" name="sell_price" value="{{$productInfo->sell_price}}" class="form-control" readonly>
                                    @error('sell_price')
                                    <span class="span-warning">
                                             {{ $errors->first('sell_price')}}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group quantity_remain">
                                    <label>{{trans('الكمية')}} : </label>
                                    <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}">
                                    @error('quantity')
                                    <span class="span-warning">
                                           {{ $errors->first('quantity')}}
                                       </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group total_price_remain">
                                    <label>{{trans('إجمالي المبلغ قبل الخصم')}} : </label>
                                    <input type="number" name="totalBefore" class="form-control" value="{{ old('totalBefore') }}" readonly>
                                    @error('totalBefore')
                                    <span class="span-warning">
                                             {{ $errors->first('totalBefore')}}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group discount_remain">
                                    <label>{{trans('الخصم')}} : </label>
                                    <input type="number" name="discount" value="0" class="form-control">
                                    @error('discount')
                                    <span class="span-warning">
                                           {{ $errors->first('discount')}}
                                       </span>
                                    @enderror
                                    <span>%</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 total_after_remain">
                                <div class="form-group">
                                    <label>{{trans('إجمالي المبلغ بعد الخصم')}} : </label>
                                    <input type="number" name="totalAfter" class="form-control" value="{{ old('totalAfter') }}" readonly>
                                    @error('totalAfter')
                                    <span class="span-warning">
                                             {{ $errors->first('totalAfter')}}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group given_remain">
                                    <label>{{trans('المقدم')}} : </label>
                                    <input type="number" name="given" class="form-control" value="{{ old('given') }}" required>
                                    @error('given')
                                    <span class="span-warning">
                                           {{ $errors->first('given')}}
                                       </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group remaining_remain">
                                    <label>{{trans('المبلغ المتبقي')}} : </label>
                                    <input type="number" name="remaining" class="form-control" value="{{ old('remaining') }}" readonly>
                                    @error('remaining')
                                    <span class="span-warning">
                                           {{ $errors->first('remaining')}}
                                       </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('اسم الضامن')}} : </label>
                                    <input type="text" name="surety" class="form-control" value="{{ old('surety') }}" required>
                                    @error('surety')
                                    <span class="span-warning">
                                           {{ $errors->first('surety')}}
                                       </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('هاتف الضامن')}} : </label>
                                    <input type="text" name="surety_phone" class="form-control" value="{{ old('surety_phone') }}" required>
                                    @error('surety_phone')
                                    <span class="span-warning">
                                           {{ $errors->first('surety_phone')}}
                                       </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('التاريخ')}} : </label>
                                    <input type="date" name="date" class="form-control" value="{{ old('date')}}" id="datepicker-action" data-date-format="yyyy-mm-dd">
                                    @error('date')
                                    <span class="span-warning">
                                           {{ $errors->first('date')}}
                                       </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="parent_id">{{trans('اسم العميل')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2 form-control h-50" name="client_id">
                                        <option selected disabled>{{trans('اختر سم العميل')}}...</option>
                                        @foreach($clients as $client)
                                            <option value="{{$client->id}}">{{$client->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('client_id')
                                    <span class="span-warning span-warning-option">
                                           {{ $errors->first('client_id') }}
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
    <!-- row closed -->
@endsection



@section('script')

<script>

    {{--###################### Srart remain form ########################--}}

    $('.quantity_remain input').on('keyup', function (){
    $('.total_price_remain input').val($('.price_remain input').val() * $('.quantity_remain input').val());
    $('.total_after_remain input').val(($('.total_price_remain input').val() - ($('.total_price_remain input').val() * ($('.discount_remain input').val()/100))));
    $('.remaining_remain input').val(($('.total_price_remain input').val() - ($('.total_price_remain input').val() * ($('.discount_remain input').val()/100)))- ($('.given_remain input').val()));
    $('.bigStoreQuantity').val( {{$productInfo->quantity}} - $('.quantity_remain input').val());
    $('.buy_totalPrice').val( {{$productInfo->price}} * $('.quantity_remain input').val());
    $('.profit_remain').val( $('.total_after_remain input').val() - $('.buy_totalPrice').val());
    });

    $('.price_remain input').on('keyup', function (){
    $('.total_price_remain input').val($('.price_remain input').val() * $('.quantity_remain input').val());
    $('.total_after_remain input').val(($('.total_price_remain input').val() - ($('.total_price_remain input').val() * ($('.discount_remain input').val()/100))));
    $('.remaining_remain input').val(($('.total_price_remain input').val() - ($('.total_price_remain input').val() * ($('.discount_remain input').val()/100)))- ($('.given_remain input').val()));
    $('.profit_remain').val( $('.total_after_remain input').val() - $('.buy_totalPrice').val());
    });

    $('.given_remain input').on('keyup', function (){
    $('.remaining_remain input').val(($('.total_price_remain input').val() - ($('.total_price_remain input').val() * ($('.discount_remain input').val()/100)))- ($('.given_remain input').val()));
    });

    $('.discount_remain input').on('keyup', function (){
    $('.total_after_remain input').val(($('.total_price_remain input').val() - ($('.total_price_remain input').val() * ($('.discount_remain input').val()/100))));
    $('.remaining_remain input').val(($('.total_price_remain input').val() - ($('.total_price_remain input').val() * ($('.discount_remain input').val()/100)))- ($('.given_remain input').val()));
    $('.profit_remain').val( $('.total_after_remain input').val() - $('.buy_totalPrice').val());
    });
    {{--###################### End remain form ########################--}}



    {{--###################### Srart ration form ########################--}}

    $('.quantity_ration input').on('keyup', function (){
    $('.total_price_ration input').val($('.price_ration input').val() * $('.quantity_ration input').val());
    $('.remaining_ration input').val(($('.total_price_ration input').val() - ($('.total_price_ration input').val() * ($('.discount_ration input').val()/100)))- ($('.given_ration input').val()));
    $('.total_after_ration input').val(($('.total_price_ration input').val() - ($('.total_price_ration input').val() * ($('.discount_ration input').val()/100))));
    $('.ration_value input').val( $('.remaining_ration input').val() / $('.months_ration input').val());
    $('.bigStoreQuantity').val( {{$productInfo->quantity}} - $('.quantity_ration input').val());
    $('.buy_totalPrice').val( {{$productInfo->price}} * $('.quantity_ration input').val());
    $('.profit_ration').val( $('.total_after_ration input').val() - $('.buy_totalPrice').val());
    });

    $('.price_ration input').on('keyup', function (){
    $('.total_price_ration input').val($('.price_ration input').val() * $('.quantity_ration input').val());
    $('.total_after_ration input').val(($('.total_price_ration input').val() - ($('.total_price_ration input').val() * ($('.discount_ration input').val()/100))));
    $('.remaining_ration input').val(($('.total_price_ration input').val() - ($('.total_price_ration input').val() * ($('.discount_ration input').val()/100)))- ($('.given_ration input').val()));
    $('.ration_value input').val( $('.remaining_ration input').val() / $('.months_ration input').val());
    $('.profit_ration').val( $('.total_after_ration input').val() - $('.buy_totalPrice').val());
    });

    $('.given_ration input').on('keyup', function (){
    $('.remaining_ration input').val(($('.total_price_ration input').val() - ($('.total_price_ration input').val() * ($('.discount_ration input').val()/100)))- ($('.given_ration input').val()));
    });

    $('.discount_ration input').on('keyup', function (){
    $('.remaining_ration input').val(($('.total_price_ration input').val() - ($('.total_price_ration input').val() * ($('.discount_ration input').val()/100)))- ($('.given_ration input').val()));
    $('.total_after_ration input').val(($('.total_price_ration input').val() - ($('.total_price_ration input').val() * ($('.discount_ration input').val()/100))));
    $('.ration_value input').val( $('.remaining_ration input').val() / $('.months_ration input').val());
    $('.profit_ration').val( $('.total_after_ration input').val() - $('.buy_totalPrice').val());
    });

    $('.months_ration input , .given_ration input').on('keyup', function (){
    $('.ration_value input').val( $('.remaining_ration input').val() / $('.months_ration input').val());
    });

    $('.ration_value input').on('keyup', function (){
    $('.months_ration input').val($('.remaining_ration input').val()/$('.ration_value input').val());
    });
    {{--###################### End ration form ########################--}}



    {{--######################### Start cash form ########################--}}

    $('.quantity_cash input').on('keyup', function (){
    $('.total_price_cash input').val($('.price_cash input').val() * $('.quantity_cash input').val());
    $('.given_cash input').val(($('.total_price_cash input').val() - ($('.total_price_cash input').val() * ($('.discount_cash input').val()/100))));
    $('.total_after_cash input').val(($('.total_price_cash input').val() - ($('.total_price_cash input').val() * ($('.discount_cash input').val()/100))));
    $('.bigStoreQuantity').val( {{$productInfo->quantity}} - $('.quantity_cash input').val());
    $('.buy_totalPrice').val( {{$productInfo->price}} * $('.quantity_cash input').val());
    $('.profit_cash').val( $('.total_after_cash input').val() - $('.buy_totalPrice').val());
    });

    $('.price_cash input').on('keyup', function (){
    $('.total_price_cash input').val($('.price_cash input').val() * $('.quantity_cash input').val());
    $('.given_cash input').val(($('.total_price_cash input').val() - ($('.total_price_cash input').val() * ($('.discount_cash input').val()/100))));
    $('.total_after_cash input').val(($('.total_price_cash input').val() - ($('.total_price_cash input').val() * ($('.discount_cash input').val()/100))));
    $('.profit_cash').val( $('.total_after_cash input').val() - $('.buy_totalPrice').val());
    });

    $('.given_ration input').on('keyup', function (){
    $('.given_cash input').val(($('.total_price_cash input').val() - ($('.total_price_cash input').val() * ($('.discount_cash input').val()/100))));
    $('.total_after_cash input').val(($('.total_price_cash input').val() - ($('.total_price_cash input').val() * ($('.discount_cash input').val()/100))));
    });

    $('.discount_cash input').on('keyup', function (){
    $('.given_cash input').val(($('.total_price_cash input').val() - ($('.total_price_cash input').val() * ($('.discount_cash input').val()/100))));
    $('.total_after_cash input').val(($('.total_price_cash input').val() - ($('.total_price_cash input').val() * ($('.discount_cash input').val()/100))));
    $('.profit_cash').val( $('.total_after_cash input').val() - $('.buy_totalPrice').val());
    });
    {{--######################### End cash form ########################--}}



    {{--################### Start display (cash , ration , remain) ###################--}}

    $('.cash_link').on('click', function (){
    $('.cash-form').css({display:'flex'});
    $('.ration-form , .remain-form').css({display:'none'});
    });

    $('.ration_link').on('click', function (){
    $('.ration-form').css({display:'flex'});
    $('.cash-form , .remain-form').css({display:'none'});
    });

    $('.remain_link').on('click', function (){
    $('.remain-form').css({display:'flex'});
    $('.ration-form , .cash-form').css({display:'none'});
    });
    {{--################### End display (cash , ration , remain) ###################--}}

</script>
@endsection
