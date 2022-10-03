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



@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">

            @if($sell->remaining == 0)
                <div class="card card-statistics h-100 cash-form">
                    <div class="card-body">
                        <h2>فوري</h2>
                        <form enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="profit" class="profit_cash">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{trans('اسم المنتج')}} : </label>
                                        <input type="text" name="name" class="form-control" value="{{$sell->name}}" readonly>
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
                                        <img style="width:220px; height:165px" src="{{asset('images/offers/' . $sell->photo)}}" alt="photo">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group price_cash">
                                        <label>{{trans('السعر')}} : </label>
                                        <input type="number" name="sell_price" value="{{$sell->sell_price}}" class="form-control" readonly>
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
                                        <input type="number" name="quantity" class="form-control" value="{{ $sell->quantity }}" readonly>
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
                                        <input type="number" name="totalBefore" class="form-control" value="{{ $sell->totalBefore }}" readonly>
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
                                        <input type="number" name="discount" value="0" class="form-control" readonly>
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
                                        <input type="number" name="totalAfter" class="form-control" value="{{ $sell->totalAfter }}" readonly>
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
                                        <input type="number" name="given" class="form-control" value="{{ $sell->given }}" readonly>
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
                                        <input type="date" name="date" class="form-control" value="{{ $sell->date}}" id="datepicker-action" data-date-format="yyyy-mm-dd" readonly>
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
                                        <select class="custom-select mr-sm-2 form-control h-50" name="client_id" readonly>
                                            <option>{{$sell->client->name}}</option>
                                        </select>
                                        @error('client_id')
                                        <span class="span-warning span-warning-option">
                                           {{ $errors->first('client_id') }}
                                       </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            @endif

            @if($sell->months > 0)
                <div class="card card-statistics h-100 ration-form">
                    <div class="card-body">
                        <h2>قسط</h2>
                        <form action="{{ route('store.sell.ration',$sell->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="profit" class="profit_ration">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{trans('اسم المنتج')}} : </label>
                                        <input type="text" name="name" class="form-control" value="{{$sell->name}}" readonly>
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
                                        <img style="width:220px; height:165px" src="{{asset('images/offers/' . $sell->photo)}}" alt="photo">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group price_ration">
                                        <label>{{trans('السعر')}} : </label>
                                        <input type="number" name="sell_price" value="{{$sell->sell_price}}" class="form-control" readonly>
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
                                        <input type="number" name="quantity" class="form-control" value="{{ $sell->quantity }}" readonly>
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
                                        <input type="number" name="totalBefore" class="form-control" value="{{ $sell->totalBefore }}" readonly>
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
                                        <input type="number" name="discount" value="0" class="form-control" readonly>
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
                                        <input type="number" name="totalAfter" class="form-control" value="{{ $sell->totalAfter }}" readonly>
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
                                        <input type="number" name="given" class="form-control" value="{{ $sell->given }}" readonly>
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
                                        <input type="number" name="remaining" class="form-control" value="{{ $sell->remaining }}" readonly>
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
                                        <input type="number" name="months" class="form-control" value="{{ $sell->months }}" readonly>
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
                                        <input type="number" name="ration" value="{{$sell->ration}}" class="form-control" readonly>
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
                                        <input type="text" name="surety" class="form-control" value="{{ $sell->surety }}" readonly>
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
                                        <input type="text" name="surety_phone" class="form-control" value="{{ $sell->surety_phone }}" readonly>
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
                                        <input type="date" name="date" class="form-control" value="{{ $sell->date}}" id="datepicker-action" data-date-format="yyyy-mm-dd" readonly>
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
                                        <select class="custom-select mr-sm-2 form-control h-50" name="client_id" readonly>
                                            <option>{{$sell->client->name}}</option>
                                        </select>
                                        @error('client_id')
                                        <span class="span-warning span-warning-option">
                                           {{ $errors->first('client_id') }}
                                       </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif

            @if($sell->surety !== 0 and $sell->months == 0 and $sell->remaining != 0)
                <div class="card card-statistics h-100 remain-form">
                    <div class="card-body">
                        <h2>آجل</h2>
                        <form action="{{route('store.sell.remain',$sell->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="profit" class="profit_remain">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{trans('اسم المنتج')}} : </label>
                                        <input type="text" name="name" class="form-control" value="{{$sell->name}}" readonly>
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
                                        <img style="width:220px; height:165px" src="{{asset('images/offers/' . $sell->photo)}}" alt="photo">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group price_remain">
                                        <label>{{trans('السعر')}} : </label>
                                        <input type="number" name="sell_price" value="{{$sell->sell_price}}" class="form-control" readonly>
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
                                        <input type="number" name="quantity" class="form-control" value="{{ $sell->quantity }}" readonly>
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
                                        <input type="number" name="totalBefore" class="form-control" value="{{ $sell->totalBefore }}" readonly>
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
                                        <input type="number" name="discount" value="{{$sell->discount}}" class="form-control" readonly>
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
                                        <input type="number" name="totalAfter" class="form-control" value="{{ $sell->totalAfter }}" readonly>
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
                                        <input type="number" name="given" class="form-control" value="{{ $sell->given }}" readonly>
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
                                        <input type="number" name="remaining" class="form-control" value="{{ $sell->remaining }}" readonly>
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
                                        <input type="text" name="surety" class="form-control" value="{{ $sell->surety }}" readonly>
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
                                        <input type="text" name="surety_phone" class="form-control" value="{{ $sell->surety_phone }}" readonly>
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
                                        <input type="date" name="date" class="form-control" value="{{ $sell->date}}" id="datepicker-action" data-date-format="yyyy-mm-dd" readonly>
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
                                        <select class="custom-select mr-sm-2 form-control h-50" name="client_id" readonly>
                                            <option>{{$sell->client->name}}</option>
                                        </select>
                                        @error('client_id')
                                        <span class="span-warning span-warning-option">
                                           {{ $errors->first('client_id') }}
                                       </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            @endif

        </div>
    </div>
    <!-- row closed -->
@endsection





