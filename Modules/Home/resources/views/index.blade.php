.@extends('home::components.layouts.master')
@section('title', __('Home::words.home'))

@section('styles')
    <style>
        .navbar, .my-navbar, #hero{
            background-color: #2E2F2A !important;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="container fade-right">
            <div class="col-12 d-flex align-items-center justify-content-center" id="videoContainer">
                <video src="{{ asset('assets/videos/video-hero.mp4') }}" autoplay muted loop></video>
            </div>
        </div>
    </div>
    <div class="row">
        <section class="container py-5 fade-right bg-body">
            <div class="row g-5">
                <div class="col-lg-7" style="background-color: rgb(255, 255, 255) !important;">
                    <div class="row g-4">
                        <img src="assets/images/slider/1.webp" alt="تصویر روشن ۱">
                    </div>
                </div>

                <div class="col-lg-5" style="background-color: rgb(255, 255, 255) !important;">
                    <div class="sticky-content">
                        <h3 class="text-warning text-uppercase">{{ __('Home::words.advantages') }}</h3>
                        <h4 class="fw-bold mb-4">
                            {{ __('Home::words.advantages_slug')  }}
                        </h4>
                        <p class="text-muted lh-lg">
                            {{ __('Home::words.advantages_description')  }}

                        </p>
                        <button
                            class="btn btn-warning px-4 py-2 mt-3">
                            <a class="text-decoration-none text-black" href="{{ route((app()->getLocale() . '.projects')) }}">
                                {{ __('Home::words.show_my_portfolio') }}
                            </a>
                        </button>
                    </div>
                </div>

            </div>
        </section>

    </div>
    <div class="row">
        <div class="container fade-left bg-white">
            <div class="col-12">
                <div class="text-center col-12">
                    <h6>{{ __('Home::words.some_completed_projects') }}</h6>
                    <h2>{{ __('Home::words.we_completed_some_projects') }}</h2>
                </div>

                <div class="col-12 d-flex align-items-center justify-content-center flex-wrap mt-5">

                    @foreach($data['projects'] as $project)
                        <div class="card project-card col-xl-3 col-lg-6 col-sm-4" style="border: none;">
                            <a style="text-decoration: none !important"
                               class="text-black text-decoration-none"
                               href="{{ route((app()->getLocale() . '.projects.show'), ['name' => (str_replace(' ', '-', $project->{app()->getLocale() . "_name"})), 'id' => $project->id ]) }}"
                               target="_blank">

                                <div class="image-box">
                                    <img src="{{ 'storage/' . ($project->images[0]->img_src ?? '-') }}"
                                         class="img-fluid"
                                         alt=""
                                         style="border-radius: 30px;">
                                </div>

                                <div class="col-12 mt-3 text-center">
                                    <h6 class="font-normal">
                                        {{ $project->{app()->getLocale() . "_name"} }}
                                    </h6>
                                </div>
                            </a>
                        </div>

                    @endforeach

                </div>
                <div class="col-12 text-center mt-5 mb-5">
                    <button class="btn-chank p-2">
                        <a class="text-black text-decoration-none" href="{{ route((app()->getLocale() . '.projects')) }}">
                            {{ __('Home::words.see_all_projects') }}
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container fade-right" style="background-color: rgb(255, 255, 255) !important;">
            <div class="col-12 text-center mt-5 mb-5">
                <h4>{{ $data['setting']->{app()->getLocale() . "_website_name"} }}</h4>
                <h1>{{ __('Home::words.why')  }} {{ $data['setting']->{app()->getLocale() . "_website_name"} }}</h1>
            </div>
            <div class="col-12 d-flex align-items-center justify-content-center" style="height: 150px;">
                <div class="col-xl-5 col-sm-12">
                    <div class="slider-wrapper">
                        <div class="splide">
                            <div class="splide__track">
                                <ul class="splide__list">

                                        <span class="splide__slide">
                                            <img width="100px" height="100px"
                                                 src="assets/images/slider/slider-pk-1.svg">
                                        </span>

                                    <span class="splide__slide">
                                            <img width="100px" height="100px"
                                                 src="assets/images/slider/slider-pk-2.svg">
                                        </span>

                                    <span class="splide__slide">
                                            <img width="100px" height="100px"
                                                 src="assets/images/slider/slider-pk-3.svg">
                                        </span>
                                    <span class="splide__slide">
                                            <img width="100px" height="100px"
                                                 src="assets/images/slider/slider-pk-1.svg">
                                        </span>

                                    <span class="splide__slide">
                                            <img width="100px" height="100px"
                                                 src="assets/images/slider/slider-pk-2.svg">
                                        </span>

                                    <span class="splide__slide">
                                            <img width="100px" height="100px"
                                                 src="assets/images/slider/slider-pk-3.svg">
                                        </span>
                                    <span class="splide__slide">
                                            <img width="100px" height="100px"
                                                 src="assets/images/slider/slider-pk-1.svg">
                                        </span>

                                    <span class="splide__slide">
                                            <img width="100px" height="100px"
                                                 src="assets/images/slider/slider-pk-2.svg">
                                        </span>

                                    <span class="splide__slide">
                                            <img width="100px" height="100px"
                                                 src="assets/images/slider/slider-pk-3.svg">
                                        </span>
                                    <span class="splide__slide">
                                            <img width="100px" height="100px"
                                                 src="assets/images/slider/slider-pk-1.svg">
                                        </span>

                                    <span class="splide__slide">
                                            <img width="100px" height="100px"
                                                 src="assets/images/slider/slider-pk-2.svg">
                                        </span>

                                    <span class="splide__slide">
                                            <img width="100px" height="100px"
                                                 src="assets/images/slider/slider-pk-3.svg">
                                        </span>
                                    <span class="splide__slide">
                                            <img width="100px" height="100px"
                                                 src="assets/images/slider/slider-pk-1.svg">
                                        </span>

                                    <span class="splide__slide">
                                            <img width="100px" height="100px"
                                                 src="assets/images/slider/slider-pk-2.svg">
                                        </span>

                                    <span class="splide__slide">
                                            <img width="100px" height="100px"
                                                 src="assets/images/slider/slider-pk-3.svg">
                                        </span>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container fade-right">
            <div class="col-12 contact-section" id="bgImage"
                 style="background-color: rgb(255, 255, 255) !important;">
                <div class="contact-card">
                    <h3>
                        {{ __('Home::words.call_me_description') }}
                    </h3>

                    <button class="contact-btn">
                        <a href="{{ route((app()->getLocale() . '.contact-us')) }}" target="_blank" class="text-decoration-none text-black">
                            {{ __('Home::words.contact_us') }}
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
