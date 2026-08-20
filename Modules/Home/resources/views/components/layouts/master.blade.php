<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ $data['setting']->{app()->getLocale() . "_website_name"} }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ 'storage/' . $data['setting']->favicon }}">

    <style>
        .hero {
            text-align: center;
            padding: 30px 50px;
        }

        .hero-title {
            max-width: 600px;
            font-size: 42px;
            line-height: 1.8;
            font-weight: 700;
            text-align: center;
        }

        @media (min-width: 100px) and (max-width: 900px) {
            #Hero {
                margin-top: 50px !important;
            }

            .dropdown-item {
                height: 100px !important;
            }

            #langMenuParent {
                display: flex !important;
            }

            #languageDropdownBtn {
                display: none !important;
            }
        }

        #mobileMenu {
            display: block;
        }

        /* Mobile */
        @media (max-width: 991.98px) {

            #mobileMenu {
                display: none;
                width: 100%;
                overflow: hidden;
            }

            #mobileMenu.show {
                display: block;
                animation: mobileMenuOpen 0.25s ease;
            }

            #mobileMenu ul {
                width: 100%;
                padding: 15px 0;
            }

            #mobileMenu li {
                width: 100%;
                text-align: center;
            }

            #mobileMenu .language-switch {
                justify-content: center;
            }
        }

        @keyframes mobileMenuOpen {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .language-dropdown .dropdown-menu {
            min-width: 150px;
            padding: 6px;
            border-radius: 10px;
        }

        .language-dropdown .dropdown-item {
            border-radius: 7px;
            padding: 8px 10px;
        }

        .language-dropdown .dropdown-item:hover {
            background-color: #f5f5f5;
        }

        .container-fluid {
            position: absolute !important;
            top: 0 !important;
        }

        .hero-subtitle {
            max-width: 520px;
            margin-top: 18px;
            color: rgba(255, 255, 255, 0.78);
            font-size: 18px;
            line-height: 1.9;
            text-align: center;
            font-weight: 400;
        }

        .hero-bg {
            background-color: #413a27;
        }

        .my-doran5 {
            font-family: 'dooran5' !important;
        }

        #bgArg {
            position: relative;
            overflow: hidden;

            background-image: radial-gradient(
                ellipse at center,
                rgba(65, 58, 39, 0.78) 0%,
                rgba(65, 58, 39, 0.88) 50%,
                rgba(65, 58, 39, 0.97) 100%
            ),
            url('{{ asset('assets/images/bg/bg-wood3.jpg') }}') !important;

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat !important;

            margin-bottom: -1px;
        }

     #sideEffect{
         width: 1000px !important;
         position: absolute;
         top: 79rem !important;
         left: -31rem ! IMPORTANT;
         transform: scaleX(-1) rotate(-26deg);
     }

        @media (max-width: 991px) {
            #sideEffect {
                width: 500px !important;
                top: 34rem !important;
            }
        }

        @media (max-width: 767px) {
            #sideEffect {
                width: 350px !important;
                top: 34rem !important;
            }
        }

        @media (max-width: 575px) {
            #sideEffect {
                display: none !important;
            }
        }
        #videoContainer {
            position: relative;
            overflow: hidden;
            background: #fff !important;
        }

        /* فقط 50٪ بالایی */
        #videoContainer::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 50%;

            background-image:
                radial-gradient(
                    ellipse at center,
                    rgba(65, 58, 39, 0.78) 0%,
                    rgba(65, 58, 39, 0.88) 50%,
                    rgba(65, 58, 39, 0.97) 100%
                ),
                url('{{ asset('assets/images/bg/bg-wood3.jpg') }}');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;

            z-index: 0;
        }

        /* ویدیو روی بک‌گراند */
        #videoContainer > * {
            position: relative;
            z-index: 1;
        }
    </style>
    @vite('resources/js/app.js')
    @yield('styles')
</head>
<body>

