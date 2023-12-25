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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

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
                <a href="{{ route('frontend.public.article') }}" class="nav-item nav-link">Chuyên đề</a>
                <a href="contact.html" class="nav-item nav-link">Liên hệ</a>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->

@yield('content')

<!-- Footer Start -->
<div
    class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5"
>
    <div class="row pt-5">
        <div class="col-lg-3 col-md-6 mb-5">
            <a
                href=""
                class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0"
                style="font-size: 40px; line-height: 40px"
            >
                <i class="flaticon-007-sandbox"></i>
                <span class="text-white">KidKinder</span>
            </a>
            <p>
                Thầy Thắng là một giáo viên tiếng Anh dành cho học sinh cấp 2 và cấp 3. Thầy Thắng không chỉ là một người hướng dẫn mà còn là nguồn động viên lớn cho học sinh.
            </p>
            <div class="d-flex justify-content-start mt-4">
                <a
                    class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                    style="width: 38px; height: 38px"
                    href="#"
                ><i class="fab fa-twitter"></i
                    ></a>
                <a
                    class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                    style="width: 38px; height: 38px"
                    href="#"
                ><i class="fab fa-facebook-f"></i
                    ></a>
                <a
                    class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                    style="width: 38px; height: 38px"
                    href="#"
                ><i class="fab fa-linkedin-in"></i
                    ></a>
                <a
                    class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                    style="width: 38px; height: 38px"
                    href="#"
                ><i class="fab fa-instagram"></i
                    ></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h3 class="text-primary mb-4">Liên Hệ</h3>
            <div class="d-flex">
                <h4 class="fa fa-map-marker-alt text-primary"></h4>
                <div class="pl-3">
                    <h5 class="text-white">Địa Chỉ</h5>
                    <p>Kiệt 82/157, Nguyễn Lương Bằng, Liên Chiểu, Đà Nẵng</p>
                </div>
            </div>
            <div class="d-flex">
                <h4 class="fa fa-envelope text-primary"></h4>
                <div class="pl-3">
                    <h5 class="text-white">Email</h5>
                    <p>thang.phanlucky@gmail.com</p>
                </div>
            </div>
            <div class="d-flex">
                <h4 class="fa fa-phone-alt text-primary"></h4>
                <div class="pl-3">
                    <h5 class="text-white">Phone</h5>
                    <p>034 8371 758</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h3 class="text-primary mb-4">Liên Kết</h3>
            <div class="d-flex flex-column justify-content-start">
                <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Classes</a>
                <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Teachers</a>
                <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Blog</a>
                <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h3 class="text-primary mb-4">Newsletter</h3>
            <form action="">
                <div class="form-group">
                    <input
                        type="text"
                        class="form-control border-0 py-4"
                        placeholder="Your Name"
                        required="required"
                    />
                </div>
                <div class="form-group">
                    <input
                        type="email"
                        class="form-control border-0 py-4"
                        placeholder="Your Email"
                        required="required"
                    />
                </div>
                <div>
                    <button
                        class="btn btn-primary btn-block border-0 py-3"
                        type="submit"
                    >
                        Submit Now
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div
        class="container-fluid pt-5"
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

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('user/lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('user/lib/lightbox/js/lightbox.min.js') }}"></script>

<!-- Contact Javascript File -->
<script src="{{ asset('user/mail/jqBootstrapValidation.min.js') }}"></script>
<script src="{{ asset('user/mail/contact.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('user/js/main.js') }}"></script>
</body>
</html>
