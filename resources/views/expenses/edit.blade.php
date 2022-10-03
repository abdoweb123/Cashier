@extends('layouts.master')
@section('css')
@section('title')
    {{trans('تعديل مصروف')}}
@stop
@endsection

@section('PageText')

    تعديل مصروف
@stop
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    قائمة المصروفات
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <form action="{{route('expenses.update', $expense->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('جهة الصرف')}} : </label>
                                    <input type="text" name="expenses_side" class="form-control" value="{{$expense->expenses_side}}">
                                    @error('expenses_side')
                                    <span class="span-warning">
                                             {{ $errors->first('expenses_side') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('المبلغ المدفوع')}} : </label>
                                    <input type="text" name="paid_money" class="form-control" value="{{$expense->paid_money}}">
                                    @error('paid_money')
                                    <span class="span-warning">
                                            {{ $errors->first('paid_money') }}
                                       </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('التاريخ')}} : </label>
                                    <input type="text" name="paid_date" class="form-control" value="{{$expense->paid_date}}">
                                    @error('paid_date')
                                    <span class="span-warning">
                                           {{ $errors->first('paid_date') }}
                                       </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('الملاحظات')}} : </label>
                                    <input type="text" name="paid_notes" class="form-control" value="{{$expense->paid_notes}}">
                                    @error('paid_notes')
                                    <span class="span-warning">
                                           {{ $errors->first('paid_notes') }}
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
