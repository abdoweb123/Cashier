{{--@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="d-flex justify-content-center col-sm-12 col-md-6 mt-md-5 mt-lg-3" style="margin-top:0 !important;">
            <img class="img-fluid h-75" src="{{asset('images/money-1015277__480.webp')}}">
        </div>
        <div class="form-login col-sm-12 col-md-6">
                <div class=" card-body row ">
                  <div class="col-sm-2 col-md-2"></div>
                  <div class=" col-sm-8 col-md-9">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group content-input mt-sm-3 ">
                            <label for="email">{{ __('Email Address') }}</label>
                            <div>
                                <input id="email" type="email" class="form-control mt-1 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter a valid email address" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group content-input mt-sm-3 mt-xs-1">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                            <div>
                                <input id="password" type="password" class="form-control mt-1 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="mt-2">
                                <div class="mt-2">
                                    <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <div class="">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-decoration-none px-0" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mt-3 login-btn">
                                    {{ __('Login') }}
                                </button>
                                <div class="mt-3">
                                    <span>Do not have an account? </span><a href="{{ route('register') }}">Register</a>
                                </div>
                            </div>
                        </div>
                    </form>
                  </div>
                  <div class="col-sm-2 col-md-1"></div>
                </div>
        </div>
    </div>
</div>
@endsection--}}

<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>تسجيل الدخول لتطبيق المبيعات</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    <link href="{{ URL::asset('assets_2/css/rtl.css') }}" rel="stylesheet">

</head>

<body>

<div class="wrapper">
    <!--=================================
preloader -->

    <div id="pre-loader">
        <img src="{{URL::asset('assets_2/images/pre-loader/loader-01.svg')}}" alt="">
    </div>

    <!--=================================
preloader -->

    <!--=================================
login-->

    <section class="height-100vh d-flex align-items-center page-section-ptb login"
             style="background-image: url('{{ asset('assets_2/images/sativa.png')}}');">
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">
                <div class="col-lg-4 col-md-6 login-fancy-bg bg"
                     style="background-image: url('{{ asset('assets_2/images/login-inner-bg.jpg')}}');">
                    <div class="login-fancy">
                        <h2 class="text-white mb-20">Hello world!</h2>
                        <p class="mb-20 text-white">Create tailor-cut websites with the exclusive multi-purpose
                            responsive template along with powerful features.</p>
                        <ul class="list-unstyled  pos-bot pb-30">
                            <li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a> </li>
                            <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                        <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">دخول الفندق</h3>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="section-field mb-20">
                                <label class="mb-10" for="name">البريدالالكتروني*</label>
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <input type="hidden" value="" name="type">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                            </div>

                            <div class="section-field mb-20">
                                <label class="mb-10" for="Password">كلمة المرور * </label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                            </div>

                            <div class="section-field">
                                <div class="remember-checkbox mb-30">
                                    <input type="checkbox" class="form-control" name="two" id="two" />
                                    <label for="two"> تذكرني</label>
                                    <a href="#" class="float-right">هل نسيت كلمةالمرور ؟</a>
                                </div>
                            </div>
                            <button class="button"><span>دخول</span><i class="fa fa-check"></i></button>
                            <a href="{{route('loginView')}}" class="button text-white"><span>تسجيل دخول الأدمن</span><i class="fa fa-check"></i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
login-->

</div>
<!-- jquery -->
<script src="{{ URL::asset('assets_2/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets_2/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script>
    var plugin_path = 'js/';

</script>

<!-- chart -->
<script src="{{ URL::asset('assets_2/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets_2/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets_2/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets_2/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets_2/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets_2/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets_2/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets_2/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets_2/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets_2/js/custom.js') }}"></script>

</body>

</html>

