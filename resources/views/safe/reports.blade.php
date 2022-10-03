@extends('layouts.master')
@section('css')
@section('title')
    {{trans('عرض تفاصيل الأرباح')}}
@stop
@endsection
@section('page-header')
@section('PageTitle')
    {{trans('عرض تفاصيل الأرباح')}}
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
                                            <th scope="col">إجمالي المبيعات</th>
                                            <th scope="col">إجمالي التكلفة</th>
                                            <th scope="col">إجمالي الربح</th>
                                            <th scope="col">نسبة الربح</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($products == true)
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$product->totalAfter}}</td>
                                                    <td>{{$product->buy_totalPrice}}</td>
                                                    <td>{{$product->profit}}</td>
                                                    @php
                                                        $percent = ($product->profit/$product->totalAfter)*100;
                                                    @endphp
                                                    <td>{{number_format((float)$percent,2,'.','')}}%</td>
                                                </tr>
                                        @endforeach
                                        @endif
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
