<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>حلويات سيدتي</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9099f81dc0.js" crossorigin="anonymous"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&display=swap");

        * {
            font-family: "Amiri", serif;
        }

        .logo {
            position: absolute;
            right: 0;
        }

        .logo a {
            display: flex;
            align-items: center;
        }

        .logo p {
            color: #14bf96;
            font-size: 30px;
            font-family: "Amiri", serif;
        }

        .logo div {
            font-size: 18px;
            font-weight: 700;
            color: #14bf96;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Amiri", serif;
            letter-spacing: 3px;
            color: #14bf96;
            font-size: 40px;
        }

        .top-slide-item {
            position: relative;
            bottom: 0;
            width: 450px;
            display: flex;
            justify-content: space-between;
            right: 37%;
        }

        .top-slide-item a {
            padding: 6px;
            width: 80px;
            height: 56px;
            display: flex;
            justify-content: start;
            color: #14bf96;
        }

        .top-slide-item>a>span>i {
            font-size: 30px;
            color: black;
        }

        .top-slide-item>a>span>i:hover {
            color: #14bf96;
        }

        .top-slide-item>a>span:hover {
            font-size: 35px;
            cursor: pointer;

        }

        .otm-login-btn {
            width: 80px;
            background: #14bf96;
            padding: 8px;
            font-size: 25px;
            border-radius: 4px;
            border: 0;
            color: #fff;
            margin: 6px;
            border-radius: 1.5rem;
        }

        .otm-login-btn:hover {
            width: 90px;
            background: black;
        }

        .py-4 {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            margin-top: 12px
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="height: 80px;z-index: 200;">
            <div class="container">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="assets/img/logo.jpg" height="66px">
                        <div>
                            <p>
                                حلويات سيدتي
                            </p>
                        </div>
                    </a>
                </div>
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
                </a> --}}
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" style="position: fixed;left: 0">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a href="{{ route('login') }}" style="font-size: 20px;color: #14bf96; margin-left: 10px"><i
                                    class="fas fa-sign-out-alt fa-rotate-180 " style="margin-left: 8px"></i>تسجيل
                                الدخول </a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" style="font-size: 20px;color: #14bf96;margin-left: 7px"><i
                                    class="fas fa-sign-out-alt fa-rotate-180" style="margin-left: 8px"></i>فتح حساب</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
