@extends('layouts.master')
@section('css')
@section('title')
    {{trans('إضافة عميل جديد')}}
@stop
@endsection

@section('PageText')

    قائمه العملاء
@stop
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    إضافة العملاء
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('إضافة عميل جديد')}}</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('اسم العميل')}} : </label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name')}}">
                                    @error('name')
                                        <span class="text-danger">
                                             {{ $errors->first('name') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('عنوان العميل')}} : </label>
                                    <input type="text" name="address" class="form-control" value="{{ old('address')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('هاتف العميل')}} : </label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone')}}">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('ملاحظات')}} :</label>
                                    <input type="text" name="notes" class="form-control" value="{{ old('notes')}}">
                                </div>
                            </div>

                        </div>


                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('إرسال')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
