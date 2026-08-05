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
English
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





                                    <!-- NOTIFICATION -->

                                    <div class="dropdown d-flex notifications">


                                        <a class="nav-link icon"
                                           data-bs-toggle="dropdown">


                                            <i class="fe fe-bell"></i>

                                            <span class="pulse"></span>

                                        </a>


                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">


                                            <div class="drop-heading border-bottom">

                                                <h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark">
                                                    Notifications
                                                </h6>

                                            </div>



                                            <div class="notifications-menu">


                                                <a class="dropdown-item d-flex"
                                                   href="#">

                                                    <div class="me-3 notifyimg bg-primary brround">

                                                        <i class="fe fe-mail"></i>

                                                    </div>


                                                    <div>

                                                        <h5 class="notification-label mb-1">
                                                            New notification
                                                        </h5>


                                                        <span class="notification-subtext">
3 days ago
</span>


                                                    </div>


                                                </a>



                                            </div>



                                            <div class="dropdown-divider m-0"></div>


                                            <a href="#"
                                               class="dropdown-item text-center p-3 text-muted">

                                                View all Notification

                                            </a>


                                        </div>


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
                                                        Admin
                                                    </h5>


                                                    <small class="text-muted">
                                                        Administrator
                                                    </small>


                                                </div>

                                            </div>



                                            <div class="dropdown-divider m-0"></div>


                                            <a class="dropdown-item"
                                               href="#">

                                                <i class="dropdown-icon fe fe-user"></i>

                                                Profile

                                            </a>



                                            <a class="dropdown-item"
                                               href="#">

                                                <i class="dropdown-icon fe fe-mail"></i>

                                                Inbox

                                            </a>



                                            <a class="dropdown-item"
                                               href="#">

                                                <i class="dropdown-icon fe fe-lock"></i>

                                                Lockscreen

                                            </a>



                                            <a class="dropdown-item"
                                               href="#">

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


                <div class="side-header">

                    <a class="header-brand1"
                       href="{{ route('dashboard') }}">


                        <img src="{{ asset('modules/admin/images/logo.png') }}"
                             class="header-brand-img desktop-logo"
                             alt="logo">


                    </a>

                </div>





                <div class="main-sidemenu">


                    <ul class="side-menu">



                        <!-- MAIN -->

                        <li class="sub-category">

                            <h3>
                                Main
                            </h3>

                        </li>





                        <li class="slide">


                            <a class="side-menu__item has-link
{{ request()->routeIs('dashboard') ? 'active' : '' }}"
                               href="{{ route('dashboard') }}">


                                <i class="side-menu__icon fe fe-home"></i>


                                <span class="side-menu__label">

Dashboard

</span>


                            </a>


                        </li>





                        <!-- MANAGEMENT -->

                        <li class="sub-category">

                            <h3>
                                Management
                            </h3>

                        </li>






                        <!-- USERS -->

                        <li class="slide
{{ request()->routeIs('dashboard.users.*') ? 'is-expanded active' : '' }}">



                            <a class="side-menu__item"
                               data-bs-toggle="slide"
                               href="javascript:void(0)">



                                <i class="side-menu__icon fe fe-users"></i>



                                <span class="side-menu__label">

Users

</span>



                                <i class="angle fe fe-chevron-right"></i>


                            </a>





                            <ul class="slide-menu">



                                <li>

                                    <a href="{{ route('dashboard.users.index') }}"
                                       class="slide-item
{{ request()->routeIs('dashboard.users.index') ? 'active' : '' }}">

                                        All Users

                                    </a>

                                </li>





                                <li>

                                    <a href="{{ route('dashboard.users.create') }}"
                                       class="slide-item
{{ request()->routeIs('dashboard.users.create') ? 'active' : '' }}">

                                        Create User

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


        <div class="sidebar sidebar-right sidebar-animate">


            <div class="panel panel-primary card mb-0 shadow-none border-0">


                <div class="tab-menu-heading border-0 d-flex p-3">


                    <div class="card-title mb-0">

                        <i class="fe fe-bell me-2"></i>

                        Notifications

                    </div>



                    <div class="card-options ms-auto">


                        <a href="javascript:void(0)"
                           class="sidebar-icon text-end float-end"
                           data-bs-toggle="sidebar-right"
                           data-target=".sidebar-right">


                            <i class="fe fe-x"></i>


                        </a>


                    </div>


                </div>





                <div class="panel-body tabs-menu-body latest-tasks p-0 border-0">


                    <div class="tabs-menu border-bottom">


                        <ul class="nav panel-tabs">


                            <li>

                                <a href="#side1"
                                   class="active"
                                   data-bs-toggle="tab">

                                    Feeds

                                </a>

                            </li>



                            <li>

                                <a href="#side2"
                                   data-bs-toggle="tab">

                                    Chat

                                </a>

                            </li>



                            <li>

                                <a href="#side3"
                                   data-bs-toggle="tab">

                                    Timeline

                                </a>

                            </li>


                        </ul>


                    </div>





                    <div class="tab-content">



                        <div class="tab-pane active"
                             id="side1">


                            <div class="p-4">


                                <h5>
                                    Feeds
                                </h5>


                                <div class="card">


                                    <div class="card-body">


                                        <p>
                                            New user registered
                                        </p>


                                        <p>
                                            New order received
                                        </p>


                                        <p>
                                            Server notification
                                        </p>


                                    </div>


                                </div>


                            </div>


                        </div>






                        <div class="tab-pane"
                             id="side2">


                            <div class="p-4">


                                <h5>
                                    Messages
                                </h5>


                                <p>
                                    No messages
                                </p>


                            </div>


                        </div>







                        <div class="tab-pane"
                             id="side3">


                            <div class="p-4">


                                <h5>
                                    Timeline
                                </h5>


                                <p>
                                    No activity
                                </p>


                            </div>


                        </div>



                    </div>


                </div>


            </div>


        </div>



        <!-- /SIDEBAR RIGHT -->
        <!-- COUNTRY MODAL -->

        <div class="modal fade" id="country-selector">

            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">


                    <div class="modal-header">

                        <h6 class="modal-title">
                            Choose Country
                        </h6>


                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"></button>


                    </div>



                    <div class="modal-body">


                        <ul class="row p-3">



                            <li class="col-lg-6 mb-2">

                                <a href="javascript:void(0)"
                                   class="btn btn-country btn-lg btn-block active">


                                    USA


                                </a>

                            </li>



                            <li class="col-lg-6 mb-2">

                                <a href="javascript:void(0)"
                                   class="btn btn-country btn-lg btn-block">


                                    Germany


                                </a>

                            </li>



                            <li class="col-lg-6 mb-2">

                                <a href="javascript:void(0)"
                                   class="btn btn-country btn-lg btn-block">


                                    Turkey


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


                        Simaresane

                        All rights reserved.


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




@yield('scripts')


</body>
</html>
