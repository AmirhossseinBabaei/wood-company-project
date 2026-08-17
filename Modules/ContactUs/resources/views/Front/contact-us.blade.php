@extends('contactus::components.layouts.master')

@section('title', __('ContactUs::words.contact_us'))

@section('styles')

    <link rel="stylesheet" href="{{ asset('assets/css/contact-us.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/gallery.css') }}">

    <style>

        /* =========================================================
           CONTACT PAGE
        ========================================================= */

        .contact-page {
            direction: rtl;
            color: #181818;
            background: #fff;
            overflow: hidden;
        }

        .contact-page *,
        .contact-page *::before,
        .contact-page *::after {
            box-sizing: border-box;
        }

        /* =========================================================
           HERO / HEADER
        ========================================================= */

        .contact-hero {
            position: relative;

            min-height: 420px;

            display: flex;
            align-items: center;

            padding: 80px 25px;

            overflow: hidden;

            background:
                linear-gradient(
                    100deg,
                    rgba(12, 12, 12, .38),
                    rgba(12, 12, 12, .82)
                ),
                url('{{ asset('assets/images/bg/bg.webp') }}')
                center / cover no-repeat;
        }

        .contact-hero::after {
            content: "";

            position: absolute;
            inset: 0;

            background:
                linear-gradient(
                    to top,
                    rgba(0, 0, 0, .4),
                    transparent 65%
                );
        }

        .contact-hero-inner {
            position: relative;
            z-index: 2;

            width: min(1180px, 100%);

            margin: auto;
        }

        .contact-hero-content {
            max-width: 700px;

            color: #fff;
        }

        .contact-eyebrow {
            display: flex;
            align-items: center;
            gap: 12px;

            margin-bottom: 20px;

            color: #d2ae78;

            font-size: 12px;
            font-weight: 700;

            letter-spacing: 2px;
        }

        .contact-eyebrow::before {
            content: "";

            width: 35px;
            height: 1px;

            background: #d2ae78;
        }

        .contact-hero-title {
            margin: 0 0 20px;

            font-size: clamp(38px, 5vw, 62px);

            font-weight: 800;

            line-height: 1.3;

            letter-spacing: -1px;
        }

        .contact-hero-description {
            max-width: 620px;

            margin: 0;

            color: rgba(255,255,255,.78);

            font-size: 16px;

            line-height: 2.1;
        }

        /* =========================================================
           MAIN
        ========================================================= */

        .contact-main {
            padding: 100px 0 120px;

            background: #f7f6f3;
        }

        .contact-container {
            width: min(1120px, calc(100% - 40px));

            margin: auto;
        }

        .contact-layout {
            display: grid;

            grid-template-columns: 380px 1fr;

            min-height: 620px;

            background: #fff;

            box-shadow:
                0 25px 70px rgba(0,0,0,.08);
        }

        /* =========================================================
           CONTACT INFORMATION
        ========================================================= */

        .contact-info {
            position: relative;

            padding: 55px 45px;

            color: #fff;

            background:
                linear-gradient(
                    rgba(24,24,24,.92),
                    rgba(24,24,24,.97)
                ),
                url('{{ asset('assets/images/bg/bg.webp') }}')
                center / cover no-repeat;
        }

        .contact-info::before {
            content: "";

            position: absolute;

            top: 45px;
            right: 45px;

            width: 45px;
            height: 1px;

            background: #c39a64;
        }

        .contact-info-heading {
            margin: 35px 0 15px;

            font-size: 30px;

            font-weight: 800;

            line-height: 1.5;
        }

        .contact-info-description {
            margin: 0 0 45px;

            color: rgba(255,255,255,.62);

            font-size: 14px;

            line-height: 2;
        }

        .info-list {
            display: flex;

            flex-direction: column;

            gap: 28px;
        }

        .info-item {
            display: flex;

            align-items: flex-start;

            gap: 17px;
        }

        .info-icon {
            width: 42px;
            height: 42px;

            flex: 0 0 42px;

            display: flex;

            align-items: center;
            justify-content: center;

            border: 1px solid rgba(195,154,100,.45);

            color: #d2ae78;

            font-size: 16px;
        }

        .info-item-content {
            min-width: 0;
        }

        .info-item-label {
            display: block;

            margin-bottom: 5px;

            color: rgba(255,255,255,.45);

            font-size: 11px;

            font-weight: 600;

            letter-spacing: 1px;
        }

        .info-item-value {
            margin: 0;

            color: rgba(255,255,255,.9);

            font-size: 14px;

            line-height: 1.9;

            word-break: break-word;
        }

        .contact-decoration {
            position: absolute;

            bottom: 35px;
            left: 35px;

            width: 80px;
            height: 80px;

            border-left: 1px solid rgba(195,154,100,.35);
            border-bottom: 1px solid rgba(195,154,100,.35);
        }

        /* =========================================================
           FORM
        ========================================================= */

        .contact-form-wrapper {
            padding: 55px 65px;

            background: #fff;
        }

        .form-header {
            margin-bottom: 38px;
        }

        .form-eyebrow {
            display: block;

            margin-bottom: 12px;

            color: #ad8552;

            font-size: 11px;

            font-weight: 700;

            letter-spacing: 2px;
        }

        .form-title {
            margin: 0 0 12px;

            color: #181818;

            font-size: 34px;

            font-weight: 800;

            line-height: 1.4;
        }

        .form-description {
            margin: 0;

            color: #888;

            font-size: 14px;

            line-height: 2;
        }

        /* =========================================================
           ALERTS
        ========================================================= */

        .contact-alerts {
            margin-bottom: 28px;
        }

        .contact-alert {
            position: relative;

            padding: 13px 16px;

            margin-bottom: 10px;

            border-radius: 0;

            font-size: 13px;

            line-height: 1.8;
        }

        .contact-alert-danger {
            border-right: 3px solid #c85c5c;

            background: #fff5f5;

            color: #9b4545;
        }

        .contact-alert-success {
            border-right: 3px solid #5c9b72;

            background: #f3faf5;

            color: #447654;
        }

        /* =========================================================
           INPUTS
        ========================================================= */

        .contact-form {
            display: flex;

            flex-direction: column;

            gap: 20px;
        }

        .form-row {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 18px;
        }

        .form-field {
            position: relative;
        }

        .form-field label {
            display: block;

            margin-bottom: 8px;

            color: #555;

            font-size: 12px;

            font-weight: 600;
        }

        .form-field input,
        .form-field textarea {
            width: 100%;

            border: 1px solid #e5e2dd;

            border-radius: 0;

            outline: none;

            background: #fafaf9;

            color: #222;

            font-family: inherit;

            font-size: 14px;

            transition:
                border-color .25s ease,
                background .25s ease,
                box-shadow .25s ease;
        }

        .form-field input {
            height: 54px;

            padding: 0 16px;
        }

        .form-field textarea {
            min-height: 155px;

            padding: 15px 16px;

            resize: vertical;

            line-height: 1.9;
        }

        .form-field input::placeholder,
        .form-field textarea::placeholder {
            color: #aaa;
        }

        .form-field input:focus,
        .form-field textarea:focus {
            border-color: #b08a59;

            background: #fff;

            box-shadow:
                0 0 0 3px rgba(176,138,89,.08);
        }

        /* =========================================================
           SUBMIT
        ========================================================= */

        .contact-submit {
            display: flex;

            align-items: center;
            justify-content: space-between;

            width: 100%;

            min-height: 56px;

            margin-top: 5px;

            padding: 0 22px 0 10px;

            border: 1px solid #1c1c1c;

            border-radius: 0;

            background: #1c1c1c;

            color: #fff;

            font-family: inherit;

            font-size: 14px;

            font-weight: 700;

            cursor: pointer;

            transition:
                background .3s ease,
                color .3s ease,
                border-color .3s ease;
        }

        .contact-submit-icon {
            width: 36px;
            height: 36px;

            display: flex;

            align-items: center;
            justify-content: center;

            background: #b08a59;

            color: #fff;

            transition:
                transform .3s ease,
                background .3s ease;
        }

        .contact-submit:hover {
            background: #b08a59;

            border-color: #b08a59;
        }

        .contact-submit:hover .contact-submit-icon {
            transform: translateX(-4px);

            background: #fff;

            color: #b08a59;
        }

        /* =========================================================
           FOOTNOTE
        ========================================================= */

        .form-footnote {
            display: flex;

            align-items: center;

            gap: 8px;

            margin-top: 20px;

            color: #aaa;

            font-size: 11px;
        }

        .form-footnote::before {
            content: "";

            width: 5px;
            height: 5px;

            border-radius: 50%;

            background: #b08a59;
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 992px) {

            .contact-layout {
                grid-template-columns: 320px 1fr;
            }

            .contact-info {
                padding: 45px 30px;
            }

            .contact-form-wrapper {
                padding: 45px 35px;
            }

            .contact-info-heading {
                font-size: 27px;
            }

        }

        @media (max-width: 768px) {

            .contact-hero {
                min-height: 500px;

                padding: 80px 25px;
            }

            .contact-main {
                padding: 60px 0 80px;
            }

            .contact-container {
                width: calc(100% - 28px);
            }

            .contact-layout {
                grid-template-columns: 1fr;
            }

            .contact-info {
                padding: 45px 30px;
            }

            .contact-info::before {
                top: 35px;
                right: 30px;
            }

            .contact-info-heading {
                margin-top: 25px;
            }

            .contact-decoration {
                display: none;
            }

            .contact-form-wrapper {
                padding: 45px 25px;
            }

            .form-title {
                font-size: 29px;
            }

        }

        @media (max-width: 520px) {

            .contact-hero {
                min-height: 440px;
            }

            .contact-hero-title {
                font-size: 38px;
            }

            .contact-hero-description {
                font-size: 14px;
            }

            .form-row {
                grid-template-columns: 1fr;

                gap: 20px;
            }

            .contact-info {
                padding: 40px 22px;
            }

            .contact-form-wrapper {
                padding: 40px 20px;
            }

            .info-list {
                gap: 22px;
            }

            .info-item {
                gap: 12px;
            }

        }
        .contact-hero{
            margin-top: -5rem !important;
        }
    </style>

