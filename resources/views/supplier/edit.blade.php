@extends('layouts.master')
@section('css')
@section('title')
    {{trans('تعديل بيانات المورد')}}
@stop
@endsection

@section('PageText')

    تعديل بيانات المورد
@stop
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    قائمة الموردين
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <form action="{{route('suppliers.update', $supplier->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('اسم المورد')}} : </label>
                                    <input type="text" name="name" class="form-control" value="{{$supplier->name}}" required>
                                    @error('name')
                                    <span class="span-warning">
                                           {{ $errors->first('name') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('العنوان')}} : </label>
                                    <input type="text" name="address" class="form-control" value="@if($supplier->address == null)لا يوجد@else {{$supplier->address}}@endif">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('الهاتف')}} : </label>
                                    <input type="text" name="phone" class="form-control" value="@if($supplier->phone == null)لا يوجد@else {{$supplier->phone}}@endif">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('الملاحظات')}} : </label>
                                    <input type="text" name="notes" class="form-control" value="@if($supplier->notes == null) لا يوجد@else {{$supplier->notes}}@endif">
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
