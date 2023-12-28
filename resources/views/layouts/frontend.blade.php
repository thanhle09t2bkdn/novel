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

    <title>{{ config('app.name', 'Tiếng Anh Thầy Thắng') }}</title>


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap"
        rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
        rel="stylesheet"
    />

    <!-- Flaticon Font -->
    <link href="{{ asset('user/lib/flaticon/font/flaticon.css') }}" rel="stylesheet"/>

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('user/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet"/>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet"/>
</head>
<body>
<!-- Navbar Start -->
<div class="container-fluid bg-light position-relative shadow">
    <nav
        class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5"
    >
        <a
            href="{{ route('frontend.public.index') }}"
            class="navbar-brand font-weight-bold text-secondary"
            style="font-size: 50px"
        >
            <img width="120px" src="{{ asset('user/img/logo.svg') }}" alt="logo">
        </a>
        <button
            type="button"
            class="navbar-toggler"
            data-toggle="collapse"
            data-target="#navbarCollapse"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div
            class="collapse navbar-collapse justify-content-between"
            id="navbarCollapse"
        >
            <div class="navbar-nav font-weight-bold mx-auto py-0">
                <a href="{{ route('frontend.public.index') }}" class="nav-item nav-link {{ $route->named('frontend.public.index') ? 'active' : '' }}">Trang Chủ</a>
                <a href="{{ route('frontend.public.book') }}" class="nav-item nav-link">Sách</a>
                <div class="nav-item dropdown">
                    <a
                        href="#"
                        class="nav-link dropdown-toggle"
                        data-toggle="dropdown"
                    >Lớp 6</a
                    >
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-15-phut-lop-6') }}" class="dropdown-item">Kiểm tra 15 phút</a>
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-giua-ki-lop-6') }}" class="dropdown-item">Kiểm tra giữa kì</a>
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-cuoi-ki-lop-6') }}" class="dropdown-item">Kiểm tra cuối kì</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a
                        href="#"
                        class="nav-link dropdown-toggle"
                        data-toggle="dropdown"
                    >Lớp 7</a
                    >
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-15-phut-lop-7') }}" class="dropdown-item">Kiểm tra 15 phút</a>
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-giua-ki-lop-7') }}" class="dropdown-item">Kiểm tra giữa kì</a>
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-cuoi-ki-lop-7') }}" class="dropdown-item">Kiểm tra cuối kì</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a
                        href="#"
                        class="nav-link dropdown-toggle"
                        data-toggle="dropdown"
                    >Lớp 8</a
                    >
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-15-phut-lop-8') }}" class="dropdown-item">Kiểm tra 15 phút</a>
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-giua-ki-lop-8') }}" class="dropdown-item">Kiểm tra giữa kì</a>
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-cuoi-ki-lop-8') }}" class="dropdown-item">Kiểm tra cuối kì</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a
                        href="#"
                        class="nav-link dropdown-toggle"
                        data-toggle="dropdown"
                    >Lớp 9</a
                    >
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-15-phut-lop-9') }}" class="dropdown-item">Kiểm tra 15 phút</a>
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-giua-ki-lop-9') }}" class="dropdown-item">Kiểm tra giữa kì</a>
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-cuoi-ki-lop-9') }}" class="dropdown-item">Kiểm tra cuối kì</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a
                        href="#"
                        class="nav-link dropdown-toggle"
                        data-toggle="dropdown"
                    >Lớp 10</a
                    >
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-15-phut-lop-10') }}" class="dropdown-item">Kiểm tra 15 phút</a>
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-giua-ki-lop-10') }}" class="dropdown-item">Kiểm tra giữa kì</a>
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-cuoi-ki-lop-10') }}" class="dropdown-item">Kiểm tra cuối kì</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a
                        href="#"
                        class="nav-link dropdown-toggle"
                        data-toggle="dropdown"
                    >Lớp 11</a
                    >
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-15-phut-lop-11') }}" class="dropdown-item">Kiểm tra 15 phút</a>
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-giua-ki-lop-11') }}" class="dropdown-item">Kiểm tra giữa kì</a>
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-cuoi-ki-lop-11') }}" class="dropdown-item">Kiểm tra cuối kì</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a
                        href="#"
                        class="nav-link dropdown-toggle"
                        data-toggle="dropdown"
                    >Lớp 12</a
                    >
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-15-phut-lop-12') }}" class="dropdown-item">Kiểm tra 15 phút</a>
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-giua-ki-lop-12') }}" class="dropdown-item">Kiểm tra giữa kì</a>
                        <a href="{{ route('frontend.public.topic', 'kiem-tra-cuoi-ki-lop-12') }}" class="dropdown-item">Kiểm tra cuối kì</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->

@yield('content')

<!-- Footer Start -->
<div
    class="container-fluid bg-secondary text-white mt-1 py-1 px-sm-3 px-md-5"
>
    <div class="row pt-3">
        <div class="col-lg-1 col-md-1 mb-5">
        </div>
        <div class="col-lg-10 col-md-8 mb-3">
            <h3 class="text-primary mb-4">Liên Hệ</h3>
            <div class="d-flex">

                <div class="pl-3">
                    <p class="text-white"><i class="fa fa-map-marker-alt text-primary"></i> Địa Chỉ: Kiệt 82/157, Nguyễn Lương Bằng, Liên Chiểu, Đà Nẵng</p>
                </div>
            </div>
            <div class="d-flex">

                <div class="pl-3">
                    <p><i class="fa fa-envelope text-primary"></i> Email: thang.phanlucky@gmail.com </p>
                </div>
            </div>
            <div class="d-flex">

                <div class="pl-3">
                    <p><i class="fa fa-phone-alt text-primary"></i> Điện Thoại: 034 8371 758</p>
                </div>
            </div>
        </div>
    </div>
    <div
        class="container-fluid pt-3"
        style="border-top: 1px solid rgba(23, 162, 184, 0.2) ;"
    >
        <p class="m-0 text-center text-white">
            &copy;
            <a class="text-primary font-weight-bold" href="#">Tiếng Anh Thầy Thắng</a>.
            All Rights Reserved.
        </p>
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-primary p-3 back-to-top"
><i class="fa fa-angle-double-up"></i
    ></a>
{{ \TawkTo::widgetCode() }}
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('user/lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('user/lib/lightbox/js/lightbox.min.js') }}"></script>


<!-- Template Javascript -->
<script src="{{ asset('user/js/main.js') }}"></script>
</body>
</html>
