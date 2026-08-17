@extends('project::components.layouts.master')

@section('title', __('Project::words.projects'))

@section('styles')

    <link rel="stylesheet" href="{{ asset('assets/css/gallery.css') }}">

    <style>

        /* =========================================================
           PROJECT DETAILS
        ========================================================== */

        .project-details-page {
            --primary: #111827;
            --secondary: #667085;
            --muted: #98a2b3;
            --surface: #ffffff;
            --soft: #f8f9fb;
            --border: rgba(16, 24, 40, .08);

            position: relative;

            padding: 70px 0 110px;

            background:
                radial-gradient(
                    circle at 5% 0%,
                    rgba(17, 24, 39, .045),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 95% 15%,
                    rgba(17, 24, 39, .035),
                    transparent 30%
                );
        }


        /* =========================================================
           Container
        ========================================================== */

        .project-details-container {
            width: min(1180px, 92%);

            margin: 0 auto;
        }


        /* =========================================================
           Header
        ========================================================== */

        .project-details-header {
            text-align: center;

            max-width: 800px;

            margin: 0 auto 45px;
        }

        .project-details-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 8px 14px;

            margin-bottom: 18px;

            border: 1px solid var(--border);
            border-radius: 999px;

            background: rgba(255,255,255,.78);

            color: var(--secondary);

            font-size: 11px;
            font-weight: 800;

            letter-spacing: .1em;

            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .project-details-badge::before {
            content: "";

            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: var(--primary);

            box-shadow:
                0 0 0 5px rgba(17,24,39,.07);
        }

        .project-details-title {
            margin: 0;

            color: var(--primary);

            font-size: clamp(32px, 4vw, 52px);

            font-weight: 900;

            line-height: 1.2;

            letter-spacing: -.04em;
        }

        .project-details-subtitle {
            margin: 15px auto 0;

            color: var(--secondary);

            font-size: 14px;

            line-height: 1.9;
        }


        /* =========================================================
           Gallery
        ========================================================== */

        .project-gallery {
            width: 100%;

            margin-bottom: 60px;
        }


        /* =========================================================
           Main Slider
        ========================================================== */

        .project-gallery-main {
            position: relative;

            width: 100%;

            height: min(650px, 62vw);

            min-height: 420px;

            overflow: hidden;

            border-radius: 28px;

            background: #eef0f3;

            box-shadow:
                0 12px 30px rgba(16,24,40,.06),
                0 30px 80px rgba(16,24,40,.09);
        }

        .project-slide {
            position: absolute;

            inset: 0;

            width: 100%;
            height: 100%;

            opacity: 0;

            visibility: hidden;

            transition:
                opacity .6s ease,
                visibility .6s ease;
        }

        .project-slide.active {
            opacity: 1;

            visibility: visible;

            z-index: 1;
        }

        .project-slide-image {
            width: 100%;
            height: 100%;

            display: block;

            object-fit: cover;

            transform: scale(1.02);

            transition:
                transform 1.2s cubic-bezier(.2,.8,.2,1);
        }

        .project-slide.active .project-slide-image {
            transform: scale(1);
        }


        /* =========================================================
           Gallery Overlay
        ========================================================== */

        .project-gallery-main::after {
            content: "";

            position: absolute;

            inset: 0;

            z-index: 2;

            pointer-events: none;

            background:
                linear-gradient(
                    to bottom,
                    rgba(0,0,0,.22),
                    transparent 25%,
                    transparent 65%,
                    rgba(0,0,0,.3)
                );
        }


        /* =========================================================
           Counter
        ========================================================== */

        .project-gallery-counter {
            position: absolute;

            top: 20px;
            right: 20px;

            z-index: 5;

            padding: 9px 13px;

            border: 1px solid rgba(255,255,255,.2);

            border-radius: 999px;

            background: rgba(0,0,0,.32);

            color: #fff;

            font-size: 12px;

            font-weight: 700;

            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }


        /* =========================================================
           Navigation Buttons
        ========================================================== */

        .project-gallery-arrow {
            position: absolute;

            top: 50%;

            z-index: 6;

            width: 52px;
            height: 52px;

            display: flex;

            align-items: center;
            justify-content: center;

            border: 1px solid rgba(255,255,255,.2);

            border-radius: 50%;

            background: rgba(0,0,0,.3);

            color: #fff;

            font-size: 22px;

            cursor: pointer;

            transform: translateY(-50%);

            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);

            transition:
                background .3s ease,
                transform .3s ease;
        }

        .project-gallery-arrow:hover {
            background: rgba(0,0,0,.55);

            transform:
                translateY(-50%)
                scale(1.06);
        }

        .project-gallery-prev {
            left: 22px;
        }

        .project-gallery-next {
            right: 22px;
        }


        /* =========================================================
           Thumbnails
        ========================================================== */

        .project-gallery-thumbnails {
            display: flex;

            align-items: center;

            gap: 12px;

            margin-top: 16px;

            padding: 4px 2px 8px;

            overflow-x: auto;

            scrollbar-width: thin;
        }

        .project-gallery-thumbnails::-webkit-scrollbar {
            height: 5px;
        }

        .project-gallery-thumbnails::-webkit-scrollbar-track {
            background: transparent;
        }

        .project-gallery-thumbnails::-webkit-scrollbar-thumb {
            background: #d0d5dd;

            border-radius: 20px;
        }

        .project-thumbnail {
            position: relative;

            width: 96px;
            height: 72px;

            flex: 0 0 96px;

            padding: 0;

            overflow: hidden;

            border: 2px solid transparent;

            border-radius: 14px;

            background: #eef0f3;

            cursor: pointer;

            opacity: .68;

            transform: translateY(0);

            transition:
                opacity .3s ease,
                border-color .3s ease,
                transform .3s ease,
                box-shadow .3s ease;
        }

        .project-thumbnail img {
            width: 100%;
            height: 100%;

            display: block;

            object-fit: cover;

            transition: transform .4s ease;
        }

        .project-thumbnail:hover {
            opacity: 1;

            transform: translateY(-3px);
        }

        .project-thumbnail:hover img {
            transform: scale(1.06);
        }

        .project-thumbnail.active {
            opacity: 1;

            border-color: var(--primary);

            box-shadow:
                0 5px 15px rgba(16,24,40,.12);
        }


        /* =========================================================
           Information Layout
        ========================================================== */

        .project-information {
            display: grid;

            grid-template-columns:
                minmax(0, 1.5fr)
                minmax(320px, .85fr);

            gap: 28px;

            align-items: start;
        }


        /* =========================================================
           Information Cards
        ========================================================== */

        .project-description-box,
        .project-properties {
            padding: 32px;

            background: rgba(255,255,255,.9);

            border: 1px solid var(--border);

            border-radius: 24px;

            box-shadow:
                0 8px 30px rgba(16,24,40,.04);

            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }


        /* =========================================================
           Section Title
        ========================================================== */

        .project-section-title {
            position: relative;

            display: flex;

            align-items: center;

            gap: 12px;

            margin: 0 0 25px;

            padding-bottom: 18px;

            color: var(--primary);

            font-size: 21px;

            font-weight: 800;

            line-height: 1.5;
        }

        .project-section-title::before {
            content: "";

            width: 5px;
            height: 25px;

            flex-shrink: 0;

            border-radius: 20px;

            background: var(--primary);
        }

        .project-section-title::after {
            content: "";

            position: absolute;

            right: 0;
            left: 0;

            bottom: 0;

            height: 1px;

            background: var(--border);
        }


        /* =========================================================
           Description
        ========================================================== */

        .project-description {
            color: #667085;

            font-size: 15px;

            line-height: 2.15;
        }

        .project-description p {
            margin-top: 0;
        }

        .project-description p:last-child {
            margin-bottom: 0;
        }

        .project-description img {
            max-width: 100%;

            height: auto;

            border-radius: 16px;
        }

        .project-description strong {
            color: var(--primary);
        }


        /* =========================================================
           Properties
        ========================================================== */

        .project-properties-list {
            display: flex;

            flex-direction: column;

            overflow: hidden;

            border: 1px solid var(--border);

            border-radius: 16px;
        }

        .project-property {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 25px;

            min-height: 62px;

            padding: 14px 17px;

            background: #fff;

            transition:
                background .25s ease;
        }

        .project-property + .project-property {
            border-top: 1px solid var(--border);
        }

        .project-property:hover {
            background: #f8f9fb;
        }

        .project-property-label {
            color: #667085;

            font-size: 13px;

            font-weight: 600;

            line-height: 1.6;
        }

        .project-property-value {
            max-width: 55%;

            color: var(--primary);

            font-size: 13px;

            font-weight: 700;

            line-height: 1.6;

            text-align: left;
        }


        /* =========================================================
           Back Button
        ========================================================== */

        .project-back {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            margin-bottom: 25px;

            padding: 9px 14px;

            border: 1px solid var(--border);

            border-radius: 999px;

            background: rgba(255,255,255,.75);

            color: var(--secondary);

            font-size: 12px;

            font-weight: 700;

            text-decoration: none;

            transition:
                color .3s ease,
                background .3s ease,
                transform .3s ease;
        }

        .project-back:hover {
            color: var(--primary);

            background: #fff;

            transform: translateX(-3px);
        }


        /* =========================================================
           Responsive
        ========================================================== */

        @media (max-width: 1100px) {

            .project-information {
                grid-template-columns: 1fr;
            }

            .project-gallery-main {
                height: 58vw;

                min-height: 450px;
            }
        }


        @media (max-width: 768px) {

            .project-details-page {
                padding: 50px 0 75px;
            }

            .project-details-container {
                width: 94%;
            }

            .project-details-header {
                margin-bottom: 32px;
            }

            .project-details-title {
                font-size: 34px;
            }

            .project-gallery-main {
                height: 65vw;

                min-height: 320px;

                border-radius: 20px;
            }

            .project-gallery-arrow {
                width: 44px;
                height: 44px;

                font-size: 18px;
            }

            .project-gallery-prev {
                left: 12px;
            }

            .project-gallery-next {
                right: 12px;
            }

            .project-thumbnail {
                width: 82px;
                height: 64px;

                flex-basis: 82px;

                border-radius: 11px;
            }

            .project-description-box,
            .project-properties {
                padding: 24px;

                border-radius: 20px;
            }
        }


        @media (max-width: 576px) {

            .project-details-page {
                padding: 40px 0 60px;
            }

            .project-details-title {
                font-size: 29px;

                letter-spacing: -.025em;
            }

            .project-details-subtitle {
                font-size: 13px;
            }

            .project-gallery {
                margin-bottom: 35px;
            }

            .project-gallery-main {
                height: 70vw;

                min-height: 260px;

                border-radius: 17px;
            }

            .project-gallery-counter {
                top: 12px;
                right: 12px;

                padding: 7px 10px;

                font-size: 10px;
            }

            .project-gallery-arrow {
                width: 40px;
                height: 40px;

                font-size: 16px;
            }

            .project-gallery-prev {
                left: 10px;
            }

            .project-gallery-next {
                right: 10px;
            }

            .project-description-box,
            .project-properties {
                padding: 20px;

                border-radius: 18px;
            }

            .project-section-title {
                font-size: 18px;
            }

            .project-description {
                font-size: 14px;

                line-height: 2;
            }

            .project-property {
                align-items: flex-start;

                flex-direction: column;

                gap: 5px;

                padding: 15px;
            }

            .project-property-value {
                max-width: 100%;

                text-align: right;
            }
        }


        /* =========================================================
           Reduced Motion
        ========================================================== */

        @media (prefers-reduced-motion: reduce) {

            .project-slide,
            .project-slide-image,
            .project-thumbnail,
            .project-thumbnail img,
            .project-gallery-arrow,
            .project-property {
                transition: none !important;
            }
        }

    </style>

