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
        .container-fluid{
            position:absolute !important;
            top:0 !important;
        }
    </style>
    @vite('resources/js/app.js')
    @yield('styles')
</head>
<body>

<div class="container-fluid">
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
                                    <span class="text-white">FA</span>
                                @else
                                    <span class="text-white">EN</span>
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

                        </li>
                </ul>
            </div>

            <!-- Logo -->
            <div class="col-6 col-lg-6 d-flex justify-content-end">
                <img src="{{ 'storage/'. $data['setting']->logo_src ?? '' }}" alt="Logo" style="height:60px;"
                     class="mt-2">
            </div>
        </div>
    </div>
    <!-- Hero Slider -->
    <div class="row">
        <div class="col-12 d-flex align-items-center" id="Hero">
            <!-- Slider -->
            <div class="col-xl-6 col-sm-12" id="sliderContainer">

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
            <div class="col-6 web-background h-100 text-white d-flex align-items-center flex-column justify-content-center hero">

                <h1 class="hero-title">
                    {{ $data['setting']->{app()->getLocale() . "_hero_title"} }}
                </h1>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 container fade-left">
            <div
                class="col-12 h-100 web-background d-flex align-items-center justify-content-center text-center flex-column">
                <div class="col-xl-6 mt-5 col-sm-8 col-md-5">
                    <h3 class="text-warning-font-avaible">{{ $data['setting']->{app()->getLocale() . "_website_name"} ?? '-' }}</h3>
                    <p style="font-size: 20px !important" class="bold text-warning-50">
                        {{ $data['setting']->{app()->getLocale() . "_website_description"} ?? '-' }}
                    </p>
                </div>
                <div class="col-12 about-cards-container d-flex align-items-center justify-content-center">
                    <div class="col-xl-1 col-sm-12 about-card">
                        <div class="quick_fact align_center animate-math">
                            <div class="number-wrapper">
                                <span class="number" data-to="{{ $data['counters']['servicesCount'] ?? 0 }}">0</span>
                            </div>
                            <hr class="hr_narrow">
                            <div class="desc">{{ __('Home::words.services_count') }}</div>
                        </div>
                    </div>
                    <div class="col-xl-1 col-sm-12 about-card">
                        <div class="quick_fact align_center animate-math">
                            <div class="number-wrapper">
                                <span class="number" data-to="{{ $data['counters']['projectsCount'] ?? 0 }}">0</span>
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
    <!-- content -->
    @yield('content')
    <div class="row">
        <div class="container fade-left">
            <footer class="footer">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 col-md-6 mb-4">
                            <h3 class="footer-logo">
                                <img src="{{ 'storage/'. $data['setting']->footer_logo ?? '' }}" alt="Logo" style="height:60px;"
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
                                    <li><a href="{{ $menu->{app()->getLocale() . "_url"} }}">{{ $menu->{app()->getLocale() . "_title"} }}</a></li>
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
                                <a target="_blank" href="{{ $data['setting']->telegram ?? '-' }}">{{ __('messages.telegram') }}</a>
                                <a target="_blank" href="{{ $data['setting']->instagram ?? '-' }}">{{ __('messages.instagram') }}</a>
                                <a target="_blank" href="{{ $data['setting']->linkedin ?? '-' }}">{{ __('messages.linkedin') }}</a>
                                <a target="_blank" href="{{ $data['setting']->whatsapp ?? '-' }}">{{ __('messages.whatsapp') }}</a>
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
