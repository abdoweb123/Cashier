@extends('layouts.master')
@section('css')
@section('title')
    {{trans('مخزن المشتريات')}}
@stop
@endsection
@section('page-header')
@section('PageTitle')
    {{trans('مخزن المشتريات')}}
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
                                            <th scope="col">اسم المنتج</th>
                                            <th scope="col">صورة المنتج</th>
                                            <th scope="col">الكمية</th>
                                            <th scope="col">اسم المورد</th>
                                            <th scope="col">سعر الشراء</th>
                                            <th scope="col">سعر البيع</th>
                                            <th scope="col">الإجمالي</th>
                                            <th scope="col">المبلغ المدفوع</th>
                                            <th scope="col">المبلغ المتبقي</th>
                                            <th scope="col col_action">الإعدادات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $item)
                                            <tr>
                                                <td>{{ $item->product_name }}</td>
                                                <td><img style="width:100px; height:50px" src="{{asset('images/offers/' . $item->file_name)}}"></td>
                                                <td>{{ $item->quantity}}</td>
                                                <td>{{ $item->supplier->name}}</td>
                                                <td>{{ $item->price }} جنيه </td>
                                                <td>{{ $item->sell_price }} جنيه </td>
                                                <td>{{ $item->total }}</td>
                                                <td>{{ $item->paid_money }}</td>
                                                <td>{{ $item->remain_money }}</td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="{{route("delete.buy", $item->id)}}"><i style="color: red" class="far fa-trash "></i>&nbsp;الحذف نهائياً</a>
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