@endsection


@section('content')

    <main class="project-details-page">

        <div class="project-details-container">

            {{-- =====================================================
                 Back
            ====================================================== --}}

            {{-- =====================================================
                 Header
            ====================================================== --}}

            <header class="project-details-header">

                <div class="project-details-badge mt-5">
                    {{ __('Project::words.projects') }}
                </div>

                <h1 class="project-details-title">
                    {{ $project->{app()->getLocale() . '_name'} }}
                </h1>

            </header>


            {{-- =====================================================
                 Gallery
            ====================================================== --}}

            @if($project->images && $project->images->count())

                <section class="project-gallery">

                    <div
                        class="project-gallery-main"
                        id="projectGallery"
                    >

                        @foreach($project->images as $index => $image)

                            <div
                                class="project-slide {{ $index === 0 ? 'active' : '' }}"
                                data-slide="{{ $index }}"
                            >

                                <img
                                    src="{{ asset('storage/' . $image->img_src) }}"
                                    alt="{{ $project->{app()->getLocale() . '_name'} }}"
                                    class="project-slide-image"
                                    loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                                >

                            </div>

                        @endforeach


                        {{-- Counter --}}

                        <div class="project-gallery-counter">

                            <span id="currentSlide">
                                1
                            </span>

                            <span>/</span>

                            <span>
                                {{ $project->images->count() }}
                            </span>

                        </div>


                        {{-- Previous --}}

                        @if($project->images->count() > 1)

                            <button
                                type="button"
                                class="project-gallery-arrow project-gallery-prev"
                                id="projectGalleryPrev"
                                aria-label="Previous image"
                            >
                                ‹
                            </button>


                            {{-- Next --}}

                            <button
                                type="button"
                                class="project-gallery-arrow project-gallery-next"
                                id="projectGalleryNext"
                                aria-label="Next image"
                            >
                                ›
                            </button>

                        @endif

                    </div>


                    {{-- =================================================
                         Thumbnails
                    ================================================== --}}

                    @if($project->images->count() > 1)

                        <div
                            class="project-gallery-thumbnails"
                            id="projectGalleryThumbnails"
                        >

                            @foreach($project->images as $index => $image)

                                <button
                                    type="button"
                                    class="project-thumbnail {{ $index === 0 ? 'active' : '' }}"
                                    data-slide="{{ $index }}"
                                    aria-label="Show image {{ $index + 1 }}"
                                >

                                    <img
                                        src="{{ asset('storage/' . $image->img_src) }}"
                                        alt=""
                                        loading="lazy"
                                    >

                                </button>

                            @endforeach

                        </div>

                    @endif

                </section>

            @endif


            {{-- =====================================================
                 Information
            ====================================================== --}}

            <section class="project-information">


                {{-- =================================================
                     Description
                ================================================== --}}

                <article class="project-description-box">

                    <h2 class="project-section-title">
                       {{ __('Project::words.description') }}
                    </h2>

                    <div class="project-description">

                        {!! $project->{app()->getLocale() . '_slug'} !!}

                    </div>

                </article>


                {{-- =================================================
                     Properties
                ================================================== --}}

                @if($project->properties && $project->properties->count())

                    <aside class="project-properties">

                        <h2 class="project-section-title">
                            {{ __('Project::words.project_details') }}
                        </h2>

                        <div class="project-properties-list">

                            @foreach($project->properties as $property)

                                @php
                                    $projectProperty =
                                        $property->projectProperty($project->id)->first();
                                @endphp

                                @if($projectProperty)

                                    <div class="project-property">

                                        <div class="project-property-label">

                                            {{ $property->{app()->getLocale() . '_name'} }}

                                        </div>

                                        <div class="project-property-value">

                                            {{ $projectProperty->{app()->getLocale() . '_value'} }}

                                        </div>

                                    </div>

                                @endif

                            @endforeach

                        </div>

                    </aside>

                @endif

            </section>

        </div>

    </main>

