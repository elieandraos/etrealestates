<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E&T real estates</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @guest
        <!-- SEO Meta Tags -->
        {!! SEO::generate() !!}
    @else
        <!-- Maps -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgPayHLAAjvMDfahfJn7XmfSRDfJEDYXA"></script>
    @endguest

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="@guest {{ url('/') }} @else {!! route('properties.index') !!} @endguest">
                    E&T Real Estates
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Contact') }}</a>
                            </li> --}}
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="@if(URL::current() != URL::to('/')) py-4 @endif">
            @yield('content')
            <!-- Inquire Property Modal -->
            <inquire-modal></inquire-modal>
        </main>

        <div class="container-fluid footer">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <span class="footer-icon"><i class="fa fa-phone"></i></span>
                            <span class="footer-title">Phone Number</span>
                            <span class="footer-text">+961 3 140 625</span>
                        </div>
                        <div class="col-md-4">
                            <span class="footer-icon"><i class="fa fa-map-marker"></i></span>
                            <span class="footer-title">Location</span>
                            <span class="footer-text">Sarba, Jounieh</span>
                        </div>
                        <div class="col-md-4">
                            <span class="footer-icon"><i class="fa fa-envelope-o"></i></span>
                            <span class="footer-title">Email Address</span>
                            <span class="footer-text">info@etrealeastes.com</span>
                        </div>
                        <div class="col-md-12 copyright">
                            Copyright © {!! date('Y') !!} EtRealEstates. All rights reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