<div class="container-fluid">
    <div class="col-12 bg-danger d-block" id="bgArg" style="min-height:100px !important">
        <!-- Navbar -->
        <div class="row navbar fixed-top">
            <div class="row align-items-center col-12 my-navbar">

                <!-- Mobile Menu Button -->
                <div class="col-6 d-lg-none">
                    <button type="button"
                            class="btn text-white"
                            id="mobileMenuBtn"
                            aria-expanded="false">
                        ☰
                    </button>
                </div>

                <!-- Menu -->
                <div class="col-lg-6" id="mobileMenu">
                    <ul class="nav justify-content-start align-items-center gap-4 m-0 flex-column flex-lg-row">

                        @foreach($data['headerMenus'] as $menu)
                            <li class="nav-item bold {{ url()->current() == $menu->{app()->getLocale() . "_url"} ? 'active' : '' }}">
                                <a class="nav-link"
                                   href="{{ $menu->{app()->getLocale() . "_url"} }}">
                                    {{ $menu->{app()->getLocale() . "_title"} }}
                                </a>
                            </li>
                        @endforeach

                        <li class="nav-item dropdown no-border">

                            <button type="button"
                                    class="btn p-1 border-0 d-flex align-items-center gap-2"
                                    id="languageDropdownBtn"
                                    style="background: transparent; color: inherit;">

                                @if(app()->getLocale() == 'fa')
                                    <span class="text-white">
                                                   <img src="https://flagcdn.com/w40/ir.png"
                                                        width="28"
                                                        height="19"
                                                        class="rounded-1"
                                                        alt="FA">
                                    </span>
                                @else
                                    <span class="text-white">
                                                <img src="https://flagcdn.com/w40/gb.png"
                                                     width="28"
                                                     height="19"
                                                     class="rounded-1"
                                                     alt="EN">

                                    </span>
                                @endif


                            </button>
                            <ul id="languageDropdownMenu"
                                class="dropdown-menu dropdown-menu-end shadow-sm border-0">

                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2"
                                       href="{{ route('home.fa') }}">

                                        <img src="https://flagcdn.com/w40/ir.png"
                                             width="28"
                                             height="19"
                                             class="rounded-1"
                                             alt="FA">

                                        <span class="text-black-50">فارسی</span>

                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2"
                                       href="{{ route('home.en') }}">

                                        <img src="https://flagcdn.com/w40/gb.png"
                                             width="28"
                                             height="19"
                                             class="rounded-1"
                                             alt="EN">

                                        <span class="text-black-50">English</span>

                                    </a>
                                </li>

                            </ul>
                            <div id="langMenuParent"
                                 class="col-12 d-flex align-items-center justify-content-around d-none"
                                 style="margin-right:10px !important">
                                <div class="col-6 mr-3">
                                    <a class="dropdown-item d-flex align-items-center gap-2"
                                       href="{{ route('home.fa') }}">

                                        <img src="https://flagcdn.com/w40/ir.png"
                                             width="28"
                                             height="19"
                                             class="rounded-1"
                                             alt="FA">

                                        <span class="text-white-50">فارسی</span>

                                    </a>

                                </div>
                                <div class="col-">
                                    <a class="dropdown-item d-flex align-items-center gap-2"
                                       href="{{ route('home.en') }}">

                                        <img src="https://flagcdn.com/w40/gb.png"
                                             width="28"
                                             height="19"
                                             class="rounded-1"
                                             alt="EN">

                                        <span class="text-white-50">English</span>

                                    </a>

                                </div>

                            </div>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
        <!-- Hero Slider -->
        <div class="row">
            <div class="col-12 d-flex align-items-center bg-hero" id="Hero">
                <!-- Slider -->
                <div class="col-xl-6 col-sm-12 bg-hero" id="sliderContainer">

                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach($data['sliders'] as $slider)
                                <div class="swiper-slide">
                                    <img src="{{ 'storage/' .$slider->image }}">
                                </div>
                            @endforeach

                        </div>

                        <div class="swiper-pagination"></div>
                    </div>

                </div>
                <!-- Hero -->
                <div
                    class="col-6 web-background h-100 text-white d-flex align-items-center flex-column justify-content-center hero bg-hero flex-column">
                    <div
                        class="col-6 web-background h-100 text-white d-flex align-items-center flex-column justify-content-center hero bg-hero">

                        <img src="{{ asset('assets/images/title/web-title.png') }}" width="350px" height="200px">

                        <div class="col-12 col-lg-6 d-flex justify-content-end ml-5"
                             style="margin-top: 90px !important;">
                            <img src="{{ 'storage/'. $data['setting']->logo_src ?? '' }}" alt="Logo"
                                 style="margin-left:30px;width:150px;height:40px"
                                 class="mt-2">
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 container fade-left">
                <div
                    class="col-12 h-100 web-background d-flex align-items-center justify-content-center text-center flex-column bg-hero">
                    <div class="col-xl-4 mt-5 col-sm-8 col-md-5">
                        <p style="font-size: 20px !important" class="bold text-warning-50">
                            {{ $data['setting']->{app()->getLocale() . "_website_description"} ?? '-' }}
                        </p>
                    </div>
                    <div
                        class="col-12 about-cards-container d-flex align-items-center justify-content-center bg-woody bg-hero">
                        <div class="col-xl-1 col-sm-12 about-card">
                            <div class="quick_fact align_center animate-math">
                                <div class="number-wrapper">
                                    <span class="number"
                                          data-to="{{ $data['counters']['servicesCount'] ?? 0 }}">0</span>
                                </div>
                                <hr class="hr_narrow">
                                <div class="desc">{{ __('Home::words.services_count') }}</div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-sm-12 about-card">
                            <div class="quick_fact align_center animate-math">
                                <div class="number-wrapper">
                                    <span class="number"
                                          data-to="{{ $data['counters']['projectsCount'] ?? 0 }}">0</span>
                                </div>
                                <hr class="hr_narrow">
                                <div class="desc">{{ __('Home::words.projects_count') }}</div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-sm-12 about-card">
                            <div class="quick_fact align_center animate-math">
                                <div class="number-wrapper">
                                    <span class="number" data-to="{{ $data['counters']['usersCount'] ?? 0 }}">0</span>
                                </div>
                                <hr class="hr_narrow">
                                <div class="desc">{{ __('Home::words.users_count') }}</div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-sm-12 about-card">
                            <div class="quick_fact align_center animate-math">
                                <div class="number-wrapper">
                                    <span class="number" data-to="89">0</span>
                                </div>
                                <hr class="hr_narrow">
                                <div class="desc">{{ __('Home::words.satisfied_customer') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="container fade-right bg-woody bg-hero">

                <div
                    class="col-12 d-flex align-items-center justify-content-center bg-woody"
                    id="videoContainer"
                >

                    <video
                        src="{{ asset('assets/videos/video-hero.mp4') }}"
                        autoplay
                        muted
                        loop
                        playsinline
                        preload="metadata"
                    ></video>

                </div>

            </div>

        </div>
    </div>
    <!-- content -->
    @yield('content')
    <div class="row">
        <div class="container fade-left">
            <footer class="footer">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 col-md-6 mb-4">
                            <h3 class="footer-logo">
                                <img src="{{ 'storage/'. $data['setting']->footer_logo ?? '' }}" alt="Logo"
                                     style="height:60px;"
                                     class="mt-2">
                            </h3>
                            <p>
                                {{ $data['setting']->{app()->getLocale() . "_website_description"} }}
                            </p>
                        </div>


                        <div class="col-lg-2 col-md-6 mb-4">
                            <h5>{{ __('Home::words.fast_access') }}</h5>
                            <ul>
                                @foreach($data['footerMenus'] as $menu)
                                    <li>
                                        <a href="{{ $menu->{app()->getLocale() . "_url"} }}">{{ $menu->{app()->getLocale() . "_title"} }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                        <div class="col-lg-3 col-md-6 mb-4">
                            <h5>{{ __('Home::words.contact_us')  }}</h5>
                            <p>📍 {{ $data['setting']->{app()->getLocale() . "_address"} ?? '-' }} </p>
                            <p>📞 {{ $data['setting']->phone ?? '-' }}</p>
                            <p>📞 {{ $data['setting']->mobile ?? '-' }}</p>
                            <p>✉ {{ $data['setting']->email ?? '-' }}</p>

                            <div class="social">
                                <a target="_blank"
                                   href="{{ $data['setting']->telegram ?? '-' }}">{{ __('messages.telegram') }}</a>
                                <a target="_blank"
                                   href="{{ $data['setting']->instagram ?? '-' }}">{{ __('messages.instagram') }}</a>
                                <a target="_blank"
                                   href="{{ $data['setting']->linkedin ?? '-' }}">{{ __('messages.linkedin') }}</a>
                                <a target="_blank"
                                   href="{{ $data['setting']->whatsapp ?? '-' }}">{{ __('messages.whatsapp') }}</a>
                            </div>
                        </div>

                    </div>

                    <div class="footer-bottom">
                        <p>
                            {{ __('messages.copyright') }}
                        </p>
                        <strong>
                            {{ __('messages.developed_by') }}
                        </strong>
                    </div>

                </div>
            </footer>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const button = document.getElementById('languageDropdownBtn');
        const menu = document.getElementById('languageDropdownMenu');
        const arrow = document.getElementById('languageArrow');

        if (!button || !menu) {
            return;
        }

        button.addEventListener('click', function (e) {

            e.preventDefault();
            e.stopPropagation();

            menu.classList.toggle('show');

            if (menu.classList.contains('show')) {
                arrow.style.transform = 'rotate(180deg)';
            } else {
                arrow.style.transform = 'rotate(0deg)';
            }

        });

        document.addEventListener('click', function (e) {

            if (!button.contains(e.target) && !menu.contains(e.target)) {

                menu.classList.remove('show');

                arrow.style.transform = 'rotate(0deg)';
            }

        });

    });
</script>
<script>

    const counters = document.querySelectorAll('.number');

    const options = {
        threshold: 0.5
    };

    const observer = new IntersectionObserver((entries, observer) => {

        entries.forEach(entry => {

            if (entry.isIntersecting) {

                counters.forEach(counter => {

                    const target = +counter.getAttribute('data-to');
                    let count = 0;

                    const speed = 2000;
                    const increment = target / (speed / 16);

                    function updateCounter() {

                        count += increment;

                        if (count < target) {
                            counter.innerText = Math.ceil(count);
                            requestAnimationFrame(updateCounter);
                        } else {
                            counter.innerText = target;
                        }

                    }

                    updateCounter();

                });

                observer.disconnect();

            }

        });

    }, options);


    const section = document.querySelector('.about-cards-container');

    observer.observe(section);

    document.addEventListener("DOMContentLoaded", () => {

        const elements = document.querySelectorAll(".fade-right, .fade-left");

        const observer = new IntersectionObserver((entries) => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    entry.target.classList.add("show");

                    observer.unobserve(entry.target);
                }

            });

        }, {
            threshold: 0.1
        });
        elements.forEach(el => observer.observe(el));
    });

    window.addEventListener('scroll', function () {
        const navbar = document.querySelector('.navbar');

        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const menuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        menuBtn.addEventListener('click', function () {

            mobileMenu.classList.toggle('show');

            const isOpen = mobileMenu.classList.contains('show');
            menuBtn.setAttribute('aria-expanded', isOpen);
            menuBtn.innerHTML = isOpen ? '✕' : '☰';
        });

        window.addEventListener('resize', function () {

            if (window.innerWidth >= 992) {
                mobileMenu.classList.remove('show');
                menuBtn.innerHTML = '☰';
                menuBtn.setAttribute('aria-expanded', 'false');
            }

        });

    });
</script>

@yield('scripts')
</body>
</html>
