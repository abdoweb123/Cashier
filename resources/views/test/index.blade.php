@extends('layouts.master')
@section('css')
@section('title')
    {{trans('test index')}}
@stop
@endsection
@section('page-header')
@section('PageTitle')
    {{trans('test index')}}
@stop

@endsection

{{--@section('style')--}}


{{--    #datatable_info , #--}}

{{--@endsection--}}

@section('content')

    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card h-100">
                            <div class="card-body">
                                <a href="{{route('invoice.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;إضافة فاتورة</a><br><br>
                                <div class="table-responsive">
                                    <table class="table  table-hover table-sm table-bordered p-0"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th scope="col">اسم العميل</th>
                                            <th scope="col">تاريخ الفاتورة</th>
                                            <th scope="col">إجمالي المستحقات</th>
                                            <th scope="col">العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($invoices == true)
                                            @foreach($invoices as $item)
                                            <tr>
                                                <td><a href="{{route('invoice.show', $item->id)}}">{{$item->customer_name}}</a></td>
                                                <td>{{$item->invoice_date}}</td>
                                                <td>{{$item->total_due}}</td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="{{route('invoice.edit', $item->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;تعديل بيانات الفاتورة</a>
                                                            <a class="dropdown-item" href="{{route('invoice.delete', $item->id)}}"><i style="color:red" class="fa fa-trash"></i>&nbsp;حذف الفاتورة</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4">
                                                    <div class="float-right">
                                                        {!! $invoices->links() !!}
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
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


@section('script')

    <script>

        $(document).ready(function (){
             $('#datatable_info').parent().parent().remove();
        });

    </script>

@endsection


@section('js')
    @toastr_js
    @toastr_render
@endsection
