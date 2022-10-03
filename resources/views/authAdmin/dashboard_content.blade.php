@extends('layouts.master')

@section('title')
    الصفحة الرئيسية
@endsection


@section('style')
    .container-a{
        color:white;
        text-decoration:none;
        display:block;
    }
    .my-container > div {
        display:none;
    }
    .my-container{
        margin-top:70px
    }
    .my-container .form-control{
        width: 50%;
        text-align:center;
        padding: 10px !important;
        margin: auto;
        background-color: #3d3e47;
        border-radius: 7px !important;
        margin-bottom: 15px;
    }

    .form-control a:hover{
        color:#d8d4d4 !important;

    }


@endsection




@section('content')





    <div class="my-container">
        <div class="form-group tap1" style="@if ($tap == 'tap1') display:block @endif">
            <div class="form-control">
                <a href="{{route('suppliers.index')}}" class="container-a">عرض المورّدين</a>
            </div>
            <div class="form-control">
                <a href="{{route('supplier.trash')}}" class="container-a">المورّدين المحذوفين</a>
            </div>
            <div class="form-control">
                <a href="{{route('suppliers.create')}}" class="container-a">إضافة مورّد جديد</a>
            </div>
        </div>
        <div id="tap2" style="@if ($tap == 'tap2') display:block @endif">
            <div class="form-control">
                <a href="{{route('expenses.create')}}" class="container-a">إضافة مصروف</a>
            </div>
            <div class="form-control">
                <a href="{{route('expenses.index')}}" class="container-a">عرض المصروفات</a>
            </div>
        </div>
        <div id="tap3" style="@if ($tap == 'tap3') display:block @endif">
            <div class="form-control">
                <a href="{{route('safe.create')}}" class="container-a">إضافة مبلغ للخزينة</a>
            </div>
            <div class="form-control">
                <a href="{{route('safe.index')}}" class="container-a">عرض المبالغ المضافة للخزينة</a>
            </div>
            <div class="form-control">
                <a href="{{route('general.view')}}" class="container-a">تفاصيل الخزينة</a>
            </div>
        </div>
        <div id="tap4" style="@if ($tap == 'tap4') display:block @endif">
            <div class="form-control">
                <a href="{{route('clients.create')}}" class="container-a">إضافة عميل غير منتظم</a>
            </div>
            <div class="form-control">
                <a href="{{route('clients.index')}}" class="container-a">عرض العملاء غير المنتظمين</a>
            </div>
            <div class="form-control">
                <a href="{{route('users.index')}}" class="container-a">عرض العملاء المنتظمين</a>
            </div>
            <div class="form-control">
                <a href="{{route('user.trash')}}" class="container-a">العملاء المحذوفين المنتظمين</a>
            </div>
            <div class="form-control">
                <a href="{{route('client.trash')}}" class="container-a">العملاء المحذوفين غير المنتظمين</a>
            </div>
        </div>
        <div id="tap5" style="@if ($tap == 'tap5') display:block @endif">
            <div class="form-control">
                <a href="{{route('product_ForAdmin.index')}}" class="container-a"> عرض المنتجات</a>
            </div>
            <div class="form-control">
                <a href="{{route('productForAdmin.trash')}}" class="container-a">المنتجات المحذوفة</a>
            </div>
        </div>


        <div id="tap5" style="@if ($tap == 'tap6') display:block @endif">
            <div class="form-control">
                <a href="{{route('search.product')}}" class="container-a">بيع منتج</a>
            </div>
            <div class="form-control">
                <a href="{{route('sells.index')}}" class="container-a">عرض المبيعات</a>
            </div>
            <div class="form-control">
                <a href="{{route('trashed.sells')}}" class="container-a">عرض المبيعات المحذوفة</a>
            </div>
        </div>
    </div>





@endsection



