@php
    $route = request()->route();
@endphp
    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index,follow,max-image-preview:large">
    <meta name="googlebot" content="index,follow,max-image-preview:large">
    {!! SEO::generate(true) !!}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('frontend/favicon/site.webmanifest') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/icomoon/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css?v=1.0') }}">
</head>
<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">

<div id="header-wrap">

    <div class="top-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <div class="right-element">
                        <a href="#" class="user-account for-buy"><i
                                class="icon icon-user"></i><span>Account</span></a>

                        <div class="action-menu">

                            <div class="search-bar">
                                <a href="#" class="search-button search-toggle" data-selector="#header-wrap">
                                    <i class="icon icon-search"></i>
                                </a>
                                <form role="search" method="get" action="{{ route('frontend.public.search') }}" class="search-box">
                                    <input name="name" required class="search-field text search-input" placeholder="Search"
                                           type="search">
                                </form>
                            </div>
                        </div>

                    </div><!--top-right-->
                </div>

            </div>
        </div>
    </div><!--top-content-->

    <header id="header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-2">
                    <div class="main-logo">
                        <a href="{{ route('frontend.public.index') }}"><img src="{{ asset('frontend/images/logo.svg') }}" alt="logo"></a>
                    </div>

                </div>

                <div class="col-md-10">

                    <nav id="navbar">
                        <div class="main-menu stellarnav">
                            <ul class="menu-list">
                                <li class="menu-item {{ $route->named('frontend.public.index') ? 'active' : '' }}"><a href="{{ route('frontend.public.index') }}">Home</a></li>
                                <li class="menu-item {{ $route->named('frontend.public.latest') ? 'active' : '' }}"><a href="{{ route('frontend.public.latest') }}" class="nav-link">Latest Novel</a></li>
                                <li class="menu-item {{ $route->named('frontend.public.hot') ? 'active' : '' }}"><a href="{{ route('frontend.public.hot') }}" class="nav-link">Hot Novel</a></li>
                                <li class="menu-item {{ $route->named('frontend.public.completed') ? 'active' : '' }}"><a href="{{ route('frontend.public.completed') }}" class="nav-link">Completed Novel</a></li>
                                <li class="menu-item {{ $route->named('frontend.public.popular') ? 'active' : '' }}"><a href="{{ route('frontend.public.popular') }}" class="nav-link">Most Popular</a></li>
                                <li class="menu-item {{ $route->named('frontend.public.tags') ? 'active' : '' }}"><a href="{{ route('frontend.public.tags') }}" class="nav-link">Genre</a></li>
                            </ul>

                            <div class="hamburger">
                                <span class="bar"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                            </div>

                        </div>
                    </nav>

                </div>

            </div>
        </div>
    </header>

</div><!--header-wrap-->

@yield('content')

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="copyright">
                    <div class="row">

                        <div class="col-md-6">
                            <p>© 2022 All rights reserved. <a
                                    href="" target="_blank">T0ny</a></p>
                        </div>

                        <div class="col-md-6">
                            <div class="social-links align-right">
                                <ul>
                                    <li>
                                        <a href="#"><i class="icon icon-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon icon-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon icon-youtube-play"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon icon-behance-square"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div><!--grid-->

            </div><!--footer-bottom-content-->
        </div>
    </div>
</footer>
@stack('before-scripts')
<script src="{{ asset('frontend/js/jquery-1.11.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
<script src="{{ asset('frontend/js/plugins.js') }}"></script>

@stack('after-scripts')
<script src="{{ asset('frontend/js/script.js') }}"></script>
</body>
</html>
