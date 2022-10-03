@extends('layouts.master')
@section('css')
@section('title')
    {{trans('عرض المبالغ المضافة للخزينة')}}
@stop
@endsection
@section('page-header')
@section('PageTitle')
    {{trans('عرض المبالغ المضافة للخزينة')}}
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
                                            <th scope="col">المبلغ المدفوع</th>
                                            <th scope="col">الملاحظات</th>
                                            <th scope="col">التاريخ</th>
                                            <th scope="col">الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($added_money as $item)
                                            <tr>
                                                <td>{{ $item->added }}</td>
                                                <td>{{ $item->notes }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="{{route("safe.edit", $item->id)}}"><i style="color:green" class="far fa-edit"></i>&nbsp;تعديل</a>
                                                            <a class="dropdown-item" href="{{route("safe.forceDelete", $item->id)}}"><i style="color:red" class="far fa-trash"></i>&nbsp;الحذف نهائيا</a>
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
