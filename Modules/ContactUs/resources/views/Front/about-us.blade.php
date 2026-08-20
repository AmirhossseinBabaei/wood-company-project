@extends('contact-messages::components.layouts.master')

@section('title', __('ContactUs::words.about_us'))

@section('styles')

    <link rel="stylesheet" href="{{ asset('assets/css/about-us.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/gallery.css') }}">

    <style>
        /* =========================================================
           ABOUT PAGE — PREMIUM EDITORIAL DESIGN
        ========================================================= */

        .about-page {
            direction: rtl;
            color: #171717;
            background: #fff;
            overflow: hidden;
        }

        .about-page * {
            box-sizing: border-box;
        }

        /* =========================================================
           HERO
        ========================================================= */

        .about-hero {
            position: relative;
            min-height: 760px;
            display: flex;
            align-items: center;
            padding: 110px 30px;
            isolation: isolate;

            background:
                linear-gradient(
                    90deg,
                    rgba(10, 10, 10, .18),
                    rgba(10, 10, 10, .78)
                ),
                url('{{ asset('assets/images/bg/bg.webp') }}') center / cover no-repeat;
        }

        .about-hero::after {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;

            background:
                linear-gradient(
                    to top,
                    rgba(0, 0, 0, .55),
                    transparent 45%
                );
        }

        .hero-inner {
            width: min(1180px, 100%);
            margin: auto;
        }

        .hero-content {
            max-width: 720px;
            color: #fff;
            text-align: right;
        }

        .hero-kicker {
            display: inline-flex;
            align-items: center;
            gap: 12px;

            margin-bottom: 25px;

            color: rgba(255, 255, 255, .72);
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 2px;
        }

        .hero-kicker::before {
            content: "";
            width: 42px;
            height: 1px;
            background: #c7a36a;
        }

        .hero-logo {
            width: 145px;
            height: 145px;
            object-fit: contain;

            margin-bottom: 30px;

            filter: drop-shadow(0 18px 30px rgba(0, 0, 0, .3));
        }

        .hero-title {
            margin: 0 0 25px;

            font-size: clamp(38px, 6vw, 72px);
            font-weight: 800;
            line-height: 1.25;
            letter-spacing: -2px;
        }

        .hero-description {
            max-width: 650px;

            margin: 0;

            color: rgba(255, 255, 255, .82);

            font-size: 17px;
            line-height: 2.2;
            font-weight: 400;
        }

        /* =========================================================
           COMMON SECTION
        ========================================================= */

        .about-section {
            padding: 120px 0;
        }

        .about-container {
            width: min(1180px, calc(100% - 50px));
            margin: auto;
        }

        .section-heading {
            max-width: 720px;
            margin-bottom: 55px;
        }

        .section-eyebrow {
            display: flex;
            align-items: center;
            gap: 12px;

            margin-bottom: 18px;

            color: #aa8150;

            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .section-eyebrow::before {
            content: "";
            width: 32px;
            height: 1px;
            background: #aa8150;
        }

        .section-title {
            margin: 0 0 18px;

            color: #151515;

            font-size: clamp(30px, 4vw, 48px);
            font-weight: 800;
            line-height: 1.35;
            letter-spacing: -1px;
        }

        .section-description {
            max-width: 650px;

            margin: 0;

            color: #777;

            font-size: 16px;
            line-height: 2.1;
        }

        /* =========================================================
           PROJECTS / GALLERY
        ========================================================= */

        .about-gallery {
            background: #f7f6f3;
        }

        .gallery-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 30px;

            margin-bottom: 50px;
        }

        .gallery-header .section-heading {
            margin-bottom: 0;
        }

        .gallery-brand {
            color: #aaa;

            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: 1.35fr .8fr .8fr;
            grid-template-rows: 280px 280px;
            gap: 16px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;

            display: block;

            border-radius: 4px;

            background: #ddd;

            text-decoration: none !important;
        }

        .gallery-item-large {
            grid-row: span 2;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;

            display: block;

            object-fit: cover;

            transition:
                transform .8s cubic-bezier(.2,.7,.2,1),
                filter .5s ease;
        }

        .gallery-item::before {
            content: "";

            position: absolute;
            inset: 0;

            z-index: 1;

            background: linear-gradient(
                to top,
                rgba(0, 0, 0, .65),
                transparent 55%
            );

            opacity: .35;

            transition: opacity .4s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.06);
            filter: brightness(.78);
        }

        .gallery-item:hover::before {
            opacity: .8;
        }

        .gallery-item-info {
            position: absolute;
            right: 25px;
            bottom: 22px;
            left: 25px;

            z-index: 2;

            color: #fff;

            transform: translateY(8px);

            transition: transform .4s ease;
        }

        .gallery-item:hover .gallery-item-info {
            transform: translateY(0);
        }

        .gallery-item-number {
            display: block;

            margin-bottom: 8px;

            color: rgba(255,255,255,.65);

            font-size: 11px;
            letter-spacing: 2px;
        }

        .gallery-item-title {
            margin: 0;

            font-size: 20px;
            font-weight: 700;
        }

        @font-face {
            font-family: 'Sans';
            src: url({{ asset('assets/fonts/Douran/Doran-light.ttf') }});
        }

        * {
            font-family: 'Sans' !important;
            margin: 0;
            padding: 0;
        }
        /* =========================================================
           OWNER
        ========================================================= */

        .manager-section {
            background: #fff;
        }

        .manager-box {
            display: grid;
            grid-template-columns: 390px 1fr;
            align-items: center;
            gap: 90px;

            max-width: 1080px;
            margin: auto;
        }

        .manager-visual {
            position: relative;
        }

        .manager-image-wrapper {
            position: relative;

            width: 330px;
            height: 410px;

            margin: auto;

            overflow: visible;
        }

        .manager-image-wrapper::before {
            content: "";

            position: absolute;

            top: 25px;
            right: -25px;

            width: 100%;
            height: 100%;

            border: 1px solid #d8c09c;

            z-index: 0;
        }

        .manager-image {
            position: relative;
            z-index: 1;

            width: 100%;
            height: 100%;

            display: block;

            object-fit: cover;

            background: #eee;

            box-shadow: 0 25px 60px rgba(0, 0, 0, .12);
        }

        .manager-content {
            max-width: 650px;
        }

        .manager-role {
            display: flex;
            align-items: center;
            gap: 12px;

            margin-bottom: 18px;

            color: #aa8150;

            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .manager-role::before {
            content: "";
            width: 32px;
            height: 1px;

            background: #aa8150;
        }

        .manager-title {
            margin: 0 0 28px;

            color: #151515;

            font-size: clamp(32px, 4vw, 46px);
            font-weight: 800;
            line-height: 1.4;
        }

        .manager-description {
            margin: 0;

            color: #666;

            font-size: 16px;
            line-height: 2.4;
        }

        /* =========================================================
           BRAND / STATS
        ========================================================= */

        .brand-section {
            background: #f3f1ed;
        }

        .brand-content {
            max-width: 900px;
            margin: auto;

            text-align: center;
        }

        .brand-name {
            margin: 0 0 25px;

            color: #151515;

            font-size: clamp(34px, 5vw, 58px);
            font-weight: 800;
            letter-spacing: -1px;
        }

        .brand-description {
            max-width: 700px;

            margin: auto;

            color: #707070;

            font-size: 16px;
            line-height: 2.3;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);

            margin-top: 65px;

            border-top: 1px solid #ddd8d0;
            border-bottom: 1px solid #ddd8d0;
        }

        .about-card {
            position: relative;

            padding: 38px 20px;

            text-align: center;

            background: transparent;
        }

        .about-card:not(:last-child)::after {
            content: "";

            position: absolute;

            top: 25%;
            bottom: 25%;
            left: 0;

            width: 1px;

            background: #ddd8d0;
        }

        .number {
            display: block;

            color: #171717;

            font-size: 42px;
            font-weight: 800;
            line-height: 1;
        }

        .hr_narrow {
            width: 25px;

            margin: 17px auto;

            border: 0;
            border-top: 1px solid #b18a58;
        }

        .desc {
            color: #858585;

            font-size: 13px;
        }

        /* =========================================================
           CONTACT
        ========================================================= */

        .contact-section {
            position: relative;

            min-height: 500px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 70px;

            padding: 80px 30px;

            overflow: hidden;

            background:
                linear-gradient(
                    rgba(0,0,0,.52),
                    rgba(0,0,0,.68)
                ),
                url('{{ asset('assets/images/bg/bg.webp') }}') center / cover no-repeat;
        }

        .contact-card {
            max-width: 700px;

            text-align: center;

            color: #fff;
        }

        .contact-label {
            display: block;

            margin-bottom: 20px;

            color: #d1ad7a;

            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .contact-title {
            margin: 0 0 35px;

            font-size: clamp(30px, 5vw, 52px);
            font-weight: 800;
            line-height: 1.55;
        }

        .contact-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-width: 190px;

            padding: 15px 35px;

            border: 1px solid rgba(255,255,255,.7);
            border-radius: 0;

            background: #fff;

            color: #171717;

            font-size: 14px;
            font-weight: 700;

            cursor: pointer;

            transition:
                background .3s ease,
                color .3s ease,
                transform .3s ease;
        }

        .contact-btn a {
            color: inherit !important;
            text-decoration: none !important;
        }

        .contact-btn:hover {
            transform: translateY(-3px);

            background: transparent;

            color: #fff;
        }

        /* =========================================================
           FADE ANIMATION
        ========================================================= */

        .about-page .reveal {
            opacity: 0;
            transform: translateY(25px);

            transition:
                opacity .8s ease,
                transform .8s ease;
        }

        .about-page .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 992px) {

            .about-hero {
                min-height: 680px;
            }

            .about-container {
                width: min(90%, 760px);
            }

            .gallery-header {
                display: block;
            }

            .gallery-brand {
                margin-top: 20px;
            }

            .gallery-grid {
                grid-template-columns: 1fr 1fr;
                grid-template-rows: 300px 220px 220px;
            }

            .gallery-item-large {
                grid-column: span 2;
                grid-row: span 1;
            }

            .manager-box {
                grid-template-columns: 300px 1fr;
                gap: 50px;
            }

            .manager-image-wrapper {
                width: 260px;
                height: 340px;
            }

            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .about-card:nth-child(2)::after {
                display: none;
            }

            .about-card:nth-child(1),
            .about-card:nth-child(2) {
                border-bottom: 1px solid #ddd8d0;
            }
        }

        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 650px) {

            .about-hero {
                min-height: 620px;
                padding: 80px 22px;
                text-align: center;
            }

            .hero-content {
                text-align: center;
            }

            .hero-kicker {
                justify-content: center;
            }

            .hero-logo {
                width: 110px;
                height: 110px;
                margin-bottom: 25px;
            }

            .hero-title {
                font-size: 38px;
                letter-spacing: -1px;
            }

            .hero-description {
                font-size: 14px;
                line-height: 2;
            }

            .about-section {
                padding: 75px 0;
            }

            .about-container {
                width: calc(100% - 32px);
            }

            .section-heading {
                margin-bottom: 35px;
            }

            .section-title {
                font-size: 30px;
            }

            .section-description {
                font-size: 14px;
            }

            .gallery-grid {
                display: grid;

                grid-template-columns: 1fr;
                grid-template-rows: repeat(4, 260px);

                gap: 10px;
            }

            .gallery-item-large,
            .gallery-item {
                grid-column: span 1;
                grid-row: span 1;
            }

            .gallery-item-title {
                font-size: 18px;
            }

            .manager-box {
                display: flex;
                flex-direction: column;

                gap: 55px;

                text-align: center;
            }

            .manager-image-wrapper {
                width: 240px;
                height: 310px;
            }

            .manager-image-wrapper::before {
                top: 15px;
                right: -15px;
            }

            .manager-role {
                justify-content: center;
            }

            .manager-title {
                font-size: 30px;
            }

            .manager-description {
                font-size: 14px;
                line-height: 2.2;
            }

            .brand-name {
                font-size: 36px;
            }

            .brand-description {
                font-size: 14px;
                line-height: 2.1;
            }

            .stats-container {
                margin-top: 45px;
            }

            .about-card {
                padding: 28px 10px;
            }

            .number {
                font-size: 31px;
            }

            .desc {
                font-size: 11px;
            }

            .contact-section {
                min-height: 420px;

                margin-bottom: 30px;

                padding: 60px 20px;
            }

            .contact-title {
                font-size: 30px;
            }
        }

        @media (max-width: 380px) {

            .stats-container {
                grid-template-columns: 1fr;
            }

            .about-card {
                border-bottom: 1px solid #ddd8d0 !important;
            }

            .about-card:last-child {
                border-bottom: 0 !important;
            }

            .about-card::after {
                display: none !important;
            }
        }

        .number{
            color:black !important;
        }
        .about-hero{
            margin-top: -5rem !important;
        }
        .team-section {
            padding-top: 80px;
            padding-bottom: 80px;
        }

        .team-header {
            text-align: center;
            margin-bottom: 45px;
        }

        .team-subtitle {
            display: block;
            font-size: 14px;
            margin-bottom: 8px;
            opacity: 0.7;
        }

        .team-title {
            margin: 0;
            font-size: 32px;
            font-weight: 700;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 30px;
        }

        .team-card {
            text-align: center;
        }

        .team-image-wrapper {
            width: 100%;
            aspect-ratio: 1 / 1;
            overflow: hidden;
            border-radius: 12px;
            margin-bottom: 15px;
        }

        .team-image {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .team-card:hover .team-image {
            transform: scale(1.05);
        }

        .team-info {
            text-align: center;
        }

        .team-name {
            margin: 0 0 5px;
            font-size: 18px;
            font-weight: 600;
        }

        .team-field {
            font-size: 14px;
            opacity: 0.65;
        }

        .team-empty {
            grid-column: 1 / -1;
            text-align: center;
            padding: 30px;
            opacity: 0.6;
        }


        @media (max-width: 992px) {

            .team-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

        }


        @media (max-width: 768px) {

            .team-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 20px;
            }

        }


        @media (max-width: 480px) {

            .team-grid {
                grid-template-columns: 1fr;
            }

        }
    </style>

