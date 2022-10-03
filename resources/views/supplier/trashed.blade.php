@extends('layouts.master')
@section('css')
@section('title')
    {{trans('عرض الموردين المحذوفين')}}
@stop
@endsection
@section('page-header')
@section('PageTitle')
    {{trans('عرض الموردين المحذوفين')}}
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
                                                <td>{{$item->address}}</td>
                                                <td>{{$item->phone}}</td>
                                                <td>{{$item->notes}}</td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="{{route("supplier.back.from.trash", $item->id)}}"><i style="color: green" class="far fa-square"></i>&nbsp;إعادة تخزين </a>
                                                            <a class="dropdown-item" href="{{route("supplier.delete_from.database", $item->id)}}"><i style="color: red" class="far fa-trash"></i>&nbsp;الحذف نهائيا </a>
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
