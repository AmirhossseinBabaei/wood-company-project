@extends('services::components.layouts.master')

@section('title', __('Services::words.services'))

@section('styles')

    <link rel="stylesheet" href="{{ asset('assets/css/gallery.css') }}">

    <style>

        /* =========================================================
           SERVICES PAGE
        ========================================================== */

        .services-page {
            --primary: #111827;
            --secondary: #667085;
            --muted: #98a2b3;
            --border: rgba(16, 24, 40, .08);
            --surface: #ffffff;
            --soft: #f8f9fb;

            position: relative;

            padding: 70px 0 110px;

            background:
                radial-gradient(
                    circle at 0% 0%,
                    rgba(17, 24, 39, .045),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 100% 20%,
                    rgba(17, 24, 39, .035),
                    transparent 28%
                );
        }


        /* =========================================================
           Header
        ========================================================== */

        .services-header {
            max-width: 750px;

            margin: 0 auto 55px;

            padding: 0 20px;

            text-align: center;
        }

        .services-header-badge {
            display: inline-flex;

            align-items: center;

            gap: 9px;

            margin-bottom: 18px;

            padding: 8px 15px;

            border: 1px solid var(--border);

            border-radius: 999px;

            background: rgba(255,255,255,.78);

            color: var(--secondary);

            font-size: 11px;

            font-weight: 800;

            letter-spacing: .1em;

            text-transform: uppercase;

            box-shadow:
                0 8px 25px rgba(16,24,40,.04);

            backdrop-filter: blur(12px);

            -webkit-backdrop-filter: blur(12px);
        }

        .services-header-badge::before {
            content: "";

            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: var(--primary);

            box-shadow:
                0 0 0 5px rgba(17,24,39,.07);
        }

        .services-header h2 {
            margin: 0;

            color: var(--primary);

            font-size: clamp(34px, 4vw, 52px);

            font-weight: 900;

            line-height: 1.15;

            letter-spacing: -.04em;
        }

        .services-header p {
            max-width: 620px;

            margin: 18px auto 0;

            color: var(--secondary);

            font-size: 15px;

            font-weight: 400;

            line-height: 2;
        }


        /* =========================================================
           Container
        ========================================================== */

        .services-container {
            width: min(1050px, 92%);

            margin: 0 auto;
        }


        /* =========================================================
           Services List
        ========================================================== */

        .services-wrapper {
            display: flex;

            flex-direction: column;

            gap: 24px;
        }


        /* =========================================================
           Service Card
        ========================================================== */

        .service-card {
            position: relative;

            display: flex;

            align-items: stretch;

            min-height: 245px;

            overflow: hidden;

            background: var(--surface);

            border: 1px solid var(--border);

            border-radius: 26px;

            box-shadow:
                0 7px 20px rgba(16,24,40,.035),
                0 18px 45px rgba(16,24,40,.055);

            transform: translateY(0);

            transition:
                transform .45s cubic-bezier(.2,.8,.2,1),
                box-shadow .45s cubic-bezier(.2,.8,.2,1),
                border-color .35s ease;
        }

        .service-card:hover {
            transform: translateY(-7px);

            border-color: rgba(16,24,40,.14);

            box-shadow:
                0 14px 30px rgba(16,24,40,.06),
                0 30px 70px rgba(16,24,40,.10);
        }


        /* =========================================================
           Number
        ========================================================== */

        .service-number {
            position: absolute;

            top: 20px;

            left: 20px;

            z-index: 5;

            display: flex;

            align-items: center;

            justify-content: center;

            width: 38px;
            height: 38px;

            border-radius: 50%;

            background: rgba(0,0,0,.32);

            border: 1px solid rgba(255,255,255,.2);

            color: #fff;

            font-size: 11px;

            font-weight: 800;

            backdrop-filter: blur(10px);

            -webkit-backdrop-filter: blur(10px);
        }


        /* =========================================================
           Image
        ========================================================== */

        .service-image-box {
            position: relative;

            width: 39%;

            min-height: 245px;

            flex-shrink: 0;

            overflow: hidden;

            background: #eef0f3;
        }

        .service-image {
            width: 100%;
            height: 100%;

            display: block;

            object-fit: cover;

            transform: scale(1);

            transition:
                transform .8s cubic-bezier(.2,.8,.2,1),
                filter .5s ease;
        }

        .service-card:hover .service-image {
            transform: scale(1.08);

            filter: saturate(1.08);
        }


        /* =========================================================
           Image Overlay
        ========================================================== */

        .service-image-overlay {
            position: absolute;

            inset: 0;

            background:
                linear-gradient(
                    to right,
                    transparent 40%,
                    rgba(0,0,0,.08)
                );

            pointer-events: none;

            transition: opacity .4s ease;
        }

        .service-card:hover .service-image-overlay {
            opacity: .6;
        }


        /* =========================================================
           Image Button
        ========================================================== */

        .service-image-button {
            position: absolute;

            left: 50%;
            top: 50%;

            z-index: 5;

            width: 54px;
            height: 54px;

            display: flex;

            align-items: center;
            justify-content: center;

            border: 1px solid rgba(255,255,255,.25);

            border-radius: 50%;

            background: rgba(255,255,255,.94);

            color: var(--primary);

            font-size: 20px;

            cursor: pointer;

            opacity: 0;

            transform:
                translate(-50%, -40%)
                scale(.7);

            box-shadow:
                0 15px 40px rgba(0,0,0,.18);

            transition:
                opacity .3s ease,
                transform .45s cubic-bezier(.2,.8,.2,1);
        }

        .service-card:hover .service-image-button {
            opacity: 1;

            transform:
                translate(-50%, -50%)
                scale(1);
        }


        /* =========================================================
           Content
        ========================================================== */

        .service-content {
            width: 61%;

            display: flex;

            flex-direction: column;

            justify-content: center;

            padding: 38px 42px;
        }


        /* =========================================================
           Small Label
        ========================================================== */

        .service-label {
            display: flex;

            align-items: center;

            gap: 8px;

            margin-bottom: 14px;

            color: var(--muted);

            font-size: 10px;

            font-weight: 800;

            letter-spacing: .12em;

            text-transform: uppercase;
        }

        .service-label::before {
            content: "";

            width: 22px;
            height: 2px;

            border-radius: 10px;

            background: var(--primary);
        }


        /* =========================================================
           Title
        ========================================================== */

        .service-title {
            margin: 0 0 13px;

            color: var(--primary);

            font-size: 25px;

            font-weight: 850;

            line-height: 1.4;

            letter-spacing: -.025em;
        }


        /* =========================================================
           Description
        ========================================================== */

        .service-description {
            max-width: 570px;

            margin: 0;

            color: var(--secondary);

            font-size: 14px;

            line-height: 2;
        }


        /* =========================================================
           Footer
        ========================================================== */

        .service-footer {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-top: 25px;

            padding-top: 18px;

            border-top: 1px solid var(--border);
        }

        .service-footer-text {
            color: var(--muted);

            font-size: 11px;

            font-weight: 600;
        }

        .service-view {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            color: var(--primary);

            font-size: 12px;

            font-weight: 800;

            transition: gap .3s ease;
        }

        .service-view-arrow {
            transition:
                transform .3s ease;
        }

        .service-card:hover .service-view {
            gap: 13px;
        }

        .service-card:hover .service-view-arrow {
            transform: translateX(4px);
        }


        /* =========================================================
           Empty State
        ========================================================== */

        .services-empty {
            padding: 75px 25px;

            text-align: center;

            background: rgba(255,255,255,.8);

            border: 1px dashed rgba(16,24,40,.12);

            border-radius: 24px;
        }

        .services-empty-icon {
            width: 65px;
            height: 65px;

            margin: 0 auto 18px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 20px;

            background: #f1f2f4;

            color: #667085;

            font-size: 25px;
        }

        .services-empty h3 {
            margin: 0 0 8px;

            color: var(--primary);

            font-size: 20px;

            font-weight: 800;
        }

        .services-empty p {
            margin: 0;

            color: var(--secondary);

            font-size: 14px;
        }


        /* =========================================================
           IMAGE MODAL
        ========================================================== */

        .service-modal {
            position: fixed;

            inset: 0;

            z-index: 99999;

            display: flex;

            align-items: center;
            justify-content: center;

            padding: 30px;

            background: rgba(10,14,22,.82);

            opacity: 0;

            visibility: hidden;

            transition:
                opacity .35s ease,
                visibility .35s ease;

            backdrop-filter: blur(10px);

            -webkit-backdrop-filter: blur(10px);
        }

        .service-modal.active {
            opacity: 1;

            visibility: visible;
        }

        .service-modal-content {
            position: relative;

            max-width: 1100px;
            max-height: 90vh;

            transform: scale(.92);

            transition:
                transform .4s cubic-bezier(.2,.8,.2,1);
        }

        .service-modal.active .service-modal-content {
            transform: scale(1);
        }

        .service-modal-image {
            display: block;

            max-width: min(1100px, 90vw);

            max-height: 82vh;

            object-fit: contain;

            border-radius: 18px;

            box-shadow:
                0 30px 100px rgba(0,0,0,.4);
        }

        .service-modal-close {
            position: absolute;

            top: -18px;
            right: -18px;

            z-index: 5;

            width: 44px;
            height: 44px;

            display: flex;

            align-items: center;
            justify-content: center;

            border: 1px solid rgba(255,255,255,.2);

            border-radius: 50%;

            background: rgba(0,0,0,.55);

            color: #fff;

            font-size: 25px;

            line-height: 1;

            cursor: pointer;

            transition:
                background .25s ease,
                transform .25s ease;
        }

        .service-modal-close:hover {
            background: rgba(0,0,0,.8);

            transform: rotate(90deg);
        }

        .service-modal-caption {
            margin-top: 13px;

            color: rgba(255,255,255,.8);

            font-size: 13px;

            text-align: center;
        }


        /* =========================================================
           Tablet
        ========================================================== */

        @media (max-width: 992px) {

            .services-page {
                padding: 55px 0 85px;
            }

            .services-container {
                width: 88%;
            }

            .service-image-box {
                width: 42%;
            }

            .service-content {
                width: 58%;

                padding: 30px;
            }

            .service-title {
                font-size: 22px;
            }
        }


        /* =========================================================
           Mobile
        ========================================================== */

        @media (max-width: 700px) {

            .services-page {
                padding: 45px 0 70px;
            }

            .services-header {
                margin-bottom: 38px;
            }

            .services-header h2 {
                font-size: 34px;
            }

            .services-header p {
                font-size: 14px;
            }

            .services-container {
                width: 94%;
            }

            .services-wrapper {
                gap: 18px;
            }

            .service-card {
                flex-direction: column;

                min-height: auto;

                border-radius: 20px;
            }

            .service-image-box {
                width: 100%;

                height: 240px;

                min-height: 240px;
            }

            .service-content {
                width: 100%;

                padding: 25px 22px 22px;
            }

            .service-title {
                font-size: 20px;
            }

            .service-description {
                font-size: 13px;
            }

            .service-image-button {
                opacity: 1;

                transform:
                    translate(-50%, -50%)
                    scale(.9);
            }

            .service-number {
                top: 14px;
                left: 14px;
            }
        }


        @media (max-width: 480px) {

            .services-header h2 {
                font-size: 29px;
            }

            .services-header p {
                font-size: 13px;
            }

            .service-image-box {
                height: 215px;

                min-height: 215px;
            }

            .service-content {
                padding: 22px 19px 19px;
            }

            .service-title {
                font-size: 18px;
            }

            .service-description {
                font-size: 13px;

                line-height: 1.9;
            }

            .service-footer {
                margin-top: 20px;
            }

            .service-modal {
                padding: 15px;
            }

            .service-modal-image {
                max-width: 94vw;

                max-height: 80vh;

                border-radius: 12px;
            }

            .service-modal-close {
                top: -12px;
                right: -5px;

                width: 40px;
                height: 40px;
            }
        }


        /* =========================================================
           Reduced Motion
        ========================================================== */

        @media (prefers-reduced-motion: reduce) {

            .service-card,
            .service-image,
            .service-image-button,
            .service-view,
            .service-view-arrow,
            .service-modal,
            .service-modal-content,
            .service-modal-close {
                transition: none !important;
            }
        }

    </style>