@endsection


@section('content')

    <div class="about-page">

        {{-- =====================================================
             HERO
        ====================================================== --}}

        <section class="about-hero">

            <div class="hero-inner">

                <div class="hero-content reveal">

                    <span class="hero-kicker">
                        {{ __('ContactUs::words.about_us') }}
                    </span>

                    <img
                        class="hero-logo"
                        src="{{ asset('assets/images/logos/wheel.svg') }}"
                        alt="{{ $data['setting']->{app()->getLocale() . '_website_name'} }}"
                    >

                    <h1 class="hero-title">
                        {{ $data['setting']->{app()->getLocale() . "_website_name"} }}
                    </h1>

                    <p class="hero-description">
                        {{ $data['setting']->{app()->getLocale() . "_website_description"} }}
                    </p>

                </div>

            </div>

        </section>


        {{-- =====================================================
             PROJECTS
        ====================================================== --}}

        <section class="about-section about-gallery">

            <div class="about-container">

                <div class="gallery-header reveal">

                    <div class="section-heading">

                        <div class="section-eyebrow">
                            {{ $data['setting']->{app()->getLocale() . "_website_name"} }}
                        </div>

                        <h2 class="section-title">
                            {{ __('ContactUs::words.beautiful_in_details') }}
                        </h2>

                        <p class="section-description">
                            {{ __('ContactUs::words.some_projects_developed') }}
                        </p>

                    </div>

                    <div class="gallery-brand">
                        PROJECTS / SELECTED WORKS
                    </div>

                </div>


                <div class="gallery-grid">

                    @foreach($lastFourProjects as $index => $lastProject)

                        @php
                            $projectImage = $lastProject->images[0]->img_src ?? null;
                        @endphp

                        @if($projectImage)

                            <a
                                class="gallery-item {{ $index === 0 ? 'gallery-item-large' : '' }} reveal"
                                href="{{ route((app()->getLocale() . '.projects.show'), [
                                    'name' => str_replace(
                                        ' ',
                                        '-',
                                        $lastProject->{app()->getLocale() . "_name"}
                                    ),
                                    'id' => $lastProject->id
                                ]) }}"
                                target="_blank"
                            >

                                <img
                                    src="{{ asset('storage/' . $projectImage) }}"
                                    alt="{{ $lastProject->{app()->getLocale() . '_name'} }}"
                                    loading="lazy"
                                >

                                <div class="gallery-item-info">

                                    <span class="gallery-item-number">
                                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                    </span>

                                    <h3 class="gallery-item-title">
                                        {{ $lastProject->{app()->getLocale() . "_name"} }}
                                    </h3>

                                </div>

                            </a>

                        @endif

                    @endforeach

                </div>

            </div>

        </section>


        {{-- =====================================================
             OWNER
        ====================================================== --}}

        <section class="about-section manager-section">

            <div class="about-container">

                <div class="manager-box">

                    <div class="manager-visual reveal">

                        <div class="manager-image-wrapper">

                            <img
                                class="manager-image"
                                src="{{ asset('storage/' . $data['setting']->owner_avatar) }}"
                                alt="{{ $data['setting']->{app()->getLocale() . '_owner_full_name'} }}"
                                loading="lazy"
                            >

                        </div>

                    </div>


                    <div class="manager-content reveal">

                        <span class="manager-role">
                            {{ __('ContactUs::words.owner') }}
                        </span>

                        <h2 class="manager-title">
                            {{ $data['setting']->{app()->getLocale() . '_owner_full_name'} }}
                        </h2>

                        <p class="manager-description">
                            {{ $data['setting']->{app()->getLocale() . '_owner_bio'} }}
                        </p>

                    </div>

                </div>

            </div>

        </section>


        {{-- ====================================================
        Members
        ====================================================== --}}
        <section class="about-section team-section">

            <div class="about-container">

                <div class="team-header reveal">

            <span class="team-subtitle">
                {{ __('ContactUs::words.team') }}
            </span>

                    <h2 class="team-title">
                        {{ __('ContactUs::words.our_team') }}
                    </h2>

                </div>


                <div class="team-grid">

                    @forelse($members as $teamMember)

                        <div class="team-card reveal">

                            <div class="team-image-wrapper">

                                <img
                                    class="team-image"
                                    src="{{ asset('storage/' . $teamMember->image) }}"
                                    alt="{{ $teamMember->full_name }}"
                                    loading="lazy"
                                >

                            </div>

                            <div class="team-info">

                                <h3 class="team-name">
                                    {{ $teamMember->full_name }}
                                </h3>

                                <span class="team-field">
                            {{ $teamMember->field }}
                        </span>

                            </div>

                        </div>

                    @empty

                        <div class="team-empty">
                            {{ __('ContactUs::words.no_team_members') }}
                        </div>

                    @endforelse

                </div>

            </div>

        </section>
        {{-- =====================================================
             BRAND + STATS
        ====================================================== --}}

        <section class="about-section brand-section">

            <div class="about-container">

                <div class="brand-content reveal">

                    <div class="section-eyebrow" style="justify-content:center;">
                        {{ __('ContactUs::words.about_us') }}
                    </div>

                    <h2 class="brand-name">
                        {{ $data['setting']->{app()->getLocale() . "_website_name"} }}
                    </h2>

                    <p class="brand-description">
                        {{ $data['setting']->{app()->getLocale() . "_website_description"} }}
                    </p>

                </div>


                <div class="stats-container reveal">

                    <div class="about-card">

                        <span
                            class="number"
                            data-to="{{ $counters['servicesCount'] }}"
                        >
                            0
                        </span>

                        <hr class="hr_narrow">

                        <div class="desc">
                            {{ __('ContactUs::words.different_services') }}
                        </div>

                    </div>


                    <div class="about-card">

                        <span
                            class="number"
                            data-to="{{ $counters['projectsCount'] }}"
                        >
                            0
                        </span>

                        <hr class="hr_narrow">

                        <div class="desc">
                            {{ __('ContactUs::words.different_projects') }}
                        </div>

                    </div>


                    <div class="about-card">

                        <span
                            class="number"
                            data-to="{{ $counters['usersCount'] }}"
                        >
                            0
                        </span>

                        <hr class="hr_narrow">

                        <div class="desc">
                            {{ __('ContactUs::words.active_user') }}
                        </div>

                    </div>


                    <div class="about-card">

                        <span
                            class="number"
                            data-to="89"
                        >
                            0
                        </span>

                        <hr class="hr_narrow">

                        <div class="desc">
                            {{ __('ContactUs::words.satisfied_customers') }}
                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- =====================================================
             CONTACT CTA
        ====================================================== --}}

        <section class="about-container">

            <div class="contact-section reveal">

                <div class="contact-card">

                    <span class="contact-label">
                        {{ __('ContactUs::words.contact_with_me') }}
                    </span>

                    <h2 class="">
                        {{ __('ContactUs::words.to_get_acquainted_design_word') }}
                    </h2>

                    <a
                        href="{{ route((app()->getLocale() .'.contact-us')) }}"
                        target="_blank"
                        class="contact-btn text-decoration-none rounded-3"
                    >
                        {{ __('ContactUs::words.contact_us') }}
                    </a>

                </div>

            </div>

        </section>

    </div>

