<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Main Style -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <!-- Color -->
    <link id="theme"
          rel="stylesheet"
          type="text/css"
          href="{{ asset('assets/colors/color1.css') }}">

    <style>
        .app-sidebar {
            transition: all 0.3s ease;
        }

        .app-sidebar.sidebar-open {
            transform: translateX(0);
        }

        .app-sidebar {
            transition: transform 0.3s ease;
        }

        .app-sidebar.show {
            transform: translateX(0);
        }

        @font-face {
            font-family: 'Sans';
            src: url({{ asset('assets/fonts/kharazm.ttf') }});
        }

        * {
            font-family: 'Sans' !important;
        }
    </style>
    @yield('styles')

</head>


<body class="app sidebar-mini rtl light-mode">


<!-- GLOBAL LOADER -->
<div id="global-loader">
    <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="loader">
</div>


<div class="page">

    <div class="page-main">


        <!-- HEADER -->
        <div class="app-header header sticky">

            <div class="container-fluid main-container">

                <div class="d-flex">


                    <div>

                        <button class="app-sidebar-toggle btn btn-outline-primary">
                            <i class="fa fa-bars"></i>
                        </button>

                    </div>


                    <div class="d-flex order-lg-2 ms-auto header-right-icons">


                        <!-- MOBILE MENU -->

                        <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent-4">

                            <span class="navbar-toggler-icon fe fe-more-vertical"></span>

                        </button>


                        <div class="navbar navbar-collapse responsive-navbar p-0">


                            <div class="collapse navbar-collapse"
                                 id="navbarSupportedContent-4">


                                <div class="d-flex order-lg-2">


                                    <!-- LANGUAGE -->

                                    <div class="d-flex country">

                                        <a class="nav-link icon text-center"
                                           data-bs-toggle="modal"
                                           data-bs-target="#country-selector">

                                            <i class="fe fe-globe"></i>

                                            <span class="fs-16 ms-2 d-none d-xl-block">
                                               {{ app()->getLocale() == "fa" ? 'فارسی' : 'English' }}
                                        </span>

                                        </a>

                                    </div>

                                    <!-- DARK MODE -->
                                    <div class="d-flex country">

                                        <a class="nav-link icon theme-layout nav-link-bg layout-setting">

<span class="dark-layout">
<i class="fe fe-moon"></i>
</span>


                                            <span class="light-layout">
