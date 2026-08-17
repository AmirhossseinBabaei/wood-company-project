@extends('gallery::components.layouts.master')

@section('title', __('Gallery::words.gallery'))

@section('styles')

    <link rel="stylesheet" href="{{ asset('assets/css/gallery.css') }}">

    <style>

        /* =========================================================
           PREMIUM GALLERY
        ========================================================== */
        .premium-gallery-item {
            width: 500px !important;
            height: 500px !important;

        }

        .premium-gallery {
            --black: #101828;
            --text: #344054;
            --muted: #667085;
            --light: #98a2b3;
            --border: rgba(16, 24, 40, .08);
            --surface: #ffffff;

            position: relative;

            padding: 80px 0 120px;

            background: radial-gradient(
                circle at 8% 0%,
                rgba(16, 24, 40, .045),
                transparent 28%
            ),
            radial-gradient(
                circle at 95% 25%,
                rgba(16, 24, 40, .035),
                transparent 25%
            );
        }


        /* =========================================================
           HEADER
        ========================================================== */

        .premium-gallery-header {
            width: min(1100px, 92%);

            margin: 0 auto 65px;

            display: flex;

            align-items: flex-end;

            justify-content: space-between;

            gap: 50px;
        }

        .premium-gallery-heading {
            max-width: 700px;
        }

        .premium-gallery-kicker {
            display: flex;

            align-items: center;

            gap: 12px;

            margin-bottom: 20px;

            color: var(--muted);

            font-size: 11px;

            font-weight: 800;

            letter-spacing: .16em;

            text-transform: uppercase;
        }

        .premium-gallery-kicker::before {
            content: "";

            width: 35px;
            height: 2px;

            border-radius: 10px;

            background: var(--black);
        }

        .premium-gallery-heading h1 {
            margin: 0;

            color: var(--black);

            font-size: clamp(42px, 5vw, 68px);

            font-weight: 900;

            line-height: 1.04;

            letter-spacing: -.055em;
        }

        .premium-gallery-description {
            max-width: 420px;

            margin: 0 0 5px;

            color: var(--muted);

            font-size: 14px;

            line-height: 2;
        }


        /* =========================================================
           GALLERY CONTAINER
        ========================================================== */

        .premium-gallery-container {
            width: min(1100px, 92%);

            margin: 0 auto;
        }


        /* =========================================================
           GRID
        ========================================================== */

        .premium-gallery-grid {
            display: grid;

            grid-template-columns:
                repeat(12, minmax(0, 1fr));

            grid-auto-rows: 90px;

            gap: 20px;
        }


        /* =========================================================
           GALLERY ITEM
        ========================================================== */

        .premium-gallery-item {
            position: relative;

            min-width: 0;

            overflow: hidden;

            border-radius: 24px;

            background: #e9ebee;

            cursor: pointer;

            box-shadow: 0 7px 22px rgba(16, 24, 40, .04);

            isolation: isolate;

            animation: galleryItemIn .7s cubic-bezier(.2, .8, .2, 1) both;

            transition: transform .45s cubic-bezier(.2, .8, .2, 1),
            box-shadow .45s ease;
        }

        .premium-gallery-item:hover {
            transform: translateY(-5px);

            box-shadow: 0 18px 45px rgba(16, 24, 40, .11);
        }


        /* =========================================================
           ITEM SIZES
        ========================================================== */

        .premium-gallery-item:nth-child(1) {
            grid-column: span 7;
            grid-row: span 5;
        }

        .premium-gallery-item:nth-child(2) {
            grid-column: span 5;
            grid-row: span 3;
        }

        .premium-gallery-item:nth-child(3) {
            grid-column: span 5;
            grid-row: span 2;
        }

        .premium-gallery-item:nth-child(4) {
            grid-column: span 4;
            grid-row: span 4;
        }

        .premium-gallery-item:nth-child(5) {
            grid-column: span 4;
            grid-row: span 4;
        }

        .premium-gallery-item:nth-child(6) {
            grid-column: span 4;
            grid-row: span 4;
        }

        .premium-gallery-item:nth-child(7) {
            grid-column: span 5;
            grid-row: span 4;
        }

        .premium-gallery-item:nth-child(8) {
            grid-column: span 7;
            grid-row: span 4;
        }

        .premium-gallery-item:nth-child(9) {
            grid-column: span 4;
            grid-row: span 4;
        }

        .premium-gallery-item:nth-child(10) {
            grid-column: span 8;
            grid-row: span 4;
        }


        /* =========================================================
           IMAGE
        ========================================================== */

        .premium-gallery-image {
            width: 100%;
            height: 100%;

            display: block;

            object-fit: cover;

            transform: scale(1);

            transition: transform 1s cubic-bezier(.2, .8, .2, 1),
            filter .6s ease;
        }

        .premium-gallery-item:hover
        .premium-gallery-image {
            transform: scale(1.07);

            filter: saturate(1.08);
        }


        /* =========================================================
           GRADIENT
        ========================================================== */

        .premium-gallery-overlay {
            position: absolute;

            inset: 0;

            z-index: 1;

            background: linear-gradient(
                to top,
                rgba(0, 0, 0, .72) 0%,
                rgba(0, 0, 0, .20) 42%,
                transparent 70%
            );

            opacity: .8;

            transition: opacity .4s ease;
        }

        .premium-gallery-item:hover
        .premium-gallery-overlay {
            opacity: 1;
        }


        /* =========================================================
           CONTENT
        ========================================================== */

        .premium-gallery-content {
            position: absolute;

            left: 0;
            right: 0;
            bottom: 0;

            z-index: 3;

            padding: 28px;

            color: #fff;

            transform: translateY(8px);

            transition: transform .4s cubic-bezier(.2, .8, .2, 1);
        }

        .premium-gallery-item:hover
        .premium-gallery-content {
            transform: translateY(0);
        }

        .premium-gallery-number {
            display: block;

            margin-bottom: 9px;

            color: rgba(255, 255, 255, .65);

            font-size: 10px;

            font-weight: 800;

            letter-spacing: .14em;
        }

        .premium-gallery-content h3 {
            margin: 0 0 7px;

            color: #fff;

            font-size: 21px;

            font-weight: 850;

            line-height: 1.35;

            letter-spacing: -.02em;
        }

        .premium-gallery-content p {
            max-width: 500px;

            margin: 0;

            color: rgba(255, 255, 255, .78);

            font-size: 12px;

            line-height: 1.8;

            display: -webkit-box;

            -webkit-line-clamp: 2;

            -webkit-box-orient: vertical;

            overflow: hidden;
        }


        /* =========================================================
           VIEW ICON
        ========================================================== */

        .premium-gallery-view {
            position: absolute;

            top: 20px;
            right: 20px;

            z-index: 4;

            width: 45px;
            height: 45px;

            display: flex;

            align-items: center;
            justify-content: center;

            border: 1px solid rgba(255, 255, 255, .22);

            border-radius: 50%;

            background: rgba(0, 0, 0, .25);

            color: #fff;

            font-size: 18px;

            opacity: 0;

            transform: scale(.75) rotate(-15deg);

            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);

            transition: opacity .3s ease,
            transform .4s cubic-bezier(.2, .8, .2, 1);
        }

        .premium-gallery-item:hover
        .premium-gallery-view {
            opacity: 1;

            transform: scale(1) rotate(0);
        }


        /* =========================================================
           LIGHTBOX
        ========================================================== */

        .gallery-lightbox {
            position: fixed;

            inset: 0;

            z-index: 999999;

            display: flex;

            align-items: center;
            justify-content: center;

            padding: 30px;

            background: rgba(8, 12, 18, .9);

            opacity: 0;

            visibility: hidden;

            transition: opacity .35s ease,
            visibility .35s ease;

            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }

        .gallery-lightbox.active {
            opacity: 1;

            visibility: visible;
        }


        /* =========================================================
           LIGHTBOX CONTENT
        ========================================================== */

        .gallery-lightbox-content {
            position: relative;

            max-width: 1200px;

            max-height: 90vh;

            display: flex;

            flex-direction: column;

            align-items: center;

            transform: scale(.92);

            transition: transform .45s cubic-bezier(.2, .8, .2, 1);
        }

        .gallery-lightbox.active
        .gallery-lightbox-content {
            transform: scale(1);
        }

        .gallery-lightbox-image {
            max-width: min(1100px, 90vw);

            max-height: 78vh;

            display: block;

            object-fit: contain;

            border-radius: 16px;

            box-shadow: 0 35px 110px rgba(0, 0, 0, .45);
        }


        /* =========================================================
           LIGHTBOX TITLE
        ========================================================== */

        .gallery-lightbox-caption {
            margin-top: 18px;

            color: rgba(255, 255, 255, .85);

            font-size: 14px;

            font-weight: 600;

            text-align: center;
        }


        /* =========================================================
           CLOSE
        ========================================================== */

        .gallery-lightbox-close {
            position: fixed;

            top: 25px;
            right: 25px;

            z-index: 10;

            width: 48px;
            height: 48px;

            display: flex;

            align-items: center;
            justify-content: center;

            border: 1px solid rgba(255, 255, 255, .18);

            border-radius: 50%;

            background: rgba(0, 0, 0, .4);

            color: #fff;

            font-size: 26px;

            line-height: 1;

            cursor: pointer;

            transition: background .25s ease,
            transform .3s ease;
        }

        .gallery-lightbox-close:hover {
            background: rgba(0, 0, 0, .75);

            transform: rotate(90deg);
        }


        /* =========================================================
           COUNTER
        ========================================================== */

        .gallery-lightbox-counter {
            position: fixed;

            top: 35px;
            left: 35px;

            color: rgba(255, 255, 255, .65);

            font-size: 11px;

            font-weight: 800;

            letter-spacing: .1em;
        }


        /* =========================================================
           EMPTY
        ========================================================== */

        .gallery-empty {
            padding: 100px 30px;

            border: 1px dashed var(--border);

            border-radius: 25px;

            background: rgba(255, 255, 255, .7);

            text-align: center;
        }

        .gallery-empty h3 {
            margin: 0 0 10px;

            color: var(--black);

            font-size: 22px;
        }

        .gallery-empty p {
            margin: 0;

            color: var(--muted);

            font-size: 14px;
        }


        /* =========================================================
           ANIMATION
        ========================================================== */

        @keyframes galleryItemIn {

            from {
                opacity: 0;

                transform: translateY(25px) scale(.98);
            }

            to {
                opacity: 1;

                transform: translateY(0) scale(1);
            }

        }


        /* =========================================================
           TABLET
        ========================================================== */

        @media (max-width: 900px) {

            .premium-gallery {
                padding: 60px 0 90px;
            }

            .premium-gallery-header {
                width: 88%;

                align-items: flex-start;

                flex-direction: column;

                gap: 20px;

                margin-bottom: 45px;
            }

            .premium-gallery-container {
                width: 88%;
            }

            .premium-gallery-grid {
                grid-template-columns:
                    repeat(6, minmax(0, 1fr));

                grid-auto-rows: 85px;
            }

            .premium-gallery-item:nth-child(1) {
                grid-column: span 6;
                grid-row: span 5;
            }

            .premium-gallery-item:nth-child(2),
            .premium-gallery-item:nth-child(3) {
                grid-column: span 3;
                grid-row: span 3;
            }

            .premium-gallery-item:nth-child(4),
            .premium-gallery-item:nth-child(5),
            .premium-gallery-item:nth-child(6) {
                grid-column: span 3;
                grid-row: span 3;
            }

            .premium-gallery-item:nth-child(n+7) {
                grid-column: span 3;
                grid-row: span 3;
            }
        }


        /* =========================================================
           MOBILE
        ========================================================== */

        @media (max-width: 600px) {

            .premium-gallery {
                padding: 45px 0 70px;
            }

            .premium-gallery-header {
                width: 94%;

                margin-bottom: 35px;
            }

            .premium-gallery-heading h1 {
                font-size: 39px;
            }

            .premium-gallery-description {
                font-size: 13px;
            }

            .premium-gallery-container {
                width: 94%;
            }

            .premium-gallery-grid {
                display: grid;

                grid-template-columns:
                    repeat(2, minmax(0, 1fr));

                grid-auto-rows: 145px;

                gap: 12px;
            }

            .premium-gallery-item:nth-child(1) {
                grid-column: span 2;
                grid-row: span 3;
            }

            .premium-gallery-item:nth-child(2) {
                grid-column: span 1;
                grid-row: span 2;
            }

            .premium-gallery-item:nth-child(3) {
                grid-column: span 1;
                grid-row: span 2;
            }

            .premium-gallery-item:nth-child(4),
            .premium-gallery-item:nth-child(5),
            .premium-gallery-item:nth-child(6),
            .premium-gallery-item:nth-child(7),
            .premium-gallery-item:nth-child(8),
            .premium-gallery-item:nth-child(9),
            .premium-gallery-item:nth-child(10) {
                grid-column: span 1;
                grid-row: span 2;
            }

            .premium-gallery-item {
                border-radius: 17px;
            }

            .premium-gallery-content {
                padding: 17px;
            }

            .premium-gallery-content h3 {
                font-size: 15px;
            }

            .premium-gallery-content p {
                font-size: 10px;

                -webkit-line-clamp: 2;
            }

            .premium-gallery-number {
                margin-bottom: 5px;

                font-size: 8px;
            }

            .premium-gallery-view {
                top: 12px;
                right: 12px;

                width: 35px;
                height: 35px;

                opacity: 1;

                transform: scale(.9);
            }

            .gallery-lightbox {
                padding: 15px;
            }

            .gallery-lightbox-image {
                max-width: 94vw;

                max-height: 78vh;

                border-radius: 11px;
            }

            .gallery-lightbox-close {
                top: 15px;
                right: 15px;

                width: 42px;
                height: 42px;
            }

            .gallery-lightbox-counter {
                top: 28px;
                left: 20px;
            }
        }

        /* =========================================================
           REDUCED MOTION
        ========================================================== */

        @media (prefers-reduced-motion: reduce) {

            .premium-gallery-item,
            .premium-gallery-image,
            .premium-gallery-content,
            .premium-gallery-view,
            .gallery-lightbox,
            .gallery-lightbox-content,
            .gallery-lightbox-image,
            .gallery-lightbox-close {
                animation: none !important;

                transition: none !important;
            }
        }

        /* =========================================================
                  APP PAGINATION
                  Completely isolated
               ========================================================= */

        .app-pagination {
            --app-pagination-size: 42px;
            --app-pagination-radius: 12px;
            --app-pagination-color: #1d2939;
            --app-pagination-muted: #98a2b3;
            --app-pagination-border: #eaecf0;
            --app-pagination-background: #ffffff;
            --app-pagination-active: #101828;

            width: 100%;
            margin: 35px 0 0;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 7px;

            box-sizing: border-box;
        }


        /* ---------------------------------------------------------
           RESET
        --------------------------------------------------------- */

        .app-pagination *,
        .app-pagination *::before,
        .app-pagination *::after {
            box-sizing: border-box;
        }


        /* ---------------------------------------------------------
           PAGES WRAPPER
        --------------------------------------------------------- */

        .app-pagination__pages {
            display: flex;
            align-items: center;
            justify-content: center;

            gap: 6px;
        }


        /* ---------------------------------------------------------
           PAGE
        --------------------------------------------------------- */

        .app-pagination__page,
        .app-pagination__arrow {
            width: var(--app-pagination-size);
            height: var(--app-pagination-size);

            flex: 0 0 var(--app-pagination-size);

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0;
            margin: 0;

            border: 1px solid var(--app-pagination-border);
            border-radius: var(--app-pagination-radius);

            background: var(--app-pagination-background);
            color: var(--app-pagination-color);

            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            line-height: 1;

            text-decoration: none;

            cursor: pointer;

            transition: background-color .2s ease,
            color .2s ease,
            border-color .2s ease,
            transform .2s ease,
            box-shadow .2s ease;
        }


        /* ---------------------------------------------------------
           PAGE HOVER
        --------------------------------------------------------- */

        a.app-pagination__page:hover,
        a.app-pagination__arrow:hover {
            color: var(--app-pagination-active);

            border-color: #d0d5dd;

            background: #f9fafb;

            text-decoration: none;

            transform: translateY(-2px);

            box-shadow: 0 5px 15px rgba(16, 24, 40, .07);
        }


        /* ---------------------------------------------------------
           ACTIVE
        --------------------------------------------------------- */

        .app-pagination__page--active {
            color: #ffffff;

            background: var(--app-pagination-active);

            border-color: var(--app-pagination-active);

            box-shadow: 0 5px 15px rgba(16, 24, 40, .15);
        }


        /* ---------------------------------------------------------
           DOTS
        --------------------------------------------------------- */

        .app-pagination__dots {
            width: 30px;
            height: var(--app-pagination-size);

            display: inline-flex;
            align-items: center;
            justify-content: center;

            color: var(--app-pagination-muted);

            font-size: 15px;
            font-weight: 700;

            user-select: none;
        }


        /* ---------------------------------------------------------
           ARROW
        --------------------------------------------------------- */

        .app-pagination__arrow svg {
            width: 17px;
            height: 17px;

            fill: none;

            stroke: currentColor;
            stroke-width: 2;

            stroke-linecap: round;
            stroke-linejoin: round;
        }


        /* ---------------------------------------------------------
           DISABLED
        --------------------------------------------------------- */

        .app-pagination__arrow--disabled {
            color: #d0d5dd;

            background: #f9fafb;

            cursor: default;

            pointer-events: none;
        }


        /* ---------------------------------------------------------
           FOCUS
        --------------------------------------------------------- */

        .app-pagination__page:focus-visible,
        .app-pagination__arrow:focus-visible {
            outline: 3px solid rgba(16, 24, 40, .12);
            outline-offset: 2px;
        }


        /* ---------------------------------------------------------
           MOBILE
        --------------------------------------------------------- */

        @media (max-width: 600px) {

            .app-pagination {
                gap: 4px;
                margin-top: 25px;
            }

            .app-pagination__pages {
                gap: 4px;
            }

            .app-pagination__page,
            .app-pagination__arrow {
                width: 38px;
                height: 38px;

                flex-basis: 38px;

                border-radius: 10px;

                font-size: 12px;
            }

            .app-pagination__arrow svg {
                width: 15px;
                height: 15px;
            }

            .app-pagination__dots {
                width: 22px;
                height: 38px;
            }
        }


        /* ---------------------------------------------------------
           VERY SMALL MOBILE
        --------------------------------------------------------- */

        @media (max-width: 380px) {

            .app-pagination__page,
            .app-pagination__arrow {
                width: 34px;
                height: 34px;

                flex-basis: 34px;

                border-radius: 9px;

                font-size: 11px;
            }

            .app-pagination__pages {
                gap: 3px;
            }

            .app-pagination__dots {
                width: 18px;
                height: 34px;
            }
        }

        /* =========================================================
   LARAVEL PAGINATION - CLEAN STYLE
========================================================= */

        nav[aria-label="Pagination Navigation"] {
            margin-top: 45px;
        }

        nav[aria-label="Pagination Navigation"] > div {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }


        /* Pagination buttons */

        nav[aria-label="Pagination Navigation"] a,
        nav[aria-label="Pagination Navigation"] span {
            min-width: 42px;
            height: 42px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 13px;

            border: 1px solid #eaecf0;
            border-radius: 12px;

            background: #fff;

            color: #344054;

            font-size: 13px;
            font-weight: 700;

            line-height: 1;
            text-decoration: none;

            transition: all .25s ease;
        }


        /* Hover */

        nav[aria-label="Pagination Navigation"] a:hover {
            color: #101828;

            background: #f9fafb;

            border-color: #d0d5dd;

            transform: translateY(-2px);

            box-shadow: 0 6px 18px rgba(16, 24, 40, .07);
        }


        /* Active page */

        nav[aria-label="Pagination Navigation"] span[aria-current="page"] {
            background: #101828;

            border-color: #101828;

            color: #fff;

            box-shadow: 0 6px 18px rgba(16, 24, 40, .15);
        }


        /* Disabled */

        nav[aria-label="Pagination Navigation"] span[aria-disabled="true"] {
            color: #d0d5dd;

            background: #f9fafb;

            border-color: #f2f4f7;

            cursor: not-allowed;
        }


        /* SVG arrows */

        nav[aria-label="Pagination Navigation"] svg {
            width: 16px;
            height: 16px;
        }


        /* Mobile */

        @media (max-width: 600px) {

            nav[aria-label="Pagination Navigation"] {
                margin-top: 30px;
            }

            nav[aria-label="Pagination Navigation"] > div {
                gap: 4px;
            }

            nav[aria-label="Pagination Navigation"] a,
            nav[aria-label="Pagination Navigation"] span {
                min-width: 36px;
                height: 36px;

                padding: 0 9px;

                border-radius: 10px;

                font-size: 11px;
            }

            nav[aria-label="Pagination Navigation"] svg {
                width: 14px;
                height: 14px;
            }
        }
    </style>

