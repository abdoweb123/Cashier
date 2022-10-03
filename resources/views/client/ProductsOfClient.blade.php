@extends('layouts.master')
@section('css')
@section('title')
    {{trans('عرض منتجات العميل')}}
@stop
@endsection
@section('page-header')
@section('PageTitle')
    {{trans('عرض منتجات العميل')}}
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
                                            <td class="p-2">اسم العميل : {{$clientName}}</td>
                                            <td class="p-2">المبلغ الكلّي : {{$sumSells->sum('totalAfter')}}</td>
                                            <td class="p-2">المبلغ الكلّي المدفوع : {{$sumSells->sum('given') + $sumPayments}}</td>
                                            <td class="p-2">المبلغ المتبقي : {{$sumSells->sum('remaining') - $sumPayments}}</td>
                                            <td class="p-2"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">دفع مبلغ عليه</button></td>
                                            <td class="p-2"><a type="button" class="btn btn-success link-nav" href="{{route('invoices.client.index', $id)}}">المدفوعات</a></td>

                                        </tr>
                                    </table>
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                               data-page-length="50"
                                               style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th scope="col">اسم المنتج</th>
                                                <th scope="col">صورة المنتج</th>
                                                <th scope="col">نوع الفاتورة</th>
                                                <th scope="col">الكمية</th>
                                                <th scope="col">سعر الشراء</th>
                                                <th scope="col">سعر البيع</th>
                                                <th scope="col">المكسب</th>
                                                <th scope="col">السعر قبل الخصم</th>
                                                <th scope="col">الخصم</th>
                                                <th scope="col">السعر بعد الخصم</th>
                                                <th scope="col">المبلغ المدفوع</th>
                                                <th scope="col">المبلغ المتبقي</th>
                                                <th scope="col">عدد الشهور</th>
                                                <th scope="col">قيمة القسط</th>
                                                <th scope="col">اسم الضامن</th>
                                                <th scope="col">رقم الضامن</th>
                                                <th scope="col col_action">الإعدادات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($productsOfClient as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td><img style="width:100px; height:50px" src="{{asset('images/offers/' . $item->photo)}}"></td>
                                                    @if($item->remaining != 0 and $item->months == 0)
                                                        <td>آجل</td>
                                                    @elseif($item->remaining != 0 and $item->months != 0)
                                                        <td class="text-red text-bold-400">قسط</td>
                                                    @elseif($item->remaining == 0)
                                                        <td>فوري</td>
                                                    @endif
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>{{ $item->buy_price }} Pound</td>
                                                    <td>{{ $item->sell_price }} Pound</td>
                                                    <td>{{ $item->profit}}</td>
                                                    <td>{{ $item->totalBefore}}</td>
                                                    <td>{{ $item->discount}}</td>
                                                    <td>{{ $item->totalAfter}}</td>
                                                    <td>{{ $item->given}}</td>
                                                    <td>{{ $item->remaining}}</td>
                                                    <td>{{ $item->months}}</td>
                                                    <td>{{ $item->ration}}</td>
                                                    <td>{{ $item->surety}}</td>
                                                    <td>{{ $item->surety_phone}}</td>
                                                    <td>
                                                        <div class="dropdown show">
                                                            <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                العمليات
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a class="dropdown-item" href="{{route("softDelete.sell", $item->id)}}"><i style="color: red" class="far fa-trash "></i>&nbsp;  حذف إلى سلة المهملات</a>
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

            <!-- make invoice for client -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">دفع مبلغ على العميل</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('get.money.from.client')}}" method="POST" enctype="multipart/form-data">
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
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
