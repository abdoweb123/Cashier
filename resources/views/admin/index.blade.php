@extends('layouts.master')
@section('css')
@section('title')
    {{trans('عرض منتجات المخزن')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('عرض منتجات المخزن')}}
@stop
<!-- breadcrumb -->
@endsection

@section('style')
    #datatable_filter , #datatable_length
    {
        display:none;
    }
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <div class="message-search">
                        @if(session('status'))
                            <div class="alert alert-primary mt-3">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="#" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">قائمه اضافه الموظفين</a><br><br>


                                <form action="{{route('product_ForAdmin.index')}}" method="GET">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" name="search" class="form-control" value="{{request()->search}}">
                                        </div>

                                        <div class="col-md-4">
                                            <select name="category_id" class="form-control h-100">
                                                    <option value="">كل الأقسام</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{request()->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-4 m-auto">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> ابحث</button>
                                        </div>
                                    </div>
                                </form>


                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th scope="col">الإسم</th>
                                            <th scope="col">الصورة</th>
                                            <th scope="col">الكمية</th>
                                            <th scope="col">السعر</th>
                                            <th scope="col col_action">الإعدادات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{--                                        @foreach($students as $student)--}}
                                        @foreach($products as $item)
                                        <tr>
                                            <td>{{ $item->product_name }}</td>
                                            <td><img style="width:100px; height:50px" src="{{asset('images/offers/' . $item->file_name)}}"></td>
                                            <td>{{ $item->quantity   }}</td>
                                            <td>{{ $item->sell_price }} جنيه</td>

                                            <td>
                                                <div class="dropdown show">
                                                    <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        العمليات
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="{{route("product_ForAdmin.edit", $item->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;  تعديل سعر المنتج</a>
                                                        <a class="dropdown-item" href="{{route("productForAdmin.soft.delete", $item->id)}}"><i style="color: red" class="fa fa-trash"></i>&nbsp;  حذف بيانات المنتج</a>
                                                    </div>


                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        {{--                                        @include('pages.Students.Delete')--}}
                                        {{--                                        @endforeach--}}
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection

