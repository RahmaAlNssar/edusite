<!DOCTYPE html>
<html lang="en">

<head>
    <title>Unicat</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Unicat project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets/frontend/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/styles/bootstrap4/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/styles/responsive.css') }}">

    @yield('style')
</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header">
            {{-- START INCLUDE HEADER INFORMATIONS SECTION --}}
            @include('layouts.includes.frontend.info')
            {{-- END INCLUDE HEADER INFORMATIONS SECTION --}}

            <!-- Header Content -->
            <div class="header_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header_content d-flex flex-row align-items-center justify-content-start">
                                <div class="logo_container">
                                    <a href="#">
                                        <div class="logo_text">Unic<span>at</span></div>
                                    </a>
                                </div>
                                <nav class="main_nav_contaner ml-auto">
                                    {{-- START INCLUDE HEADER MENU SECTION --}}
                                    @include('layouts.includes.frontend.menu')
                                    {{-- END INCLUDE HEADER MENU SECTION --}}
                                    <div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>

                                    <!-- Hamburger -->

                                    <div class="shopping_cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </div>
                                    <div class="hamburger menu_mm">
                                        <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                                    </div>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
            <div class="menu_close_container">
                <div class="menu_close">
                    <div></div>
                    <div></div>
                </div>
            </div>
            <nav class="menu_nav">
                {{-- START INCLUDE HEADER MENU SECTION --}}
                @include('layouts.includes.frontend.menu')
                {{-- END INCLUDE HEADER MENU SECTION --}}
            </nav>
        </div>