@endsection


@section('content')

    <div class="contact-page">

        {{-- =====================================================
             HERO
        ====================================================== --}}

        <section class="contact-hero">

            <div class="contact-hero-inner">

                <div class="contact-hero-content">

                    <div class="contact-eyebrow">
                        {{ __('ContactUs::words.contact_us') }}
                    </div>

                    <h1 class="contact-hero-title">
                        {{ __('ContactUs::words.contact_with_me') }}
                    </h1>

                    <p class="contact-hero-description">
                        {{ __('ContactUs::words.contact_us_desc') }}
                    </p>

                </div>

            </div>

        </section>


        {{-- =====================================================
             MAIN CONTACT
        ====================================================== --}}

        <main class="contact-main">

            <div class="contact-container">

                <div class="contact-layout">

                    {{-- =================================================
                         INFORMATION
                    ================================================== --}}

                    <aside class="contact-info " style="width:100% !important">

                        <h2 class="contact-info-heading">
                            {{ __('ContactUs::words.contact_info') }}
                        </h2>

                        <p class="contact-info-description">
                            {{ __('ContactUs::words.contact_with_me') }}
                        </p>


                        <div class="info-list">

                            {{-- Address --}}
                            <div class="info-item">

                                <div class="info-icon">
                                    ⌖
                                </div>

                                <div class="info-item-content">

                                    <span class="info-item-label">
                                        {{ __('ContactUs::words.address') }}
                                    </span>

                                    <p class="info-item-value">
                                        {{ $data['setting']->{app()->getLocale() . "_address"} ?? '-' }}
                                    </p>

                                </div>

                            </div>


                            {{-- Phone --}}
                            <div class="info-item">

                                <div class="info-icon">
                                    ☎
                                </div>

                                <div class="info-item-content">

                                    <span class="info-item-label">
                                        {{ __('ContactUs::words.phone') }}
                                    </span>

                                    <p class="info-item-value">
                                        {{ $data['setting']->phone ?? '-' }}
                                    </p>

                                </div>

                            </div>


                            {{-- Mobile --}}
                            <div class="info-item">

                                <div class="info-icon">
                                    ◉
                                </div>

                                <div class="info-item-content">

                                    <span class="info-item-label">
                                        {{ __('ContactUs::words.mobile') }}
                                    </span>

                                    <p class="info-item-value">
                                        {{ $data['setting']->mobile ?? '-' }}
                                    </p>

                                </div>

                            </div>

                            {{-- Email --}}
                            <div class="info-item">

                                <div class="info-icon">
                                    @
                                </div>

                                <div class="info-item-content">

                                    <span class="info-item-label">
                                        {{ __('ContactUs::words.email') }}
                                    </span>

                                    <p class="info-item-value">
                                        {{ $data['setting']->email ?? '-' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="contact-decoration"></div>

                    </aside>

                    {{-- =================================================
                         FORM
                    ================================================== --}}

                    <section class="contact-form-wrapper">

                        <div class="form-header">

                            <span class="form-eyebrow">
                                {{ __('ContactUs::words.contact_us') }}
                            </span>

                            <h2 class="form-title">
                               {{ __('ContactUs::words.send_message') }}
                            </h2>

                            <p class="form-description">
                                {{ __('ContactUs::words.send_message_data') }}
                            </p>

                        </div>


                        {{-- Alerts --}}

                        @if($errors->any())

                            <div class="contact-alerts">

                                @foreach($errors->all() as $error)

                                    <div class="contact-alert contact-alert-danger">
                                        {{ $error }}
                                    </div>

                                @endforeach

                            </div>

                        @endif


                        @if(session('success'))

                            <div class="contact-alert contact-alert-success">
                                {{ session('success') }}
                            </div>

                        @endif


                        @if(session('error'))

                            <div class="contact-alert contact-alert-danger">
                                {{ session('error') }}
                            </div>

                        @endif


                        <form
                            class="contact-form"
                            method="POST"
                            action="{{ route((app()->getLocale() . '.contact-us.sendForm')) }}"
                        >

                            @csrf


                            {{-- Name + Phone --}}

                            <div class="form-row">

                                <div class="form-field">

                                    <label for="full_name">
                                        {{ __('ContactUs::words.full_name') }}
                                    </label>

                                    <input
                                        id="full_name"
                                        type="text"
                                        name="full_name"
                                        value="{{ old('full_name') }}"
                                        placeholder="{{ __('ContactUs::words.full_name') }}"
                                        autocomplete="name"
                                    >

                                </div>


                                <div class="form-field">

                                    <label for="phone">
                                        {{ __('ContactUs::words.phone') }}
                                    </label>

                                    <input
                                        id="phone"
                                        type="text"
                                        name="phone"
                                        value="{{ old('phone') }}"
                                        placeholder="{{ __('ContactUs::words.phone') }}"
                                        autocomplete="tel"
                                    >

                                </div>

                            </div>


                            {{-- Email --}}

                            <div class="form-field">

                                <label for="email">
                                    {{ __('ContactUs::words.email') }}
                                </label>

                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="example@email.com"
                                    autocomplete="email"
                                >

                            </div>


                            {{-- Message --}}

                            <div class="form-field">

                                <label for="message">
                                    {{ __('ContactUs::words.message') }}
                                </label>

                                <textarea
                                    id="message"
                                    name="message"
                                    placeholder="{{ __('ContactUs::words.message') }}"
                                >{{ old('message') }}</textarea>

                            </div>


                            {{-- Submit --}}

                            <button
                                type="submit"
                                class="contact-submit"
                            >

                                <span>
                                    {{ __('ContactUs::words.sendForm') }}
                                </span>

                                <span class="contact-submit-icon">
                                    ←
                                </span>

                            </button>

                        </form>

                    </section>

                </div>

            </div>

        </main>

    </div>

@endsection