@endsection


@section('scripts')

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const slides =
                document.querySelectorAll('.project-slide');

            const thumbnails =
                document.querySelectorAll('.project-thumbnail');

            const prevButton =
                document.getElementById('projectGalleryPrev');

            const nextButton =
                document.getElementById('projectGalleryNext');

            const currentSlide =
                document.getElementById('currentSlide');

            const thumbnailsContainer =
                document.getElementById('projectGalleryThumbnails');

            if (!slides.length) {
                return;
            }


            let currentIndex = 0;


            /* =====================================================
               Show Slide
            ====================================================== */

            function showSlide(index) {

                if (index < 0) {
                    index = slides.length - 1;
                }

                if (index >= slides.length) {
                    index = 0;
                }

                currentIndex = index;


                /* Slides */

                slides.forEach(function (slide, i) {

                    slide.classList.toggle(
                        'active',
                        i === currentIndex
                    );

                });


                /* Thumbnails */

                thumbnails.forEach(function (thumbnail, i) {

                    thumbnail.classList.toggle(
                        'active',
                        i === currentIndex
                    );

                });


                /* Counter */

                if (currentSlide) {

                    currentSlide.textContent =
                        currentIndex + 1;

                }


                /* Scroll thumbnail into view */

                if (thumbnails[currentIndex]) {

                    thumbnails[currentIndex].scrollIntoView({
                        behavior: 'smooth',
                        block: 'nearest',
                        inline: 'center'
                    });

                }

            }


            /* =====================================================
               Thumbnail Click
            ====================================================== */

            thumbnails.forEach(function (thumbnail) {

                thumbnail.addEventListener(
                    'click',
                    function () {

                        const index =
                            parseInt(
                                this.dataset.slide,
                                10
                            );

                        showSlide(index);

                    }
                );

            });


            /* =====================================================
               Previous
            ====================================================== */

            if (prevButton) {

                prevButton.addEventListener(
                    'click',
                    function () {

                        showSlide(currentIndex - 1);

                    }
                );

            }


            /* =====================================================
               Next
            ====================================================== */

            if (nextButton) {

                nextButton.addEventListener(
                    'click',
                    function () {

                        showSlide(currentIndex + 1);

                    }
                );

            }


            /* =====================================================
               Keyboard
            ====================================================== */

            document.addEventListener(
                'keydown',
                function (event) {

                    if (event.key === 'ArrowLeft') {

                        showSlide(currentIndex - 1);

                    }

                    if (event.key === 'ArrowRight') {

                        showSlide(currentIndex + 1);

                    }

                }
            );


            /* =====================================================
               Touch Swipe
            ====================================================== */

            const gallery =
                document.getElementById('projectGallery');

            let touchStartX = 0;

            let touchEndX = 0;


            if (gallery) {

                gallery.addEventListener(
                    'touchstart',
                    function (event) {

                        touchStartX =
                            event.changedTouches[0].screenX;

                    },
                    { passive: true }
                );


                gallery.addEventListener(
                    'touchend',
                    function (event) {

                        touchEndX =
                            event.changedTouches[0].screenX;

                        const difference =
                            touchStartX - touchEndX;

                        if (Math.abs(difference) < 50) {
                            return;
                        }

                        if (difference > 0) {

                            showSlide(currentIndex + 1);

                        } else {

                            showSlide(currentIndex - 1);

                        }

                    },
                    { passive: true }
                );

            }


            /* =====================================================
               Initialize
            ====================================================== */

            showSlide(0);

        });

    </script>

@endsection