@endsection


@section('content')

    <main class="services-page">

        {{-- =====================================================
             Header
        ====================================================== --}}

        <header class="services-header mt-5">

            <div class="services-header-badge mt-5">
                {{ __('Gallery::words.services') }}
            </div>

            <h2>
                {{ __('Gallery::words.services') }}
            </h2>

            <p>
                {{ __('Gallery::words.services_desc') }}
            </p>

        </header>


        {{-- =====================================================
             Services
        ====================================================== --}}

        <div class="services-container">

            @if($services && $services->count())

                <div class="services-wrapper">

                    @foreach($services as $index => $service)

                        @php

                            $locale = app()->getLocale();

                            $serviceTitle =
                                $service->{$locale . '_title'};

                            $serviceDescription =
                                $service->{$locale . '_description'};

                            $serviceImage =
                                $service->image
                                    ? asset('storage/' . $service->image)
                                    : null;

                        @endphp


                        <article
                            class="service-card"
                            data-service-index="{{ $index }}"
                        >

                            {{-- =================================================
                                 Number
                            ================================================== --}}

                            <div class="service-number">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </div>


                            {{-- =================================================
                                 Image
                            ================================================== --}}

                            <div class="service-image-box">

                                @if($serviceImage)

                                    <img
                                        class="service-image"
                                        src="{{ $serviceImage }}"
                                        alt="{{ $serviceTitle }}"
                                        loading="lazy"
                                    >

                                @else

                                    <div style="
                                        width:100%;
                                        height:100%;
                                        display:flex;
                                        align-items:center;
                                        justify-content:center;
                                        background:#eef0f3;
                                        color:#98a2b3;
                                        font-size:13px;
                                    ">
                                        No image
                                    </div>

                                @endif


                                <div class="service-image-overlay"></div>


                                @if($serviceImage)

                                    <button
                                        type="button"
                                        class="service-image-button"
                                        data-image="{{ $serviceImage }}"
                                        data-title="{{ $serviceTitle }}"
                                        aria-label="{{ $serviceTitle }}"
                                    >
                                        ⤢
                                    </button>

                                @endif

                            </div>


                            {{-- =================================================
                                 Content
                            ================================================== --}}

                            <div class="service-content">

                                <div class="service-label">
                                    {{ __('Gallery::words.services') }}
                                </div>


                                <h3 class="service-title">
                                    {{ $serviceTitle }}
                                </h3>


                                <p class="service-description">
                                    {{ $serviceDescription }}
                                </p>


                                <div class="service-footer">

                                    <span class="service-footer-text">
                                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                        /
                                        {{ str_pad($services->count(), 2, '0', STR_PAD_LEFT) }}
                                    </span>

                                    @if($serviceImage)

                                        <span class="service-view">

                                            <span>
                                                مشاهده تصویر
                                            </span>

                                            <span class="service-view-arrow">
                                                →
                                            </span>

                                        </span>

                                    @endif

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>

            @else

                {{-- =================================================
                     Empty State
                ================================================== --}}

                <div class="services-empty">

                    <div class="services-empty-icon">
                        ◇
                    </div>

                    <h3>
                        سرویسی وجود ندارد
                    </h3>

                    <p>
                        در حال حاضر سرویسی برای نمایش وجود ندارد.
                    </p>

                </div>

            @endif

        </div>

    </main>
    <div class="col-12 d-flex align-items-center justify-content-center mb-5 mt-5">
        <div class="simple-pagination">

            @if($services->onFirstPage())
                <button class="btn btn-danger text-white">
            <span class="simple-pagination__btn disabled">
             {{ __('messages.previous') }}
        </span>
                </button>
            @else
                <button class="btn btn-danger text-black">

                    <a href="{{ $services->previousPageUrl() }}"
                       class="simple-pagination__btn text-decoration-none text-white">
                        {{ __('messages.previous') }}
                    </a>
                </button>

            @endif


            @if($services->hasMorePages())
                <button class="btn btn-primary text-white">
                    <a href="{{ $services->nextPageUrl() }}"
                       class="simple-pagination__btn text-decoration-none text-white">
                        {{ __('messages.next') }}

                    </a>
                </button>

            @else
                <button class="btn btn-primary text-white">
            <span class="simple-pagination__btn disabled">
                                    {{ __('messages.next') }}
        </span>
                </button>
            @endif

        </div>
    </div>

