<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ $data['setting']->{app()->getLocale() . "_website_name"} }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ 'storage/' . $data['setting']->favicon }}">
    @vite('resources/js/app.js')
    @yield('styles')
    <style>
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
    </style>
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
                                    <img src="https://flagcdn.com/w40/ir.png"
                                         width="32"
                                         height="21"
                                         class="rounded-1"
                                         alt="FA">
                                    <span>FA</span>
                                @else
                                    <img src="https://flagcdn.com/w40/gb.png"
                                         width="32"
                                         height="21"
                                         class="rounded-1"
                                         alt="EN">
                                    <span>EN</span>
                                @endif

                                <span id="languageArrow">⌄</span>

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
                <img src="{{ asset('storage/'. $data['setting']->logo_src ) }}" alt="Logo" style="height:60px;"
                     class="mt-2">
            </div>
        </div>
    </div>

    <!-- content -->
    @yield('content')
    <div class="row">
        <div class="container">
            <footer class="footer">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 col-md-6 mb-4">
                            <h3 class="footer-logo">
                                <img src="{{ asset('storage/'. $data['setting']->footer_logo) ?? '' }}" alt="Logo"
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
