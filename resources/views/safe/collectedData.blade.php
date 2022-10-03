@extends('layouts.master')

@section('title')
    عرض تفاصيل الخزينة
@endsection


@section('style')

    .container a{
        color:black !important;
        text-decoration:none;
    }


    .table{
        border-color: antiquewhite;
        margin-bottom: 0;
    }
    .table thead{
        border:none
    }
    tr td{width:20%}
    .my-container{
        margin:50px auto;
    }
    .my-container .content{
    margin-right:0 !important;
    }

    ul{
        list-style:none;
        margin:0;
        padding:0
    }
    #my-taps li{
        display:inline-block;
        background-color:#eee;
        padding:5px;
        cursor:pointer
    }
    #my-taps .inactive{
        background-color:#ddd;
    }
    .my-container > div{
        background-color:#eee;
        padding:10px;
    }
    #general_view-content div:not(:first-of-type){display:none}


    #collected_data-content div{
        padding:5px 10px;
        background-color:white;
    }
    #collected_data-content .d-inline-block{
        background-color:#eee;
    }
    #collected_data-content .content{
        display: flex;
        justify-content: space-between;
        background-color:#eee;
    }


@endsection



@section('content')

    <!-- show invoice of supplier -->
    <div class="container">


        <div class="options">

            <div class="my-container" id="collected_data-content">

                <div class="row">
                    <div class="col-md-6">
                        <ul class="text-center" id="my-taps_xy">
                            <li>المبيعات</li>
                        </ul>
                        <div class="text-end">
                            <div class="content">
                                <div class="d-inline-block">إجمالي المبيعات</div>
                                <div class="d-inline-block">{{$salesTotal}}</div>
                            </div>
{{--                            <div class="content">--}}
{{--                                <div class="d-inline-block">إجمالي المرتجعات</div>--}}
{{--                                <div class="d-inline-block">0.00</div>--}}
{{--                            </div>--}}
{{--                            <div class="content">--}}
{{--                                <div class="d-inline-block">إجمالي الخصومات</div>--}}
{{--                                <div class="d-inline-block">0.00</div>--}}
{{--                            </div>--}}
{{--                            <div class="content">--}}
{{--                                <div class="d-inline-block">صافي المبيعات</div>--}}
{{--                                <div class="d-inline-block">0.00</div>--}}
{{--                            </div>--}}
                            <div class="content">
                                <div class="d-inline-block">المسدد من المبيعات</div>
                                <div class="d-inline-block">{{$salesGiven}}</div>
                            </div>
                            <div class="content">
                                <div class="d-inline-block"> المتبقي عند العملاء من الفواتير الآجلة والقسط</div>
                                <div class="d-inline-block">{{$salesRemain}}</div>
                            </div>
                            <div class="content">
                                <div class="d-inline-block">إجمالي الأرباح</div>
                                <div class="d-inline-block">{{$salesProfits}}</div>
                            </div>
                            <div class="content">
                                <div class="d-inline-block">إجمالي المصروفات</div>
                                <div class="d-inline-block">{{$expenses}}</div>
                            </div>
                            <div class="content">
                                <div class="d-inline-block">إجمالي الأرباح بعد خصم المصروفات</div>
                                <div class="d-inline-block">{{$salesProfitsMinusExpenses}}</div>
                            </div>
                            <div class="content">
                                <div class="d-inline-block">نسبة الأرباح</div>
                                <div class="d-inline-block">{{number_format((float)$profitPercent,2,'.','')}}%</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <ul class="text-center" id="my-taps_xy">
                            <li id="tapy" class="inactive">المشتريات</li>
                        </ul>
                        <div class="text-end">
                            <div class="content">
                                <div class="d-inline-block">إجمالي المشتريات</div>
                                <div class="d-inline-block">{{$storeTotal}}</div>
                            </div>
                            <div class="content">
                                <div class="d-inline-block">إجمالي المبالغ المدفوعة</div>
                                <div class="d-inline-block">{{$totalPaidToSuppliers}}</div>
                            </div>
                            <div class="content">
                                <div class="d-inline-block">إجمالي المبالغ المتبقية للموردين</div>
                                <div class="d-inline-block">{{$totalRemainToSuppliers}}</div>
                            </div>
                        </div>
                        <div class="search_history">

                            <form action="{{route('collected.data')}}" method="get">
                                @csrf
                                <div class="start_date">
                                    <label>start</label>
                                    <input type="date" name="startDate" value="{{old('startDate')}}" required>
                                    @error('startDate')
                                        <span class="span-warning">
                                           {{ $errors->first('startDate') }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="start_date">
                                    <label>End</label>
                                    <input type="date" name="endDate" value="{{old('endDate')}}" required>
                                    @error('endDate')
                                        <span class="span-warning">
                                           {{ $errors->first('endDate') }}
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" name="button" class="btn btn-primary">إرسال</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>


@endsection




