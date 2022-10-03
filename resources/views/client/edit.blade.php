@extends('layouts.master')
@section('css')
@section('title')
    {{trans('main_trans.add_student')}}
@stop
@endsection

@section('PageText')

    قائمه العملاء
@stop
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    تعديل بيانات العملاء
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <form action="{{route('clients.update', $client->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('تعديل بيانات العميل')}}</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('اسم العميل')}} : </label>
                                    <input type="text" name="name" class="form-control" value="{{$client->name}}">
                                    @error('name')
                                    <span class="span-warning">
                                             {{ $errors->first('name') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('عنوان العميل')}} : </label>
                                    <input type="text" name="address" class="form-control" value="@if($client->address == null)لا يوجد@else {{$client->address}}@endif">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('هاتف العميل')}} : </label>
                                    <input type="text" name="phone" class="form-control" value="@if($client->phone == null)لا يوجد@else {{$client->phone}}@endif">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('ملاحظات')}} :</label>
                                    <input type="text" name="notes" class="form-control" value="@if($client->notes == null)لا يوجد@else {{$client->notes}}@endif">
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
