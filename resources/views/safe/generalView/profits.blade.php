@extends('layouts.master')

@section('title')
    عرض تفاصيل الخزينة
@endsection


@section('style')


    .container a{
        color:black !important;
        text-decoration:none;
    }
    .options > div:not(#general_view-content){display:none}

    .div_main_a a{background-color:#eee;}
    .div_main_a .inactive{background-color:#ddd;}
    .table{
        border-color: antiquewhite;
        margin-bottom: 0;
    }
    .table thead{
        border:none
    }
    tr td{width:20%}
    .my-container{
        margin:50px auto; width:80%
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
    <div class="container text-center">

        <div class="div_main_a">
            <a href="{{route('general.view')}}" class="btn inactive" id="general_view">المبيعات</a>
            <a href="{{route('profits')}}" class="btn" id="collected_data">الأرباح</a>
            <a href="{{route('best.seller')}}" class="btn inactive" id="reports">المنتجات الأكثر مبيعا</a>
            <a href="{{route('best.profits')}}" class="btn inactive" id="reports">المنتجات الأكثر ربحا</a>
        </div>


        <div class="options">
            <div class="my-container" id="general_view-content" >

                <div id="tap2-content">
                    <table class="table">
                        <thead>
                        <tr>
                            <td>اليوم</td>
                            <td>الأمس</td>
                            <td>هذا الشهر</td>
                            <td>الشهر الماضي</td>
                            <td>مدي العمل</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$profitsToday}}</td>
                            <td>{{$profitsYesterday}}</td>
                            <td>{{$profitsThisMonth}}</td>
                            <td>{{$profitsLastMonth}}</td>
                            <td>{{$profitsAll}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>




        </div>


    </div>


@endsection



@section('script')

<script>

    $("#my-taps li").click(function(){

    var myId = $(this).attr("id");

    $(this).removeClass("inactive").siblings().addClass("inactive");

    $("#general_view-content div").hide();

    $("#" + myId + "-content").fadeIn(0);
    });

</script>





@endsection

