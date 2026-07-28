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
    <link rel="icon" href="{{ asset('assets/images/logo-avg.gif') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    @livewireStyles
    <style>
        section {
            text-align: right !important;
        }

        #bgDoted {
            border-radius: 100% !important;
        }
    </style>
</head>

<body>
    <!-- Container Fluid -->
    <div class="container-fluid">
        <livewire:header-component />
        {{ $slot }}
        <livewire:footer-component />
        <!-- End Container Fluid -->
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/VincentGarreau/particles.js@2.0.0/particles.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <script>
            particlesJS("bgDoted", {
                particles: {
                    number: {
                        value: 1200,
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
                        value: 0.6
                    },
                    size: {
                        value: 3,
                        random: true
                    },
                    line_linked: {
                        enable: false
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
                            duration: 0.4
                        },
                        push: {
                            particles_nb: 6
                        }
                    }
                },
                retina_detect: true
            });
        </script>
</body>

</html>
