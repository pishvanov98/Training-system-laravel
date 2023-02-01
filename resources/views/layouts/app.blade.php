<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Genetix</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{asset('js/jquery-3.6.3.min.js')}}"></script>
</head>
<body>
<header>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Genetix
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Войти</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <span id="navbarDropdown" class="nav-link dropdown-toggle"  >
                                    {{ Auth::user()->name }}
                                </span>

                                <div class="popup">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<div class="Wraper_content_block">
    @if(!empty($breadcrumb))
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @foreach($breadcrumb as $key => $breadcr)


                    @php if($breadcr == end($breadcrumb)) {
                    @endphp
                    <li class="breadcrumb-item active" aria-current="page">{{$key}}</li>
                    @php
                        }else{
                    @endphp
                    <li class="breadcrumb-item " ><a href="{{$breadcr}}">{{$key}}</a></li>
                    @php

                        } @endphp
                @endforeach
            </ol>
        </nav>
    @endif
    <main class="py-4">

        @yield('content')
    </main>
</div>
    <footer>

        <div class="container">
{{--            <ul class="nav justify-content-center border-bottom pb-3 mb-3">--}}
{{--                <li class="nav-item"><a href="{{route('home')}}" class="nav-link px-2 text-muted">Главная</a></li>--}}
{{--                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>--}}
{{--                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>--}}
{{--                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>--}}
{{--                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>--}}
{{--            </ul>--}}
            <p class="text-center text-muted">© 2023 Nikita Pishvanov</p>
        </div>
    </footer>
</body>

<script>

    /* Open/Close dropdown menu */
    $(function(){
        $('body')
            .on('click', '.dropdown > #navbarDropdown', function(){
                $(this).parent().toggleClass('active');
            })
            .on('mouseenter mouseleave', '.dropdown', function(){
                $(this).toggleClass('hover');
            })
            .on('click', function(e) {
                $('.dropdown.active:not(.hover)').removeClass('active');
            });
    })

</script>

</html>
