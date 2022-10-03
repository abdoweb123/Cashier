<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cashier') }}</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
        <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/forms.css')}}">
    <link rel="stylesheet" href="{{asset('css/table.css')}}">
    <link rel="stylesheet" href="{{asset('css/nav.css')}}">
    <link rel="stylesheet" href="{{asset('css/colors.css')}}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Cashier
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse row" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                <div class="col-sm-10">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                         @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link pt-1" href="{{ route('loginView') }}">{{ __('Admin') }}</a>
                                </li>
                            @endif

                  {{--     @if (Route::has('register'))
                                <li class="nav-item">
                                   <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                               </li>
                           @endif  --}}
                        @else
                    <li class="nav-item">
                        <a id="navbarDropdown" class="nav-link" href="{{ url('/')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Home
                        </a>
                    </li>
                      <li class="nav-item">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            welcome {{ Auth::user()->name }}
                        </a>
                      </li>
                           <li class="nav-item">
                            @if(Auth::user()->role == 'admin')
                                <a id="navbarDropdown" class="nav-link" href="{{route('users.index')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('users')}}
                                </a>
                            @endif
                           </li>
                           <li class="nav-item">
                                <a id="navbarDropdown" class="nav-link" href="{{route('home')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('products')}}
                                </a>
                           </li>
                            <li class="nav-item">
                                <a id="navbarDropdown" class="nav-link" href="{{route('product.trash')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Trashed Products')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                @if(Auth::user()->role == 'user')
                                    <a id="navbarDropdown" class="nav-link" href="{{route('products.create')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('New Product')}}
                                    </a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @if(Auth::user()->role == 'admin')
                                    <a id="navbarDropdown" class="nav-link" href="{{route('trash')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('Trashed Users')}}
                                    </a>
                                @endif
                            </li>
                    </ul>
                </div>
                    <div class="col-sm-2 text-right">
                        <ul class="navbar-nav ml-auto">
                           <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                           </li>
                        </ul>
                    </div>


                        @endguest

                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>--}}
{{--    <script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>--}}
    <script src="{{asset('js/jquery-1.12.4.min.js') }}"></script>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.0.1/angular.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>--}}
    <script src="{{asset('js/plugins.js') }}"></script>
</body>
</html>