@endsection


@section('scripts')

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const cards =
                document.querySelectorAll('.service-card');

            const imageButtons =
                document.querySelectorAll('.service-image-button');


            /* =====================================================
               Entrance Animation
            ====================================================== */

            cards.forEach(function (card, index) {

                card.style.opacity = '0';

                card.style.transform = 'translateY(25px)';

                setTimeout(function () {

                    card.style.transition =
                        'opacity .6s ease, transform .6s cubic-bezier(.2,.8,.2,1)';

                    card.style.opacity = '1';

                    card.style.transform =
                        'translateY(0)';

                }, 80 + (index * 90));

            });


            /* =====================================================
               Create Modal
            ====================================================== */

            if (!imageButtons.length) {
                return;
            }


            const modal =
                document.createElement('div');

            modal.className =
                'service-modal';


            modal.innerHTML = `

                <div class="service-modal-content">

                    <button
                        type="button"
                        class="service-modal-close"
                        aria-label="Close"
                    >
                        ×
                    </button>

                    <img
                        class="service-modal-image"
                        src=""
                        alt=""
                    >

                    <div class="service-modal-caption"></div>

                </div>

            `;


            document.body.appendChild(modal);


            const modalImage =
                modal.querySelector('.service-modal-image');

            const modalCaption =
                modal.querySelector('.service-modal-caption');

            const closeButton =
                modal.querySelector('.service-modal-close');


            /* =====================================================
               Open Modal
            ====================================================== */

            function openModal(image, title) {

                modalImage.src = image;

                modalImage.alt = title;

                modalCaption.textContent = title;

                modal.classList.add('active');

                document.body.style.overflow = 'hidden';

            }


            /* =====================================================
               Close Modal
            ====================================================== */

            function closeModal() {

                modal.classList.remove('active');

                document.body.style.overflow = '';

            }


            /* =====================================================
               Image Click
            ====================================================== */

            imageButtons.forEach(function (button) {

                button.addEventListener(
                    'click',
                    function (event) {

                        event.preventDefault();

                        event.stopPropagation();

                        openModal(
                            this.dataset.image,
                            this.dataset.title
                        );

                    }
                );

            });


            /* =====================================================
               Close Button
            ====================================================== */

            closeButton.addEventListener(
                'click',
                function () {

                    closeModal();

                }
            );


            /* =====================================================
               Click Outside
            ====================================================== */

            modal.addEventListener(
                'click',
                function (event) {

                    if (
                        event.target === modal
                    ) {

                        closeModal();

                    }

                }
            );


            /* =====================================================
               Escape
            ====================================================== */

            document.addEventListener(
                'keydown',
                function (event) {

                    if (
                        event.key === 'Escape' &&
                        modal.classList.contains('active')
                    ) {

                        closeModal();

                    }

                }
            );


            /* =====================================================
               Prevent Image Drag
            ====================================================== */

            modalImage.addEventListener(
                'dragstart',
                function (event) {

                    event.preventDefault();

                }
            );

        });

    </script>

@endsection
