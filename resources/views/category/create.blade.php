@extends('layouts.master')
@section('css')
@section('title')
    {{trans('إضافة قسم')}}
@stop
@endsection

@section('PageText')

    إضافة قسم
@stop
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    الأقسام
@stop
<!-- breadcrumb -->
@endsection


@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{ route('category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{trans('اسم القسم')}} : </label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
                                    @error('name')
                                    <span class="span-warning">
                                             {{ $errors->first('name') }}
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



