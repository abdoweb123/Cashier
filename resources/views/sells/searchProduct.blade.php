@extends('layouts.master')
@section('css')
@section('title')
    {{trans('تحديد منتج لبييعه')}}
@stop
@endsection
@section('page-header')
@section('PageTitle')
    {{trans('تحديد منتج لبييعه')}}
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

                                    <div class="div-search">
                                        <form class="d-flex justify-content-end w-25" action="{{route('search.product')}}" method="get">
                                            @csrf
                                            <input type="text" name="input_search" id="q" class="form-control d-inline h-50" style="padding: 0.6rem 0.75rem;" placeholder="ابحث عن منتج .... ">
                                            <button type="submit" class="btn btn-success mb-2 btn-search">ابحث</button>
                                        </form>
                                    </div>

                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th scope="col">اسم المنتج</th>
                                            <th scope="col">السعر</th>
                                            <th scope="col">الكمية</th>
                                            <th scope="col">الإجمالي</th>
                                            <th scope="col">الإعدادات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($productsFromBigStore == true)
                                            @foreach($productsFromBigStore as $item)
                                                <tr>
                                                    <td>{{ $item->product_name }}</td>
                                                    <td>{{ $item->sell_price }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>{{ $item->total}}</td>
                                                    <td>
                                                        <div class="dropdown show">
                                                            <a class="btn btn-success btn-sm" href="{{route("create.sell", $item->id)}}" role="button">
                                                                فاتورة  بيع
                                                            </a>
                                                        </div>
                                                    </td>
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

@section('style')
    .row .dataTables_length , .row label
    {
        display:none;
    }

@endsection