@endsection


@section('scripts')

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            /* =========================================================
               REVEAL ON SCROLL
            ========================================================= */

            const revealElements = document.querySelectorAll('.reveal');

            if ('IntersectionObserver' in window) {

                const revealObserver = new IntersectionObserver(
                    function (entries, observer) {

                        entries.forEach(function (entry) {

                            if (!entry.isIntersecting) {
                                return;
                            }

                            entry.target.classList.add('visible');

                            observer.unobserve(entry.target);

                        });

                    },
                    {
                        threshold: 0.12
                    }
                );

                revealElements.forEach(function (element) {
                    revealObserver.observe(element);
                });

            } else {

                revealElements.forEach(function (element) {
                    element.classList.add('visible');
                });

            }


            /* =========================================================
               COUNTER
            ========================================================= */

            const statsContainer = document.querySelector('.stats-container');

            if (!statsContainer) {
                return;
            }

            const counters = statsContainer.querySelectorAll('.number');

            let started = false;

            const animateCounter = function (counter) {

                const target = parseInt(
                    counter.getAttribute('data-to'),
                    10
                ) || 0;

                const duration = 1800;
                const startTime = performance.now();

                const update = function (currentTime) {

                    const elapsed = currentTime - startTime;

                    const progress = Math.min(
                        elapsed / duration,
                        1
                    );

                    const easedProgress =
                        1 - Math.pow(1 - progress, 4);

                    const value = Math.floor(
                        target * easedProgress
                    );

                    counter.textContent =
                        value.toLocaleString('fa-IR');

                    if (progress < 1) {

                        requestAnimationFrame(update);

                    } else {

                        counter.textContent =
                            target.toLocaleString('fa-IR');

                    }

                };

                requestAnimationFrame(update);

            };


            if ('IntersectionObserver' in window) {

                const counterObserver = new IntersectionObserver(
                    function (entries, observer) {

                        entries.forEach(function (entry) {

                            if (
                                entry.isIntersecting &&
                                !started
                            ) {

                                started = true;

                                counters.forEach(function (counter) {
                                    animateCounter(counter);
                                });

                                observer.unobserve(entry.target);

                            }

                        });

                    },
                    {
                        threshold: 0.35
                    }
                );

                counterObserver.observe(statsContainer);

            } else {

                counters.forEach(function (counter) {
                    animateCounter(counter);
                });

            }

        });

    </script>

@endsection
