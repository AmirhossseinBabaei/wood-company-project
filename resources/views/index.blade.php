<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرایند شیمی نوین آسیا</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script type="module" src="/src/main.js"></script>
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <meta name="description"
        content="شرکت فرایند شیمی نوین آسیا تولیدکننده انواع گوگرد گرانوله، گوگرد پودری و گوگرد کلوخه با صادرات به کشورهای مختلف.">
    <meta name="keywords" content="گوگرد، گوگرد گرانوله، گوگرد پودری، گوگرد کلوخه، صادرات گوگرد، تولید گوگرد">
    <link rel="canonical" href="https://yourdomain.com/">
    <meta property="og:title" content="فرایند شیمی نوین آسیا">
    <meta property="og:description" content="تولید کننده انواع گوگرد صنعتی">
    <meta property="og:image" content="https://yourdomain.com/assets/images/logo.png">
    <meta property="og:type" content="website">
    @livewireStyles
</head>
<body>

    <!-- Container Fluid -->
    <div class="container-fluid">
        <!-- Header -->
        <div class="row" id="header">
            <div class="col-12 d-flex align-itmes-center justify-center">
                <div class="row col-2">
                    <span>
                        <i class="fa-brands fa-instagram"></i>
                    </span>
                    <span>
                        <i class="fa-brands fa-whatsapp"></i>
                    </span>
                    <span>
                        <i class="fa-regular fa-envelope"></i>
                    </span>
                </div>
                <div class="row col-8">
                    <div id="menuToggle">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <ul id="mobileMenu">
                        <li><a href="">تماس با ما</a></li>
                        <li><a href="">مقالات و دانشنامه</a></li>
                        <li><a href="">پروژه ها و صادرات</a></li>
                        <li><a href="">صنایع مصرف کننده</a></li>
                        <li><a href="">محصولات</a></li>
                        <li><a href="">درباره ما</a></li>
                        <li><a href="">صفحه اصلی</a></li>
                    </ul>
                </div>
                <div class="row col-2" id="headerLogoDiv">
                    <img src="assets/images/Logo Menu.png" loading="lazy" id="headerLogo">
                </div>
            </div>
        </div>
        <!-- End header -->
        {{ $slot }}
        <div class="row" style="margin-top: 100px !important;">
            <div class="row">
                <div class="col-12">
                    <footer class="footer">

                        <img loading="lazy" src="assets/images/Footer-Png.png" class="footer-top" alt="">

                        <div class="container">

                            <div class="row footer-content">

                                <!-- منو -->
                                <div class="col-lg-3">
                                    <ul class="footer-menu">
                                        <li><a href="#">صفحه اصلی</a></li>
                                        <li><a href="#">محصولات</a></li>
                                        <li><a href="#">کاربردها</a></li>
                                        <li><a href="#">تماس با ما</a></li>
                                    </ul>
                                </div>

                                <!-- اطلاعات -->
                                <div class="col-lg-4">

                                    <h6>دفتر مرکزی</h6>

                                    <p>
                                        <i class="fa-solid fa-location-dot"></i>
                                        خراسان رضوی، شهرستان چناران، شهرک صنعتی چناران قطعه 14
                                    </p>

                                    <p>
                                        <i class="fa-solid fa-phone"></i>
                                        0513 888 5533
                                    </p>

                                    <p>
                                        <i class="fa-solid fa-phone"></i>
                                        0513 888 5533
                                    </p>


                                </div>

                                <!-- لوگو -->
                                <div class="col-lg-5 text-end">

                                    <img loading="lazy" src="assets/images/Logo Footer.png" class="footer-logo">

                                </div>

                            </div>

                        </div>

                    </footer>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row col-12">
                <div class="h-100" id="copyRightParent">
                    <div class="copyright">
                        <span>
                            طراحی و توسعه یافته توسط شرکت
                            <strong>سیما رسانه شهر</strong>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container Fluid -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/VincentGarreau/particles.js@2.0.0/particles.min.js"></script>
    <script>
        particlesJS("bgDoted", {
            particles: {
                number: {
                    value: 800,
                    density: {
                        enable: true,
                        value_area: 900
                    }
                },
                color: {
                    value: "#ffffff"
                },
                shape: {
                    type: "circle"
                },
                opacity: {
                    value: .6
                },
                size: {
                    value: 3,
                    random: true
                },
                line_linked: {
                    enable: true,
                    distance: 140,
                    color: "#ffffff",
                    opacity: .2,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 2
                }
            },
            interactivity: {
                detect_on: "canvas",
                events: {
                    onhover: {
                        enable: true,
                        mode: "repulse"
                    },
                    onclick: {
                        enable: true,
                        mode: "push"
                    }
                },
                modes: {
                    repulse: {
                        distance: 150,
                        duration: .4
                    },
                    push: {
                        particles_nb: 6
                    }
                }
            },
            retina_detect: true
        });
    </script>
    @livewireScripts
</body>
</html>