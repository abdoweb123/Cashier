@extends('layouts.master')
@section('css')
@section('title')
    {{trans('عرض الموردين')}}
@stop
@endsection
@section('page-header')
@section('PageTitle')
    {{trans('عرض الموردين')}}
@stop

@endsection
@section('content')

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
                                            <th scope="col">العنوان</th>
                                            <th scope="col">الهاتف</th>
                                            <th scope="col">الملاحظات</th>
                                            <th scope="col">الإعدادات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($suppliers as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>@if($item->address == null)لا يوجد@else {{$item->address}}@endif</td>
                                                <td>@if($item->phone == null)لا يوجد@else {{$item->phone}}@endif</td>
                                                <td>@if($item->notes == null)لا يوجد@else {{$item->notes}}@endif</td>

                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="{{route("suppliers.edit", $item->id)}}"><i style="color: green" class="far fa-edit"></i>&nbsp;تعديل </a>
                                                            <a class="dropdown-item" href="{{route("productOfSupplier", $item->id)}}"><i style="color: greenyellow" class="far fa-money"></i>&nbsp;حساب </a>
                                                            <a class="dropdown-item" href="{{route("supplier.soft.delete", $item->id)}}"><i style="color: red" class="far fa-trash"></i>&nbsp;حذف </a>
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
