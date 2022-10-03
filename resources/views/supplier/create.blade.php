@extends('layouts.master')
@section('css')
@section('title')
    {{trans('إضافة مورد جديد')}}
@stop
@endsection

@section('PageText')

    إضافة مورد جديد
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

                    <form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('اسم المورد')}} : </label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
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
                                    <input type="text" name="address" class="form-control" value="{{ old('address')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('الهاتف')}} : </label>
                                    <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('الملاحظات')}} : </label>
                                    <input type="text" name="notes" class="form-control" value="{{old('notes')}}">
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
