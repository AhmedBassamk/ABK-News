<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}" dir="{{LaravelLocalization::getCurrentLocaleDirection()}}">

<head>
    <title>Mag News</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('newsasset/images/icons/favicon.png') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('newsasset/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('newsasset/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('newsasset/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('newsasset/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('newsasset/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('newsasset/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('newsasset/css/util.min.css') }}">
    <!--===============================================================================================-->
    @if (LaravelLocalization::getCurrentLocaleDirection() == 'ltr')
    <link rel="stylesheet" type="text/css" href="{{ asset('newsasset/css/main.css') }}">
    @else
    <link rel="stylesheet" type="text/css" href="{{ asset('newsasset/css/mainrtl.css') }}">

    @endif
    <!--===============================================================================================-->
    <style>
        .main-menu>.homee>a::after {
            content: ' ' !important;
            color: white !important;
        }
        .language{
            position: relative;
            background:#cacaca !important;
            width: 80px;
            text-align: center;
        }
        .language:hover .drop{
            display: block;
        }
        .drop{
            position: absolute;
            bottom: -45px;
            left: 0;
            right: 0;
            width: 100%;
            background: #fff;
            z-index: 1111;
            display: none;
        }
        .drop li a{
            color:black ;
            font-size: 15px;
        }
    </style>
</head>

<body class="animsition">

    <!-- Header -->
    <header>
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <div class="topbar">
                <div class="content-topbar container h-100">
                    <div class="left-topbar">
                        <span class="left-topbar-item flex-wr-s-c">
                            <span>
                                {{-- {{ $ipstackData->city }}, {{ $ipstackData->region_name }} --}}
                            </span>

                            <img class="m-b-1 m-rl-8" src="{{ asset('newsasset/images/icons/icon-night.png') }}"
                                alt="IMG">

                            <span>
                                {{-- HI {{ $data['main']['temp_max'] }}° LO {{ $data['main']['temp_min'] }}° </span> --}}
                        </span>

                        <a href="#" class="left-topbar-item">
                            {{ __('About') }}
                        </a>

                        <a href="#" class="left-topbar-item">
                            {{ __('Contact') }}
                        </a>

                        <a href="#" class="left-topbar-item">
                            {{ __('Sing up') }}
                        </a>

                        <a href="#" class="left-topbar-item">
                            {{ __('Log in') }}
                        </a>
                    </div>

                    <div class="right-topbar d-flex">
                        <a href="#">
                            <span class="fab fa-facebook-f"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-twitter"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-pinterest-p"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-vimeo-v"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-youtube"></span>
                        </a>
                        <div class="language bg-light px-2 py-1 m-0">
                            <p class="m-0">{{__('language')}}</p>
                            <ul class="drop">
                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>
                                        <a rel="alternate" hreflang="{{ $localeCode }}"
                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Header Mobile -->
            <div class="wrap-header-mobile">
                <!-- Logo moblie -->
                <div class="logo-mobile">
                    <h1><span style="color: rgb(128, 169, 126)">ABK</span>NEWS</h1>
                </div>

                <!-- Button show menu -->
                <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </div>
            </div>

            <!-- Menu Mobile -->
            <div class="menu-mobile">
                <ul class="topbar-mobile">
                    <li class="left-topbar">
                        <span class="left-topbar-item flex-wr-s-c">
                            <span>
                                New York, NY
                            </span>

                            <img class="m-b-1 m-rl-8" src="{{ asset('newsasset/images/icons/icon-night.png') }}"
                                alt="IMG">

                            <span>
                                HI 58° LO 56°
                            </span>
                        </span>
                    </li>

                    <li class="left-topbar">
                        <a href="#" class="left-topbar-item">
                            About
                        </a>

                        <a href="#" class="left-topbar-item">
                            Contact
                        </a>

                        <a href="#" class="left-topbar-item">
                            Sing up
                        </a>

                        <a href="#" class="left-topbar-item">
                            Log in
                        </a>
                    </li>

                    <li class="right-topbar">
                        <a href="#">
                            <span class="fab fa-facebook-f"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-twitter"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-pinterest-p"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-vimeo-v"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-youtube"></span>
                        </a>
                    </li>
                </ul>

                <ul class="main-menu-m">
                    <li>
                        <a href="index.html">Home</a>
                        <ul class="sub-menu-m">
                            <li><a href="index.html">Homepage v1</a></li>
                            <li><a href="home-02.html">Homepage v2</a></li>
                            <li><a href="home-03.html">Homepage v3</a></li>
                        </ul>

                        <span class="arrow-main-menu-m">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </span>
                    </li>

                    <li>
                        <a href="category-01.html">News</a>
                    </li>

                    <li>
                        <a href="category-02.html">Entertainment </a>
                    </li>

                    <li>
                        <a href="category-01.html">Business</a>
                    </li>

                    <li>
                        <a href="category-02.html">Travel</a>
                    </li>

                    <li>
                        <a href="category-01.html">Life Style</a>
                    </li>

                    <li>
                        <a href="category-02.html">Video</a>
                    </li>

                    <li>
                        <a href="#">Features</a>
                        <ul class="sub-menu-m">
                            <li><a href="category-01.html">Category Page v1</a></li>
                            <li><a href="category-02.html">Category Page v2</a></li>
                            <li><a href="blog-grid.html">Blog Grid Sidebar</a></li>
                            <li><a href="blog-list-01.html">Blog List Sidebar v1</a></li>
                            <li><a href="blog-list-02.html">Blog List Sidebar v2</a></li>
                            <li><a href="blog-detail-01.html">Blog Detail Sidebar</a></li>
                            <li><a href="blog-detail-02.html">Blog Detail No Sidebar</a></li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>

                        <span class="arrow-main-menu-m">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </span>
                    </li>
                </ul>
            </div>

            <!--  -->
            <div class="wrap-logo container">
                <!-- Logo desktop -->
                <div class="logo">
                    <h1 style="font-size: 2.7rem; font-weight: bold"><span style="color: rgb(110, 201, 106)">ABK</span>NEWS</h1>
                </div>

                <!-- Banner -->
                <div class="banner-header">
                    <a href="https://themewagon.com/themes/free-bootstrap-4-html5-news-website-template-magnews2/"><img
                            src="{{ asset('newsasset/images/banner-01.jpg') }}" alt="IMG"></a>
                </div>
            </div>

            <!--  -->
            <div class="wrap-main-nav">
                <div class="main-nav">
                    <!-- Menu desktop -->
                    <nav class="menu-desktop">
                        <a class="logo-stick" href="index.html">
                            <img src="{{ asset('newsasset/images/icons/logo-01.png') }}" alt="LOGO">
                        </a>

                        <ul class="main-menu">
                            <li class="homee main-menu-active">
                                <a href="{{ route('magindex') }}">{{__('Home')}}</a>
                            </li>

                            <li class="mega-menu-item">
                                <a href="category-01.html">{{__('News')}}</a>

                                <div class="sub-mega-menu w-25">
                                    <div class="nav w-100 flex-column nav-pills" role="tablist">
                                        @foreach ($categories as $category)
                                            <a class="nav-link"
                                                href="{{ route('magcategory', $category->id) }}">{{ $category->name }}</a>
                                        @endforeach
                                    </div>

                                </div>
                            </li>
                            <li class="homee mega-menu-item">
                                <a href="{{ route('magabout') }}">{{__('About')}}</a>
                            </li>

                            <li class="homee mega-menu-item">
                                <a href="{{ route('magcontact') }}">{{__('Contact')}}</a>
                            </li>
                            <li class="mega-menu-item homee">
                                <a href="{{ route('magarticle') }}">{{__('Articles')}}</a>
                            </li>

                            <li class="mega-menu-item ">
                                <a href="category-02.html">{{__('Video')}}</a>

                                <div class="sub-mega-menu">
                                    <div class="nav flex-column nav-pills" role="tablist">
                                        <a class="nav-link active" data-toggle="pill" href="#video-1"
                                            role="tab">All</a>
                                    </div>

                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="video-1" role="tabpanel">
                                            <div class="row">
                                                <div class="col-3">
                                                    <!-- Item post -->
                                                    <div>
                                                        <a href="blog-detail-01.html"
                                                            class="wrap-pic-w hov1 trans-03">
                                                            <img src="{{ asset('newsasset/images/post-50.jpg') }}"
                                                                alt="IMG">
                                                        </a>

                                                        <div class="p-t-10">
                                                            <h5 class="p-b-5">
                                                                <a href="blog-detail-01.html"
                                                                    class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                    Donec metus orci, malesuada et lectus vitae
                                                                </a>
                                                            </h5>

                                                            <span class="cl8">
                                                                <a href="#"
                                                                    class="f1-s-6 cl8 hov-cl10 trans-03">
                                                                    Music
                                                                </a>

                                                                <span class="f1-s-3 m-rl-3">
                                                                    -
                                                                </span>

                                                                <span class="f1-s-3">
                                                                    Feb 18
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <!-- Item post -->
                                                    <div>
                                                        <a href="blog-detail-01.html"
                                                            class="wrap-pic-w hov1 trans-03">
                                                            <img src="{{ asset('newsasset/images/post-08.jpg') }}"
                                                                alt="IMG">
                                                        </a>

                                                        <div class="p-t-10">
                                                            <h5 class="p-b-5">
                                                                <a href="blog-detail-01.html"
                                                                    class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                    Donec metus orci, malesuada et lectus vitae
                                                                </a>
                                                            </h5>

                                                            <span class="cl8">
                                                                <a href="#"
                                                                    class="f1-s-6 cl8 hov-cl10 trans-03">
                                                                    Music
                                                                </a>

                                                                <span class="f1-s-3 m-rl-3">
                                                                    -
                                                                </span>

                                                                <span class="f1-s-3">
                                                                    Feb 12
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <!-- Item post -->
                                                    <div>
                                                        <a href="blog-detail-01.html"
                                                            class="wrap-pic-w hov1 trans-03">
                                                            <img src="{{ asset('newsasset/images/post-07.jpg') }}"
                                                                alt="IMG">
                                                        </a>

                                                        <div class="p-t-10">
                                                            <h5 class="p-b-5">
                                                                <a href="blog-detail-01.html"
                                                                    class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                    Donec metus orci, malesuada et lectus vitae
                                                                </a>
                                                            </h5>

                                                            <span class="cl8">
                                                                <a href="#"
                                                                    class="f1-s-6 cl8 hov-cl10 trans-03">
                                                                    Music
                                                                </a>

                                                                <span class="f1-s-3 m-rl-3">
                                                                    -
                                                                </span>

                                                                <span class="f1-s-3">
                                                                    Jan 20
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <!-- Item post -->
                                                    <div>
                                                        <a href="blog-detail-01.html"
                                                            class="wrap-pic-w hov1 trans-03">
                                                            <img src="{{ asset('newsasset/images/post-06.jpg') }}"
                                                                alt="IMG">
                                                        </a>

                                                        <div class="p-t-10">
                                                            <h5 class="p-b-5">
                                                                <a href="blog-detail-01.html"
                                                                    class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                    Donec metus orci, malesuada et lectus vitae
                                                                </a>
                                                            </h5>

                                                            <span class="cl8">
                                                                <a href="#"
                                                                    class="f1-s-6 cl8 hov-cl10 trans-03">
                                                                    Music
                                                                </a>

                                                                <span class="f1-s-3 m-rl-3">
                                                                    -
                                                                </span>

                                                                <span class="f1-s-3">
                                                                    Jan 15
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            {{-- <li>
								<a href="#">Features</a>
								<ul class="sub-menu">
									<li><a href="category-01.html">Category Page v1</a></li>
									<li><a href="category-02.html">Category Page v2</a></li>
									<li><a href="blog-grid.html">Blog Grid Sidebar</a></li>
									<li><a href="blog-list-01.html">Blog List Sidebar v1</a></li>
									<li><a href="blog-list-02.html">Blog List Sidebar v2</a></li>
									<li><a href="blog-detail-01.html">Blog Detail Sidebar</a></li>
									<li><a href="blog-detail-02.html">Blog Detail No Sidebar</a></li>
									<li><a href="about.html">About Us</a></li>
									<li><a href="contact.html">Contact Us</a></li>
								</ul>
							</li> --}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <!-- Footer -->
    <footer>
        <div class="bg2 p-t-40 p-b-25">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 p-b-20">
                        <div class="size-h-3 flex-s-c">
                            <a href="index.html">
                                <img class="max-s-full" src="{{ asset('newsasset/images/icons/logo-02.png') }}"
                                    alt="LOGO">
                            </a>
                        </div>

                        <div>
                            <p class="f1-s-1 cl11 p-b-16">
                               {{ __('A website that transmits all global and local news and works on all political, sports, social, cultural and technological issues and offers exclusive news quickly and reliably') }}
                            </p>

                            <p class="f1-s-1 cl11 p-b-16">
                                {{ __('Contact us? Call us on (+1) 96 716 6879') }}
                            </p>

                            <div class="p-t-15">
                                <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                    <span class="fab fa-facebook-f"></span>
                                </a>

                                <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                    <span class="fab fa-twitter"></span>
                                </a>

                                <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                    <span class="fab fa-pinterest-p"></span>
                                </a>

                                <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                    <span class="fab fa-vimeo-v"></span>
                                </a>

                                <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                    <span class="fab fa-youtube"></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4 p-b-20">
                        <div class="size-h-3 flex-s-c">
                            <h5 class="f1-m-7 cl0">
                                {{__('Popular Posts')}}
                            </h5>
                        </div>

                        <ul class="">
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($popular_news as $news_)
                            <li class="flex-wr-sb-s p-b-22">
                                <div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                   {{++$count}}
                                </div>

                                <a href="{{ route('magdetails', $news_->id) }}" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03 text-white">
                                    {{ $news_->title }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-sm-6 col-lg-4 p-b-20">
                        <div class="size-h-3 flex-s-c">
                            <h5 class="f1-m-7 cl0">
                                {{ __('Category') }}
                            </h5>
                        </div>

                        <ul class="m-t--12">
                            @foreach ($categories as $category)

                                <li class="how-bor1 p-rl-5 p-tb-10">
                                    <a class="nav-link text-white"
                                    href="{{ route('magcategory', $category->id) }}">{{ $category->name }}</a>
                                </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg11">
            <div class="container size-h-4 flex-c-c p-tb-15">
                <span class="f1-s-1 cl0 txt-center">
                    Copyright © 2018

                    <a href="#"
                        class="f1-s-1 cl10 hov-link1"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i
                            class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                            target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </span>
            </div>
        </div>
    </footer>

    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <span class="fas fa-angle-up"></span>
        </span>
    </div>

    <!-- Modal Video 01-->
    <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document" data-dismiss="modal">
            <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

            <div class="wrap-video-mo-01">
                <div class="video-mo-01">
                    <iframe src="https://www.youtube.com/embed/wJnBTPUQS5A?rel=0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="{{ asset('newsasset/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('newsasset/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('newsasset/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('newsasset/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('newsasset/js/main.js') }}"></script>
    <script></script>
</body>

</html>
