@extends('home::components.layouts.master')

@section('title', __('Home::words.home'))

@section('styles')

    <style>

        /* =========================================================
           IMAGE PERFORMANCE
        ========================================================== */

        img {
            max-width: 100%;
        }

        .project-card .image-box {
            width: 100%;
            aspect-ratio: 4 / 3;
            overflow: hidden;
            border-radius: 30px;
            background: #f2f4f7;
        }

        .project-card .image-box img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
        }

        #videoContainer video {
            display: block;
            max-width: 100%;
            height: auto;
        }

        .slider-wrapper img {
            display: block;
            width: 100px;
            height: 100px;
            object-fit: contain;
        }

        /* جلوگیری از نمایش تصویر شکسته قبل از لود */

        img[data-src] {
            opacity: 0;
            transition: opacity .3s ease;
        }

        img[data-src].image-loaded {
            opacity: 1;
        }

    </style>

@endsection


@section('content')


    {{-- =========================================================
         HERO VIDEO
    ========================================================== --}}

    <div class="row">

        <div class="container fade-right">

            <div
                class="col-12 d-flex align-items-center justify-content-center"
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


    {{-- =========================================================
         ADVANTAGES
    ========================================================== --}}

    <div class="row">

        <section class="container py-5 fade-right bg-body">

            <div class="row g-5">

                <div
                    class="col-lg-7"
                    style="background-color: rgb(255, 255, 255) !important;"
                >

                    <div class="row g-4">

                        {{-- تصویر اصلی صفحه --}}
                        {{-- این یکی عمداً فوری لود می‌شود --}}

                        <img
                            src="{{ asset('assets/images/slider/1.webp') }}"
                            alt="تصویر روشن ۱"
                            width="1200"
                            height="800"
                            loading="lazy"
                            fetchpriority="high"
                            decoding="async"
                        >

                    </div>

                </div>

                <div
                    class="col-lg-5"
                    style="background-color: rgb(255, 255, 255) !important;"
                >

                    <div class="sticky-content">

                        <h3 class="text-warning text-uppercase">
                            {{ __('Home::words.advantages') }}
                        </h3>

                        <h4 class="fw-bold mb-4">
                            {{ __('Home::words.advantages_slug') }}
                        </h4>

                        <p class="text-muted lh-lg">
                            {{ __('Home::words.advantages_description') }}
                        </p>

                        <button class="btn btn-warning px-4 py-2 mt-3">

                            <a
                                class="text-decoration-none text-black"
                                href="{{ route(app()->getLocale() . '.projects') }}"
                            >
                                {{ __('Home::words.show_my_portfolio') }}
                            </a>

                        </button>

                    </div>

                </div>

            </div>

        </section>

    </div>


    {{-- =========================================================
         PROJECTS
    ========================================================== --}}

    <div class="row">

        <div class="container fade-left bg-white">

            <div class="col-12">

                <div class="text-center col-12">

                    <h6>
                        {{ __('Home::words.some_completed_projects') }}
                    </h6>

                    <h2>
                        {{ __('Home::words.we_completed_some_projects') }}
                    </h2>

                </div>


                <div
                    class="col-12 d-flex align-items-center justify-content-center flex-wrap mt-5"
                >

                    @foreach($data['projects'] as $project)

                        <div
                            class="card project-card col-xl-3 col-lg-6 col-sm-4"
                            style="border: none;"
                        >

                            <a
                                style="text-decoration: none !important"
                                class="text-black text-decoration-none"
                                href="{{ route(
                                    app()->getLocale() . '.projects.show',
                                    [
                                        'name' => str_replace(
                                            ' ',
                                            '-',
                                            $project->{app()->getLocale() . '_name'}
                                        ),
                                        'id' => $project->id
                                    ]
                                ) }}"
                                target="_blank"
                            >

                                <div class="image-box">

                                    @php
                                        $projectImage = $project->images[0]->img_src ?? null;
                                    @endphp

                                    @if($projectImage)

                                        <img
                                            data-src="{{ asset('storage/' . $projectImage) }}"
                                            class="img-fluid"
                                            alt="{{ $project->{app()->getLocale() . '_name'} }}"
                                            width="600"
                                            height="450"
                                            decoding="async"
                                            loading="lazy"
                                        >

                                    @endif

                                </div>


                                <div class="col-12 mt-3 text-center">

                                    <h6 class="font-normal">
                                        {{ $project->{app()->getLocale() . '_name'} }}
                                    </h6>

                                </div>

                            </a>

                        </div>

                    @endforeach

                </div>


                <div class="col-12 text-center mt-5 mb-5">

                    <button class="btn-chank p-2">

                        <a
                            class="text-black text-decoration-none"
                            href="{{ route(app()->getLocale() . '.projects') }}"
                        >
                            {{ __('Home::words.see_all_projects') }}
                        </a>

                    </button>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         WHY US
    ========================================================== --}}

    <div class="row">

        <div
            class="container fade-right"
            style="background-color: rgb(255, 255, 255) !important;"
        >

            <div class="col-12 text-center mt-5 mb-5">

                <h4>
                    {{ $data['setting']->{app()->getLocale() . '_website_name'} }}
                </h4>

                <h1>

                    {{ __('Home::words.why') }}

                    {{ $data['setting']->{app()->getLocale() . '_website_name'} }}

                </h1>

            </div>


            <div
                class="col-12 d-flex align-items-center justify-content-center"
                style="height: 150px;"
            >

                <div class="col-xl-5 col-sm-12">

                    <div class="slider-wrapper">

                        <div class="splide">

                            <div class="splide__track">

                                <ul class="splide__list">


                                    {{-- =====================================================
                                         SLIDER 1
                                    ====================================================== --}}

                                    <span class="splide__slide">

                                        <img
                                            data-src="{{ asset('assets/images/slider/slider-pk-1.svg') }}"
                                            width="100"
                                            height="100"
                                            alt=""
                                            decoding="async"
                                            loading="lazy"
                                        >

                                    </span>


                                    {{-- =====================================================
                                         SLIDER 2
                                    ====================================================== --}}

                                    <span class="splide__slide">

                                        <img
                                            data-src="{{ asset('assets/images/slider/slider-pk-2.svg') }}"
                                            width="100"
                                            height="100"
                                            alt=""
                                            decoding="async"
                                            loading="lazy"
                                        >

                                    </span>


                                    {{-- =====================================================
                                         SLIDER 3
                                    ====================================================== --}}

                                    <span class="splide__slide">

                                        <img
                                            data-src="{{ asset('assets/images/slider/slider-pk-3.svg') }}"
                                            width="100"
                                            height="100"
                                            alt=""
                                            decoding="async"
                                            loading="lazy"
                                        >

                                    </span>


                                    {{-- =====================================================
                                         SLIDER 4
                                    ====================================================== --}}

                                    <span class="splide__slide">

                                        <img
                                            data-src="{{ asset('assets/images/slider/slider-pk-1.svg') }}"
                                            width="100"
                                            height="100"
                                            alt=""
                                            decoding="async"
                                            loading="lazy"
                                        >

                                    </span>


                                    {{-- =====================================================
                                         SLIDER 5
                                    ====================================================== --}}

                                    <span class="splide__slide">

                                        <img
                                            data-src="{{ asset('assets/images/slider/slider-pk-2.svg') }}"
                                            width="100"
                                            height="100"
                                            alt=""
                                            decoding="async"
                                            loading="lazy"
                                        >

                                    </span>


                                    {{-- =====================================================
                                         SLIDER 6
                                    ====================================================== --}}

                                    <span class="splide__slide">

                                        <img
                                            data-src="{{ asset('assets/images/slider/slider-pk-3.svg') }}"
                                            width="100"
                                            height="100"
                                            alt=""
                                            decoding="async"
                                            loading="lazy"
                                        >

                                    </span>


                                    {{-- =====================================================
                                         SLIDER 7
                                    ====================================================== --}}

                                    <span class="splide__slide">

                                        <img
                                            data-src="{{ asset('assets/images/slider/slider-pk-1.svg') }}"
                                            width="100"
                                            height="100"
                                            alt=""
                                            decoding="async"
                                            loading="lazy"
                                        >

                                    </span>


                                    {{-- =====================================================
                                         SLIDER 8
                                    ====================================================== --}}

                                    <span class="splide__slide">

                                        <img
                                            data-src="{{ asset('assets/images/slider/slider-pk-2.svg') }}"
                                            width="100"
                                            height="100"
                                            alt=""
                                            decoding="async"
                                            loading="lazy"
                                        >

                                    </span>


                                    {{-- =====================================================
                                         SLIDER 9
                                    ====================================================== --}}

                                    <span class="splide__slide">

                                        <img
                                            data-src="{{ asset('assets/images/slider/slider-pk-3.svg') }}"
                                            width="100"
                                            height="100"
                                            alt=""
                                            decoding="async"
                                            loading="lazy"
                                        >

                                    </span>


                                    {{-- =====================================================
                                         SLIDER 10
                                    ====================================================== --}}

                                    <span class="splide__slide">

                                        <img
                                            data-src="{{ asset('assets/images/slider/slider-pk-1.svg') }}"
                                            width="100"
                                            height="100"
                                            alt=""
                                            decoding="async"
                                            loading="lazy"
                                        >

                                    </span>


                                    {{-- =====================================================
                                         SLIDER 11
                                    ====================================================== --}}

                                    <span class="splide__slide">

                                        <img
                                            data-src="{{ asset('assets/images/slider/slider-pk-2.svg') }}"
                                            width="100"
                                            height="100"
                                            alt=""
                                            decoding="async"
                                            loading="lazy"
                                        >

                                    </span>


                                    {{-- =====================================================
                                         SLIDER 12
                                    ====================================================== --}}

                                    <span class="splide__slide">

                                        <img
                                            data-src="{{ asset('assets/images/slider/slider-pk-3.svg') }}"
                                            width="100"
                                            height="100"
                                            alt=""
                                            decoding="async"
                                            loading="lazy"
                                        >

                                    </span>


                                    {{-- =====================================================
                                         SLIDER 13
                                    ====================================================== --}}

                                    <span class="splide__slide">

                                        <img
                                            data-src="{{ asset('assets/images/slider/slider-pk-1.svg') }}"
                                            width="100"
                                            height="100"
                                            alt=""
                                            decoding="async"
                                            loading="lazy"
                                        >

                                    </span>


                                    {{-- =====================================================
                                         SLIDER 14
                                    ====================================================== --}}

                                    <span class="splide__slide">

                                        <img
                                            data-src="{{ asset('assets/images/slider/slider-pk-2.svg') }}"
                                            width="100"
                                            height="100"
                                            alt=""
                                            decoding="async"
                                            loading="lazy"
                                        >

                                    </span>


                                    {{-- =====================================================
                                         SLIDER 15
                                    ====================================================== --}}

                                    <span class="splide__slide">

                                        <img
                                            data-src="{{ asset('assets/images/slider/slider-pk-3.svg') }}"
                                            width="100"
                                            height="100"
                                            alt=""
                                            decoding="async"
                                            loading="lazy"
                                        >

                                    </span>


                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         CONTACT
    ========================================================== --}}

    <div class="row">

        <div class="container fade-right">

            <div
                class="col-12 contact-section"
                id=""
                style="background-color: rgb(255, 255, 255) !important;"
            >

                <div class="contact-card">

                    <h3>
                        {{ __('Home::words.call_me_description') }}
                    </h3>


                    <button class="contact-btn">

                        <a
                            href="{{ route(app()->getLocale() . '.contact-us') }}"
                            target="_blank"
                            class="text-decoration-none text-black"
                        >
                            {{ __('Home::words.contact_us') }}
                        </a>

                    </button>

                </div>

            </div>

        </div>

    </div>

@endsection


@section('scripts')

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            /*
             * =====================================================
             * IMAGE LOADER
             * =====================================================
             *
             * هیچ تصویری که data-src دارد قبل از load صفحه
             * درخواست نمی‌شود.
             *
             */

            function loadImages() {

                const images =
                    document.querySelectorAll('img[data-src]');


                images.forEach(function (img, index) {

                    const src =
                        img.getAttribute('data-src');


                    if (!src) {
                        return;
                    }


                    /*
                     * تصاویر یکی‌یکی لود می‌شوند
                     * تا یک‌دفعه چندین فایل سنگین دانلود نشوند.
                     */

                    setTimeout(function () {

                        img.src = src;


                        img.onload = function () {

                            img.classList.add('image-loaded');

                        };


                        img.removeAttribute('data-src');

                    }, index * 120);

                });

            }


            /*
             * =====================================================
             * WAIT FOR FULL PAGE LOAD
             * =====================================================
             */

            if (document.readyState === 'complete') {

                setTimeout(loadImages, 100);

            } else {

                window.addEventListener(
                    'load',
                    function () {

                        setTimeout(
                            loadImages,
                            150
                        );

                    },
                    {
                        once: true
                    }
                );

            }

        });

    </script>

@endsection