@endsection


@section('content')

    <main class="premium-gallery">

        {{-- =====================================================
             HEADER
        ====================================================== --}}

        <header class="premium-gallery-header">

            <div class="premium-gallery-heading">

                <div class="premium-gallery-kicker mt-5">
                    {{ __('Gallery::words.gallery') }}
                </div>

                <h1>
                    {{ __('Gallery::words.gallery') }}
                </h1>

            </div>

            <p class="premium-gallery-description">
                {{ __('Gallery::words.pictures_from_company') }}
            </p>

        </header>

        {{-- =====================================================
             GALLERY
        ====================================================== --}}

        <div class="premium-gallery-container">

            @if($galleries && $galleries->count())

                @php
                    $locale = app()->getLocale();
                @endphp

                <div class="premium-gallery-grid">

                    @foreach($galleries as $index => $gallery)

                        @php

                            $title =
                                $gallery->{$locale . '_title'};

                            $description =
                                $gallery->{$locale . '_description'};

                            $image =
                                asset('storage/' . $gallery->image);

                        @endphp


                        <article
                            class="premium-gallery-item"
                            data-image="{{ $image }}"
                            data-title="{{ $title }}"
                            data-index="{{ $index + 1 }}"
                        >

                            {{-- Image --}}

                            <img
                                class="premium-gallery-image"
                                src="{{ $image }}"
                                alt="{{ $title }}"
                                width="100px"
                                height="100px"
                                loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                            >


                            {{-- Overlay --}}

                            <div class="premium-gallery-overlay"></div>


                            {{-- View Icon --}}

                            <div class="premium-gallery-view">
                                ⤢
                            </div>


                            {{-- Content --}}

                            <div class="premium-gallery-content">

                                <span class="premium-gallery-number">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </span>

                                <h3>
                                    {{ $title }}
                                </h3>

                                @if($description)

                                    <p>
                                        {{ $description }}
                                    </p>

                                @endif

                            </div>

                        </article>

                    @endforeach

                </div>
            @else

                <div class="gallery-empty">

                    <h3>
                        گالری خالی است
                    </h3>

                    <p>
                        در حال حاضر تصویری برای نمایش وجود ندارد.
                    </p>

                </div>

            @endif

        </div>
    </main>

    {{-- =========================================================
         LIGHTBOX
    ========================================================== --}}

    <div
        class="gallery-lightbox"
        id="galleryLightbox"
    >

        <span
            class="gallery-lightbox-counter"
            id="galleryLightboxCounter"
        >
            01
        </span>

        <button
            type="button"
            class="gallery-lightbox-close"
            id="galleryLightboxClose"
            aria-label="Close"
        >
            ×
        </button>


        <div class="gallery-lightbox-content">

            <img
                class="gallery-lightbox-image"
                id="galleryLightboxImage"
                src=""
                alt=""
            >

            <div
                class="gallery-lightbox-caption"
                id="galleryLightboxCaption"
            ></div>

        </div>

    </div>
    <div class="col-12 d-flex align-items-center justify-content-center mb-5 ">
        <div class="simple-pagination">

            @if($galleries->onFirstPage())
                <button class="btn btn-danger text-white">
            <span class="simple-pagination__btn disabled">
             {{ __('messages.previous') }}
        </span>
                </button>
            @else
                <button class="btn btn-danger text-black">

                    <a href="{{ $galleries->previousPageUrl() }}"
                       class="simple-pagination__btn text-decoration-none text-white">
                        {{ __('messages.previous') }}
                    </a>
                </button>

            @endif


            @if($galleries->hasMorePages())
                <button class="btn btn-primary text-white">
                    <a href="{{ $galleries->nextPageUrl() }}"
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

            const items =
                document.querySelectorAll('.premium-gallery-item');

            const lightbox =
                document.getElementById('galleryLightbox');

            const image =
                document.getElementById('galleryLightboxImage');

            const caption =
                document.getElementById('galleryLightboxCaption');

            const counter =
                document.getElementById('galleryLightboxCounter');

            const closeButton =
                document.getElementById('galleryLightboxClose');


            if (!items.length) {
                return;
            }


            let currentIndex = 0;


            /* =====================================================
               Open
            ====================================================== */

            function openLightbox(item) {

                const imageSrc =
                    item.dataset.image;

                const title =
                    item.dataset.title || '';

                const index =
                    parseInt(item.dataset.index, 10);


                currentIndex =
                    Array.from(items).indexOf(item);


                image.src = imageSrc;

                image.alt = title;

                caption.textContent = title;

                counter.textContent =
                    String(index).padStart(2, '0')
                    + ' / '
                    + String(items.length).padStart(2, '0');


                lightbox.classList.add('active');

                document.body.style.overflow = 'hidden';

            }


            /* =====================================================
               Close
            ====================================================== */

            function closeLightbox() {

                lightbox.classList.remove('active');

                document.body.style.overflow = '';

            }


            /* =====================================================
               Click Items
            ====================================================== */

            items.forEach(function (item) {

                item.addEventListener(
                    'click',
                    function () {

                        openLightbox(this);

                    }
                );

            });


            /* =====================================================
               Close Button
            ====================================================== */

            closeButton.addEventListener(
                'click',
                closeLightbox
            );


            /* =====================================================
               Click Outside
            ====================================================== */

            lightbox.addEventListener(
                'click',
                function (event) {

                    if (
                        event.target === lightbox
                    ) {

                        closeLightbox();

                    }

                }
            );


            /* =====================================================
               Keyboard Navigation
            ====================================================== */

            document.addEventListener(
                'keydown',
                function (event) {

                    if (
                        !lightbox.classList.contains('active')
                    ) {
                        return;
                    }


                    /* Escape */

                    if (event.key === 'Escape') {

                        closeLightbox();

                        return;

                    }


                    /* Next */

                    if (
                        event.key === 'ArrowRight'
                        ||
                        event.key === 'ArrowDown'
                    ) {

                        currentIndex =
                            (currentIndex + 1)
                            % items.length;

                        openLightbox(
                            items[currentIndex]
                        );

                    }


                    /* Previous */

                    if (
                        event.key === 'ArrowLeft'
                        ||
                        event.key === 'ArrowUp'
                    ) {

                        currentIndex =
                            (
                                currentIndex - 1
                                + items.length
                            )
                            % items.length;

                        openLightbox(
                            items[currentIndex]
                        );

                    }

                }
            );


            /* =====================================================
               Prevent Drag
            ====================================================== */

            image.addEventListener(
                'dragstart',
                function (event) {

                    event.preventDefault();

                }
            );

        });

    </script>
@endsection
