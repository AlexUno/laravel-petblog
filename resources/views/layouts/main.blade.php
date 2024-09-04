<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="megakit,business,company,agency,multipurpose,modern,bootstrap4">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="author" content="themefisher.com">

    <title>Блог | @yield('head-title') </title>

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ URL::asset('/') }}assets/admin/plugins/select2/css/select2.min.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Icon Font Css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/themify/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/magnific-popup/dist/magnific-popup.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/slick-carousel/slick/slick-theme.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ URL::asset('/') }}assets/admin/plugins/summernote/summernote-bs4.min.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .custom-file-input:lang(ru) ~ .custom-file-label::after {
            content: "Выбрать";
        }
    </style>
</head>

<body>


<!-- Header Start -->

<header class="navigation">
    <div class="header-top ">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-2 col-md-4">
                    <div class="header-top-socials text-center text-lg-left text-md-left">
                        <a href="https://www.facebook.com/themefisher" target="_blank"><i class="ti-facebook"></i></a>
                        <a href="https://twitter.com/themefisher" target="_blank"><i class="ti-twitter"></i></a>
                        <a href="https://github.com/themefisher/" target="_blank"><i class="ti-github"></i></a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-8 text-center text-lg-right text-md-right">
                    <div class="header-top-info">
                        @guest
                            <a href="{{ route('login') }}"><span>Войти</span></a>
                            <a href="{{ route('register') }}"><span>Зарегистрироваться</span></a>
                        @endguest
                        @auth
                                <a href="{{ route('profile.index') }}"><span>Профиль</span></a>
                                <a href="{{ route('profile.posts.index') }}"><span>Мои посты</span></a>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    <span>Выйти</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg  py-4" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                Mega<span>kit.</span>
            </a>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navbarsExample09">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('index') }}">Главная</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('posts.index') }}">Блог</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Header Close -->

<div class="main-wrapper ">
    @yield('content')
    <!-- footer Start -->
    <footer class="footer section">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widget">
                        <h4 class="text-capitalize mb-4">Меню</h4>
                        <ul class="list-unstyled footer-menu lh-35">
                            <li><a href="{{ route('index') }}">Главная</a></li>
                            <li><a href="{{ route('posts.index') }}">Блог</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 ml-auto col-sm-6">
                    <div class="widget">
                        <div class="logo mb-4">
                            <h3>Mega<span>kit.</span></h3>
                        </div>
                        <h6><a href="tel:+23-345-67890" >Support@megakit.com</a></h6>
                        <a href="mailto:support@gmail.com"><span class="text-color h4">+7-999-999-99-99</span></a>
                    </div>
                </div>
            </div>

            <div class="footer-btm pt-4">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="copyright">
                            &copy; Copyright Reserved to <span class="text-color">Megakit.</span> by <a href="https://themefisher.com/" target="_blank">Themefisher</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="copyright">
                            Distributed by  <a href="https://themewagon.com/" target="_blank">Themewagon</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 text-left text-lg-left">
                        <ul class="list-inline footer-socials">
                            <li class="list-inline-item"><a href="https://www.facebook.com/themefisher"><i class="ti-facebook mr-2"></i>Facebook</a></li>
                            <li class="list-inline-item"><a href="https://twitter.com/themefisher"><i class="ti-twitter mr-2"></i>Twitter</a></li>
                            <li class="list-inline-item"><a href="https://www.pinterest.com/themefisher/"><i class="ti-linkedin mr-2 "></i>Linkedin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!--
Essential Scripts
=====================================-->


<!-- Main jQuery -->
<script src="{{ asset('assets/admin/plugins/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/js/contact.js') }}"></script>
<!-- Bootstrap 4.3.1 -->
<script src="{{ asset('assets/plugins/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<!--  Magnific Popup-->
<script src="{{ asset('assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
<!-- Slick Slider -->
<script src="{{ asset('assets/plugins/slick-carousel/slick/slick.min.js') }}"></script>
<!-- Counterup -->
<script src="{{ asset('assets/plugins/counterup/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/plugins/counterup/jquery.counterup.min.js') }}"></script>

<!-- Google Map -->
<script src="{{ asset('assets/plugins/google-map/map.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>
<!-- Summernote -->
<script src="{{ URL::asset('/') }}assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ URL::asset('/') }}assets/admin/plugins/select2/js/select2.full.min.js"></script>
<!-- bs-custom-file-input -->
<script src="{{ URL::asset('/') }}assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<script>
    $(function () {
        bsCustomFileInput.init();
    });

    // Summernote
    $('#summernote').summernote({
        height: 100
    });

    //Initialize Select2 Elements
    $('.select2').select2();
</script>
</body>
</html>
