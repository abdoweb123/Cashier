@extends('layouts.master')
@section('css')
@section('title')
    {{trans('عرض منتجات المورد')}}
@stop
@endsection
@section('page-header')
@section('PageTitle')
    {{trans('عرض منتجات المورد')}}
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

                                    <table class="table-bordered text-center my-3 mb-3 mx-auto">
                                        <tr>
                                            @foreach($supplierName as $item)
                                                <td class="p-2"> اسم المورد : {{$item->name}}</td>
                                            @endforeach
                                            <td class="p-2">المبلغ الكلّي : {{$sumProducts->sum('total')}}</td>
                                            <td class="p-2">المبلغ الكلّي المدفوع : {{$sumProducts->sum('paid_money')+$sumPayments}}</td>
                                            <td class="p-2">المبلغ المتبقي : {{$sumProducts->sum('remain_money')-$sumPayments}}</td>
                                            <td class="p-2"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">دفع مبلغ له</button></td>
                                            <td class="p-2"><a type="button" class="btn btn-success link-nav" href="{{route('invoices.index',$id)}}">المدفوعات</a></td>
                                        </tr>
                                    </table>



                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th scope="col">اسم المنتج</th>
                                            <th scope="col">الصورة</th>
                                            <th scope="col">الكمية</th>
                                            <th scope="col">سعر الشراء</th>
                                            <th scope="col">سعر البيع</th>
                                            <th scope="col">الإجمالي</th>
                                            <th scope="col">المبلغ المدفوع</th>
                                            <th scope="col">المبلغ المتبقي</th>
                                            <th scope="col">نوع الفاتورة</th>
                                            <th scope="col">الإعدادات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($suppliersProducts as $item)
                                            <tr>
                                                <td>{{ $item->product_name }}</td>
                                                <td><img style="width:100px; height:50px" src="{{asset('images/offers/' . $item->file_name)}}"></td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->price }} جنيه </td>
                                                <td>{{ $item->sell_price }} جنيه </td>
                                                <td>{{ $item->total }}</td>
                                                <td>{{ $item->paid_money }}</td>
                                                <td>{{ $item->remain_money }}</td>
                                                @if($item->remain_money > 0)
                                                    <td>آجل</td>
                                                @elseif($item->remain_money == 0)
                                                    <td>فوري</td>
                                                @endif
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="{{route("delete.buy", $item->id)}}"><i style="color: red" class="far fa-trash"></i>&nbsp;الحذف نهائيا</a>
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

            <!-- make invoice for supplier -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">دفع مبلغ للمورد</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('pay.money.for.supplier', $id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="client_id" class="form-control" value="{{$id}}">
                                        <div class="form-group">
                                            <label>{{trans('المبلغ المدفوع')}} : </label>
                                            <input type="text" name="paid_all" class="form-control" value="{{old('paid_all')}}">
                                            @error('paid_all')
                                            <span class="span-warning">
                                                     {{ $errors->first('paid_all') }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{trans('الملاحظات')}} : </label>
                                            <input type="text" name="paid_notes" class="form-control" value="{{old('paid_notes')}}">
                                            @error('paid_notes')
                                            <span class="span-warning">
                                                     {{ $errors->first('paid_notes') }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{trans('التاريخ')}} : </label>
                                            <input type="text" name="paid_date" class="form-control" value="{{old('paid_date')}}" id="datepicker-action" data-date-format="yyyy-mm-dd">
                                            @error('paid_date')
                                            <span class="span-warning">
                                             {{ $errors->first('paid_date') }}
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                </div>
                            </form>

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
