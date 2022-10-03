@extends('layouts.master')
@section('css')
@section('title')
    {{trans('عرض المنتجات المباعة')}}
@stop
@endsection
@section('page-header')
@section('PageTitle')
    {{trans('عرض المنتجات المباعة')}}
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
                                    <table id="datatable" class="table table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th scope="col">اسم المنتج</th>
                                            <th scope="col">السعر</th>
                                            <th scope="col">الكمية</th>
                                            <th scope="col">الباقي</th>
                                            <th scope="col">العميل</th>
                                            <th scope="col">النوع</th>
                                            <th scope="col">الإعدادات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sells as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->sell_price }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->remaining}}</td>
                                                <td>{{ $item->client->name}}</td>
                                                @if($item->remaining != 0 && $item->months == 0)
                                                    <td>آجل</td>
                                                @elseif($item->remaining == 0)
                                                    <td>فوري</td>
                                                @elseif($item->remaining != 0 && $item->months != 0)
                                                    <td>قسط</td>
                                                @endif
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="{{route("sells.show", $item->id)}}"><i style="color: #ffc107" class="far fa-eye"></i>&nbsp;تفاصيل</a>
                                                            <a class="dropdown-item" href="{{route("sells.edit", $item->id)}}"><i style="color: green" class="far fa-edit"></i>&nbsp;تعديل</a>
                                                            <a class="dropdown-item" href="{{route("softDelete.sell", $item->id)}}"><i style="color: red" class="far fa-trash"></i>&nbsp;حذف</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
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



