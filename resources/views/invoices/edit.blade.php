@extends('layouts.master')
@section('css')
@section('title')
    {{trans('تعديل فاتورة المورد')}}
@stop
@endsection

@section('PageText')

    تعديل فاتورة المورد
@stop
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    فواتير الموردين
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <form action="{{route('update.invoice', $invoice->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <input type="hidden" name="supplier_id" value="{{$invoice->supplier_id}}">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('المبلغ المدفوع')}} : </label>
                                    <input type="text" name="paid_all" class="form-control" value="{{$invoice->paid_all}}">
                                    @error('paid_all')
                                    <span class="span-warning">
                                             {{ $errors->first('paid_all') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('الملاحظات')}} : </label>
                                    <input type="text" name="paid_notes" class="form-control" value="{{$invoice->paid_notes}}">
                                    @error('paid_notes')
                                    <span class="span-warning">
                                           {{ $errors->first('paid_notes') }}
                                       </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('التاريخ')}} : </label>
                                    <input type="text" name="paid_date" class="form-control" value="{{$invoice->paid_date}}" id="datepicker-action" data-date-format="yyyy-mm-dd">
                                    @error('paid_date')
                                    <span class="span-warning">
                                           {{ $errors->first('paid_date') }}
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
    <!-- row closed -->
@endsection
