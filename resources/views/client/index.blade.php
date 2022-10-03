@extends('layouts.master')
@section('css')
@section('title')
    {{trans('عرض العملاء')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('عرض العملاء')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="#" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">قائمه اضافه الموظفين</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th scope="col">الإسم</th>
                                            <th scope="col">الهاتف</th>
                                            <th scope="col">العنوان</th>
                                            <th scope="col">الملاحظات</th>
                                            <th scope="col">الإعدادات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($client as $item)
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>@if($item->phone == null)لا يوجد@else {{$item->phone}}@endif</td>
                                                <td>@if($item->address == null)لا يوجد@else {{$item->address}}@endif</td>
                                                <td>@if($item->notes == null)لا يوجد@else {{$item->notes}}@endif</td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="{{route("show.products.of.client", $item->id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp;  عرض منتجات العميل</a>
                                                            <a class="dropdown-item" href="{{route("clients.edit", $item->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;  تعديل بيانات العميل</a>
                                                            <a class="dropdown-item" href="{{route("soft.delete.client", $item->id)}}"><i style="color: red" class="fa fa-trash"></i>&nbsp;  حذف العميل</a>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
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
