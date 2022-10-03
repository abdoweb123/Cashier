@extends('layouts.master')
@section('css')
@section('title')
    {{trans(' تعديل المبلغ المضاف للخزينة')}}
@stop
@endsection

@section('PageText')

    تعديل المبلغ المضاف للخزينة
@stop
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    الخزينة
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <form action="{{route('safe.update', $safe->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('المبلغ المدفوع')}} : </label>
                                    <input type="number" name="added" class="form-control" value="{{$safe->added}}">
                                    @error('added')
                                    <span class="span-warning">
                                             {{ $errors->first('added') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('الملاحظات')}} : </label>
                                    <input type="text" name="notes" class="form-control" value="{{$safe->notes}}">
                                    @error('notes')
                                    <span class="span-warning">
                                            {{ $errors->first('notes') }}
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