<i class="fe fe-sun"></i>
</span>


                                        </a>

                                    </div>


                                    <!-- FULLSCREEN -->

                                    <div class="dropdown d-flex">

                                        <a class="nav-link icon full-screen-link nav-link-bg">

                                            <i class="fe fe-minimize fullscreen-button"></i>

                                        </a>

                                    </div>


                                    <!-- PROFILE -->

                                    <div class="dropdown d-flex profile-1">


                                        <a href="javascript:void(0)"
                                           data-bs-toggle="dropdown"
                                           class="nav-link leading-none d-flex">


                                            <img src="{{ asset('assets/images/users/21.jpg') }}"
                                                 class="avatar profile-user brround cover-image"
                                                 alt="user">


                                        </a>


                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">


                                            <div class="drop-heading">

                                                <div class="text-center">

                                                    <h5 class="text-dark mb-0 fs-14 fw-semibold">
                                                        {{ auth()->user()->first_name ?? '' }} {{ auth()->user()->last_name ?? '' }}
                                                    </h5>


                                                    <small class="text-muted">
                                                        Administrator
                                                    </small>


                                                </div>

                                            </div>

                                            <a class="dropdown-item"
                                               href="{{ route('auth.logout')  }}">

                                                <i class="dropdown-icon fe fe-alert-circle"></i>

                                                Sign out

                                            </a>


                                        </div>


                                    </div>


                                </div>

                            </div>


                        </div>


                    </div>


                </div>


            </div>


        </div>
        <!-- /HEADER -->
        <!-- CONTENT AREA -->

        <div class="app-content main-content">

            <div class="side-app">


                @yield('content')

            </div>

        </div>

        <!-- /CONTENT AREA -->


        <!-- APP SIDEBAR -->
        <div class="sticky">
            <div class="app-sidebar">

                {{-- LOGO --}}
                <div class="side-header">
                    <a class="header-brand1" href="{{ route((app()->getLocale() . '.dashboard')) }}">
                        <img
                            src="{{ asset('assets/images/logos/logo.webp') }}"
                            class="header-brand-img desktop-logo"
                            width="50px"
                            height="50px"
                            alt="logo"
                        >
                    </a>
                </div>

                @php
                    $locale = app()->getLocale();
                @endphp

                <div class="main-sidemenu">

                    <ul class="side-menu">

                        {{-- =========================
                            MAIN
                        ========================== --}}
                        <li class="sub-category">
                            <h3>{{ __('Main') }}</h3>
                        </li>


                        {{-- =========================
                            DASHBOARD
                        ========================== --}}
                        <li class="slide">

                            <a
                                href="{{ route($locale . '.dashboard') }}"
                                class="side-menu__item has-link {{ request()->routeIs($locale . '.dashboard') ? 'active' : '' }}"
                            >

                                <i class="side-menu__icon fe fe-home"></i>

                                <span class="side-menu__label">
                    {{ __('messages.Dashboard') }}
                </span>

                            </a>

                        </li>


                        {{-- =========================
                            MANAGEMENT
                        ========================== --}}
                        <li class="sub-category">
                            <h3>{{ __('Management') }}</h3>
                        </li>


                        {{-- =========================
                            USERS
                        ========================== --}}
                        <li class="slide {{ request()->routeIs($locale . 'dashboard.users.*') ? 'is-expanded active' : '' }}">

                            <a
                                class="side-menu__item"
                                data-bs-toggle="slide"
                                href="javascript:void(0)"
                            >

                                <i class="side-menu__icon fe fe-users"></i>

                                <span class="side-menu__label">
                    {{ __('messages.Users') }}
                </span>

                                <i class="angle fe fe-chevron-right"></i>

                            </a>

                            <ul class="slide-menu">

                                {{-- All Users --}}
                                <li>
                                    <a
                                        href="{{ route($locale . '.dashboard.users.index') }}"
                                        class="slide-item {{ request()->routeIs($locale . '.users.index') ? 'active' : '' }}"
                                    >
                                        {{ __('messages.All Users') }}
                                    </a>
                                </li>

                                {{-- Create User --}}
                                <li>
                                    <a
                                        href="{{ route($locale . '.dashboard.users.create') }}"
                                        class="slide-item {{ request()->routeIs($locale . '.dashboard.users.create') ? 'active' : '' }}"
                                    >
                                        {{ __('messages.Create User') }}
                                    </a>
                                </li>

                            </ul>

                        </li>


                        {{-- =========================
                            CONTACT US
                        ========================== --}}
                        <li class="slide {{ request()->routeIs($locale . '.dashboard.contact-us.*') ? 'is-expanded active' : '' }}">

                            <a
                                class="side-menu__item"
                                data-bs-toggle="slide"
                                href="javascript:void(0)"
                            >

                                <i class="side-menu__icon fe fe-mail"></i>

                                <span class="side-menu__label">
                    {{ __('messages.Contact Us') }}
                </span>

                                <i class="angle fe fe-chevron-right"></i>

                            </a>

                            <ul class="slide-menu">

                                <li>
                                    <a
                                        href="{{ route($locale . '.dashboard.contact-us.index') }}"
                                        class="slide-item {{ request()->routeIs($locale . '.dashboard.contact-us.index') ? 'active' : '' }}"
                                    >
                                        {{ __('messages.All Messages') }}
                                    </a>
                                </li>

                            </ul>

                        </li>


                        {{-- =========================
                            GALLERY
                        ========================== --}}
                        <li class="slide {{ request()->routeIs($locale . '.dashboard.galleries.*') ? 'is-expanded active' : '' }}">

                            <a
                                class="side-menu__item"
                                data-bs-toggle="slide"
                                href="javascript:void(0)"
                            >

                                <i class="side-menu__icon fe fe-image"></i>

                                <span class="side-menu__label">
                    {{ __('messages.Gallery') }}
                </span>

                                <i class="angle fe fe-chevron-right"></i>

                            </a>

                            <ul class="slide-menu">

                                {{-- All Galleries --}}
                                <li>
                                    <a
                                        href="{{ route($locale . '.dashboard.galleries.index') }}"
                                        class="slide-item {{ request()->routeIs($locale . '.dashboard.galleries.index') ? 'active' : '' }}"
                                    >
                                        {{ __('messages.All Images') }}
                                    </a>
                                </li>

                                {{-- Create Gallery --}}
                                <li>
                                    <a
                                        href="{{ route($locale . '.dashboard.galleries.create') }}"
                                        class="slide-item {{ request()->routeIs($locale . '.dashboard.galleries.create') ? 'active' : '' }}"
                                    >
                                        {{ __('messages.Add Image') }}
                                    </a>
                                </li>

                            </ul>

                        </li>


                        {{-- =========================
                            MENU
                        ========================== --}}
                        <li class="slide {{ request()->routeIs($locale . '.dashboard.menus.*') ? 'is-expanded active' : '' }}">

                            <a
                                class="side-menu__item"
                                data-bs-toggle="slide"
                                href="javascript:void(0)"
                            >

                                <i class="side-menu__icon fe fe-menu"></i>

                                <span class="side-menu__label">
                    {{ __('messages.Menu') }}
                </span>

                                <i class="angle fe fe-chevron-right"></i>

                            </a>

                            <ul class="slide-menu">

                                {{-- All Menus --}}
                                <li>
                                    <a
                                        href="{{ route($locale . '.dashboard.menus.index') }}"
                                        class="slide-item {{ request()->routeIs($locale . '.dashboard.menus.index') ? 'active' : '' }}"
                                    >
                                        {{ __('messages.All Menus') }}
                                    </a>
                                </li>

                                {{-- Create Menu --}}
                                <li>
                                    <a
                                        href="{{ route($locale . '.dashboard.menus.create') }}"
                                        class="slide-item {{ request()->routeIs($locale . '.dashboard.menus.create') ? 'active' : '' }}"
                                    >
                                        {{ __('messages.Create Menu') }}
                                    </a>
                                </li>

                            </ul>

                        </li>


                        {{-- =========================
                            TEAM MEMBERS
                        ========================== --}}
                        <li class="slide {{ request()->routeIs($locale . '.dashboard.team-members.*') ? 'is-expanded active' : '' }}">

                            <a
                                class="side-menu__item"
                                data-bs-toggle="slide"
                                href="javascript:void(0)"
                            >

                                <i class="side-menu__icon fe fe-menu"></i>

                                <span class="side-menu__label">
                    {{ __('messages.team_members') }}
                </span>

                                <i class="angle fe fe-chevron-right"></i>

                            </a>

                            <ul class="slide-menu">

                                {{-- All Menus --}}
                                <li>
                                    <a
                                        href="{{ route($locale . '.dashboard.team-members.index') }}"
                                        class="slide-item {{ request()->routeIs($locale . '.dashboard.team-members.index') ? 'active' : '' }}"
                                    >
                                        {{ __('messages.All Team') }}
                                    </a>
                                </li>

                                {{-- Create Menu --}}
                                <li>
                                    <a
                                        href="{{ route($locale . '.dashboard.team-members.create') }}"
                                        class="slide-item {{ request()->routeIs($locale . '.dashboard.team-members.create') ? 'active' : '' }}"
                                    >
                                        {{ __('messages.Create Team') }}
                                    </a>
                                </li>

                            </ul>

                        </li>

                        {{-- =========================
                            PROJECTS
                        ========================== --}}
                        <li class="slide {{ request()->routeIs($locale . '.dashboard.projects.*') ? 'is-expanded active' : '' }}">

                            <a
                                class="side-menu__item"
                                data-bs-toggle="slide"
                                href="javascript:void(0)"
                            >

                                <i class="side-menu__icon fe fe-briefcase"></i>

                                <span class="side-menu__label">
                    {{ __('messages.Projects') }}
                </span>

                                <i class="angle fe fe-chevron-right"></i>

                            </a>

                            <ul class="slide-menu">

                                {{-- All Projects --}}
                                <li>
                                    <a
                                        href="{{ route($locale . '.dashboard.projects.index') }}"
                                        class="slide-item {{ request()->routeIs($locale . '.dashboard.projects.index') ? 'active' : '' }}"
                                    >
                                        {{ __('messages.All Projects') }}
                                    </a>
                                </li>

                                {{-- Create Project --}}
                                <li>
                                    <a
                                        href="{{ route($locale . '.dashboard.projects.create') }}"
                                        class="slide-item {{ request()->routeIs($locale . '.dashboard.projects.create') ? 'active' : '' }}"
                                    >
                                        {{ __('messages.Create Project') }}
                                    </a>
                                </li>

                                {{-- Properties --}}
                                <li>
                                    <a
                                        href="{{ route($locale . '.dashboard.properties.index') }}"
                                        class="slide-item {{ request()->routeIs($locale . '.dashboard.properties.index') ? 'active' : '' }}"
                                    >
                                        {{ __('messages.All Properties') }}
                                    </a>
                                </li>

                            </ul>

                        </li>


                        {{-- =========================
                            SERVICES
                        ========================== --}}
                        <li class="slide {{ request()->routeIs($locale . '.dashboard.services.*') ? 'is-expanded active' : '' }}">

                            <a
                                class="side-menu__item"
                                data-bs-toggle="slide"
                                href="javascript:void(0)"
                            >

                                <i class="side-menu__icon fe fe-settings"></i>

                                <span class="side-menu__label">
                    {{ __('messages.Services') }}
                </span>

                                <i class="angle fe fe-chevron-right"></i>

                            </a>

                            <ul class="slide-menu">

                                {{-- All Services --}}
                                <li>
                                    <a
                                        href="{{ route($locale . '.dashboard.services.index') }}"
                                        class="slide-item {{ request()->routeIs($locale . '.dashboard.services.index') ? 'active' : '' }}"
                                    >
                                        {{ __('messages.All Services') }}
                                    </a>
                                </li>

                                {{-- Create Service --}}
                                <li>
                                    <a
                                        href="{{ route($locale . '.dashboard.services.create') }}"
                                        class="slide-item {{ request()->routeIs($locale . '.dashboard.services.create') ? 'active' : '' }}"
                                    >
                                        {{ __('messages.Create Service') }}
                                    </a>
                                </li>

                            </ul>

                        </li>


                        {{-- =========================
                            SLIDERS
                        ========================== --}}
                        <li class="slide {{ request()->routeIs($locale . '.dashboard.sliders.*') ? 'is-expanded active' : '' }}">

                            <a
                                class="side-menu__item"
                                data-bs-toggle="slide"
                                href="javascript:void(0)"
                            >

                                <i class="side-menu__icon fe fe-sliders"></i>

                                <span class="side-menu__label">
                    {{ __('messages.Slider Settings') }}
                </span>

                                <i class="angle fe fe-chevron-right"></i>

                            </a>

                            <ul class="slide-menu">

                                {{-- All Sliders --}}
                                <li>
                                    <a
                                        href="{{ route($locale . '.dashboard.sliders.index') }}"
                                        class="slide-item {{ request()->routeIs($locale . '.dashboard.sliders.index') ? 'active' : '' }}"
                                    >
                                        {{ __('messages.All Sliders') }}
                                    </a>
                                </li>

                                {{-- Create Slider --}}
                                <li>
                                    <a
                                        href="{{ route($locale . '.dashboard.sliders.create') }}"
                                        class="slide-item {{ request()->routeIs($locale . '.dashboard.sliders.create') ? 'active' : '' }}"
                                    >
                                        {{ __('messages.Create Slider') }}
                                    </a>
                                </li>

                            </ul>

                        </li>


                        {{-- =========================
                            SETTINGS
                        ========================== --}}
                        <li class="sub-category">
                            <h3>{{ __('messages.System') }}</h3>
                        </li>


                        <li class="slide {{ request()->routeIs($locale . '.dashboard.settings.*') ? 'is-expanded active' : '' }}">

                            <a
                                class="side-menu__item"
                                data-bs-toggle="slide"
                                href="javascript:void(0)"
                            >

                                <i class="side-menu__icon fe fe-tool"></i>

                                <span class="side-menu__label">
                    {{ __('messages.Settings') }}
                </span>

                                <i class="angle fe fe-chevron-right"></i>

                            </a>

                            <ul class="slide-menu">

                                {{-- General Settings --}}
                                <li>
                                    <a
                                        href="{{ route($locale . '.dashboard.settings.show') }}"
                                        class="slide-item {{ request()->routeIs($locale . '.dashboard.settings.show') ? 'active' : '' }}"
                                    >
                                        {{ __('messages.General Settings') }}
                                    </a>
                                </li>

                            </ul>

                        </li>

                    </ul>

                </div>

            </div>
        </div>
        <!-- /APP SIDEBAR -->


        <!-- SIDEBAR RIGHT -->


        <!-- /SIDEBAR RIGHT -->
        <!-- COUNTRY MODAL -->

        <div class="modal fade" id="country-selector">

            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">


                    <div class="modal-header">

                        <h6 class="modal-title">
                            {{ __('messages.select_language') }}
                        </h6>


                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"></button>


                    </div>


                    <div class="modal-body">


                        <ul class="row p-3">


                            <li class="col-lg-6 mb-2">

                                <a href="{{ route('en.dashboard')  }}"
                                   class="btn btn-country btn-lg btn-block active">
                                    {{ __('messages.lang_en') }}
                                </a>

                            </li>


                            <li class="col-lg-6 mb-2">

                                <a href="{{ route('fa.dashboard')  }}"
                                   class="btn btn-country btn-lg btn-block active">
                                    {{ __('messages.lang_fa') }}
                                </a>

                            </li>

                        </ul>


                    </div>


                </div>

            </div>

        </div>


        <!-- FOOTER -->


        <footer class="footer">

            <div class="container">


                <div class="row align-items-center flex-row-reverse">


                    <div class="col-md-12 col-sm-12 text-center">


                        Copyright ©

                        <span id="year"></span>


                        {{ __('messages.developed_by') }}


                    </div>


                </div>


            </div>


        </footer>


    </div>

</div>


<!-- BACK TO TOP -->

<a href="#top"
   id="back-to-top">

    <i class="fa fa-angle-up"></i>

</a>


<!-- JQUERY -->

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>


<!-- BOOTSTRAP -->

<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>

<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>


<!-- SIDEBAR -->

<script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>


<!-- SIDE MENU -->

<script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>


<!-- PERFECT SCROLL -->

<script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('assets/plugins/p-scroll/pscroll.js') }}"></script>


<!-- VECTOR MAP -->

<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>

<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>


<!-- THEME -->

<script src="{{ asset('assets/js/themeColors.js') }}"></script>


<!-- CUSTOM -->

<script src="{{ asset('assets/js/custom.js') }}"></script>
<script> document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.querySelector('.app-sidebar-toggle');
        const sidebar = document.querySelector('.app-sidebar');
        if (!toggleButton || !sidebar) return;
        toggleButton.addEventListener('click', function () {
            const isOpen = sidebar.classList.toggle('show');
            if (isOpen) {
                sidebar.style.transform = 'translateX(0)';
            } else {
                sidebar.style.transform = 'translateX(-100%)';
            }
        });
    }); </script>
@yield('scripts')

</body>
</html>
