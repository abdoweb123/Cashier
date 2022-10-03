<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
    <style>

        input[type='number']{
            -moz-appearance: textfield;
        }
        input::-webkit-inner-spin-button,
        input::-webkit-outer-spin-button
        {
            -webkit-appearance: none;
        }
        .form-control:read-only:focus{
            background: #e9ecef;
           -webkit-box-shadow: none;
             border: 0;
        }
</style>
    @yield('style')
</head>

<body>

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">

        <!-- main-content -->
        <div class="">

          @yield('page-header')
            <div class="page-title">

                @if(session('status'))
                    <div class="alert alert-{{session('alert-type')}} alert-dismissible fade show" role="alert" id="session-alert">
                        {{session('status')}}
                        <button class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

            @endif
            <div class="container w-75">
                @yield('content')
            </div>


            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

        </div><!-- main content wrapper end-->
    </div>
    </div>


    <!--=================================
 footer -->
    @yield('script')




</body>

</html>
