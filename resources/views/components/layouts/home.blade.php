<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wood</title>
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    @vite('resources/assets/css/index.css')
    @vite('resources/js/app.js')
    @yield('styles')
</head>
<body>

<div class="container-fluid">
    <!-- Navbar -->
    <div class="row navbar fixed-top">
        <div class="row align-items-center col-12 my-navbar">

            <!-- Button Show Header in the Mobile Mode -->
            <div class="col-6 d-lg-none">
                <button class="btn text-white" data-bs-toggle="collapse" data-bs-target="#mobileMenu">
                    ☰
                </button>
            </div>

            <!-- Menu -->
            <div class="col-lg-6 collapse d-lg-block" id="mobileMenu">
                <ul class="nav justify-content-start align-items-center gap-4 m-0 flex-column flex-lg-row">

                    @foreach($data['headerMenus'] as $menu)
                        <li class="nav-item bold active">
                            <a class="nav-link"
                               href="{{ $menu->{app()->getLocale() . "_url"} }}">{{ $menu->{app()->getLocale() . "_title"} }}</a>
                        </li>
                    @endforeach


                    <li class="nav-item d-flex gap-2 no-border">
                        <div class="language-switch">
                                <span>
                                    <img width="30px" height="20px" class="language-flag m-1"
                                         src="https://flagcdn.com/w40/ir.png">
                                </span>
                            <span>
                                    <img width="30px" height="20px" class="language-flag m-1"
                                         src="https://flagcdn.com/w40/gb.png">
                                </span>
                        </div>
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
            <div
                class="col-6 web-background h-100 text-white d-flex align-items-center flex-column justify-content-center hero">
                <h6 style="font-size: 30px !important;">{{ __('Home::words.home_title1') }}</h6>
                <h1>{{ __('Home::words.home_title2') }}</h1>
                <h6>{{ __('Home::words.home_title3') }}</h6>
                <h1>{{ __('Home::words.home_title4') }}</h1>
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
                            <div class="desc">محصول مختلف</div>
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
                                    <li><a href="{{ $menu->{app()->getLocale() . "_website_url"} }}">{{ $menu->{app()->getLocale() . "_website_name"} }}</a></li>
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

<script src="script.js" type="module"></script>
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

                    const speed = 2000; // زمان انیمیشن

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

@yield('scripts')

</body>
</html>
