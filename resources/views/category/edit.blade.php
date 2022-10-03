@extends('layouts.master')
@section('css')
@section('title')
    {{trans('تعديل قسم')}}
@stop
@endsection

@section('PageText')

    تعديل قسم
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
                    <form action="{{ route('category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{trans('اسم القسم')}} : </label>
                                    <input type="text" name="name" class="form-control" value="{{$category->name}}" required>
                                    @error('name')
                                    <span class="span-warning">
                                             {{ $errors->first('name') }}
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



