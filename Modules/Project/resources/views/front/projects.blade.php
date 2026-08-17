@extends('project::components.layouts.master')

@section('title', __('Project::words.projects'))

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/gallery.css') }}">

    <style>
        /* =========================================================
           PROJECTS PAGE
        ========================================================== */

        .projects-page {
            --primary: #111827;
            --secondary: #667085;
            --muted: #98a2b3;
            --border: rgba(16, 24, 40, .08);
            --surface: #fff;

            position: relative;
            padding: 75px 0 110px;

            background: radial-gradient(
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
           HEADER
        ========================================================== */

        .projects-header {
            max-width: 760px;
            margin: 0 auto 55px;
            padding: 0 20px;
            text-align: center;
        }

        .projects-header-badge {
            display: inline-flex;
            align-items: center;
            gap: 9px;

            margin-bottom: 20px;
            padding: 8px 15px;

            border: 1px solid var(--border);
            border-radius: 999px;

            background: rgba(255, 255, 255, .78);

            color: var(--secondary);

            font-size: 11px;
            font-weight: 800;

            letter-spacing: .1em;
            text-transform: uppercase;

            box-shadow: 0 8px 25px rgba(16, 24, 40, .04);

            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .projects-header-badge::before {
            content: "";

            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: var(--primary);

            box-shadow: 0 0 0 5px rgba(17, 24, 39, .07);
        }

        .projects-header h2 {
            margin: 0;

            color: var(--primary);

            font-size: clamp(34px, 4vw, 54px);
            font-weight: 900;

            line-height: 1.12;
            letter-spacing: -.04em;
        }

        .projects-header h4 {
            max-width: 620px;

            margin: 20px auto 0;

            color: var(--secondary);

            font-size: 15px;
            font-weight: 400;

            line-height: 2;
        }

        /* =========================================================
           CONTAINER
        ========================================================== */

        .project-container {
            width: min(1180px, 92%);
            margin: 0 auto;
        }

        /* =========================================================
           GRID
        ========================================================== */

        .project-wrapper {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 28px;
        }

        /* =========================================================
           LINK
        ========================================================== */

        .project-link {
            display: block;

            height: 100%;

            color: inherit;
            text-decoration: none !important;

            outline: none;
        }

        /* =========================================================
           CARD
        ========================================================== */

        .project-card {
            position: relative;

            display: flex;
            flex-direction: column;

            height: 100%;

            overflow: hidden;

            background: var(--surface);

            border: 1px solid var(--border);
            border-radius: 24px;

            box-shadow: 0 5px 15px rgba(16, 24, 40, .035),
            0 18px 45px rgba(16, 24, 40, .055);

            transform: translateY(0);

            transition: transform .45s cubic-bezier(.2, .8, .2, 1),
            box-shadow .45s cubic-bezier(.2, .8, .2, 1),
            border-color .35s ease;
        }

        .project-link:hover .project-card {
            transform: translateY(-9px);

            border-color: rgba(16, 24, 40, .14);

            box-shadow: 0 12px 25px rgba(16, 24, 40, .06),
            0 32px 70px rgba(16, 24, 40, .12);
        }

        .project-link:focus-visible .project-card {
            outline: 3px solid rgba(17, 24, 39, .18);
            outline-offset: 5px;
        }

        /* =========================================================
           IMAGE
        ========================================================== */

        .project-image-box {
            position: relative;

            width: 100%;
            height: 270px;

            overflow: hidden;

            background: #eef0f3;
        }

        .project-image {
            width: 100%;
            height: 100%;

            display: block;

            object-fit: cover;

            transform: scale(1);

            transition: transform .8s cubic-bezier(.2, .8, .2, 1),
            filter .5s ease;
        }

        .project-link:hover .project-image {
            transform: scale(1.08);
            filter: saturate(1.08);
        }

        .project-image-overlay {
            position: absolute;
            inset: 0;

            background: linear-gradient(
                to top,
                rgba(0, 0, 0, .38),
                transparent 48%
            );

            pointer-events: none;

            transition: opacity .4s ease;
        }

        .project-link:hover .project-image-overlay {
            opacity: .55;
        }

        /* =========================================================
           BADGE
        ========================================================== */

        .project-image-badge {
            position: absolute;

            top: 17px;
            right: 17px;

            z-index: 3;

            display: inline-flex;
            align-items: center;
            gap: 7px;

            padding: 8px 12px;

            border: 1px solid rgba(255, 255, 255, .22);
            border-radius: 999px;

            background: rgba(0, 0, 0, .3);

            color: #fff;

            font-size: 10px;
            font-weight: 800;

            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .project-image-badge::before {
            content: "";

            width: 5px;
            height: 5px;

            border-radius: 50%;

            background: #fff;
        }

        /* =========================================================
           VIEW BUTTON
        ========================================================== */

        .project-view-icon {
            position: absolute;

            left: 50%;
            top: 50%;

            z-index: 4;

            width: 56px;
            height: 56px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: rgba(255, 255, 255, .95);

            color: #111827;

            font-size: 20px;
            font-weight: 700;

            opacity: 0;

            transform: translate(-50%, -40%) scale(.7);

            box-shadow: 0 15px 40px rgba(0, 0, 0, .2);

            transition: opacity .3s ease,
            transform .45s cubic-bezier(.2, .8, .2, 1);
        }

        .project-link:hover .project-view-icon {
            opacity: 1;

            transform: translate(-50%, -50%) scale(1);
        }

        /* =========================================================
           CONTENT
        ========================================================== */

        .project-content {
            display: flex;
            flex-direction: column;
            flex: 1;

            padding: 25px 25px 22px;
        }

        .project-title {
            margin: 0 0 10px;

            color: var(--primary);

            font-size: 20px;
            font-weight: 800;

            line-height: 1.5;
            letter-spacing: -.02em;

            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;

            overflow: hidden;
        }

        .project-description {
            margin: 0;

            color: var(--secondary);

            font-size: 14px;
            line-height: 1.9;

            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;

            overflow: hidden;
        }

        /* =========================================================
           FOOTER
        ========================================================== */

        .project-card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-top: auto;
            padding-top: 22px;
        }

        .project-card-label {
            color: var(--muted);

            font-size: 12px;
            font-weight: 600;
        }

        .project-card-action {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            color: var(--primary);

            font-size: 13px;
            font-weight: 800;

            transition: gap .3s ease;
        }

        .project-card-action-arrow {
            display: inline-flex;

            transition: transform .3s ease;
        }

        .project-link:hover .project-card-action {
            gap: 12px;
        }

        .project-link:hover .project-card-action-arrow {
            transform: translateX(4px);
        }

        /* =========================================================
           EMPTY STATE
        ========================================================== */

        .projects-empty {
            padding: 75px 25px;

            text-align: center;

            background: rgba(255, 255, 255, .7);

            border: 1px dashed rgba(16, 24, 40, .12);
            border-radius: 24px;
        }

        .projects-empty-icon {
            width: 65px;
            height: 65px;

            margin: 0 auto 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 20px;

            background: #f1f2f4;

            color: #667085;

            font-size: 26px;
        }

        .projects-empty h3 {
            margin: 0 0 8px;

            color: var(--primary);

            font-size: 20px;
            font-weight: 800;
        }

        .projects-empty p {
            margin: 0;

            color: var(--secondary);

            font-size: 14px;
        }

        /* =========================================================
           TABLET
        ========================================================== */

        @media (max-width: 1100px) {

            .project-wrapper {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 24px;
            }

            .project-image-box {
                height: 255px;
            }
        }

        /* =========================================================
           MOBILE
        ========================================================== */

        @media (max-width: 700px) {

            .projects-page {
                padding: 50px 0 75px;
            }

            .projects-header {
                margin-bottom: 40px;
            }

            .projects-header h2 {
                font-size: 35px;
            }

            .projects-header h4 {
                margin-top: 15px;
                font-size: 14px;
            }

            .project-wrapper {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .project-image-box {
                height: 250px;
            }
        }

        @media (max-width: 480px) {

            .project-container {
                width: 94%;
            }

            .projects-header {
                padding: 0 10px;
            }

            .projects-header h2 {
                font-size: 30px;
            }

            .project-image-box {
                height: 220px;
            }

            .project-content {
                padding: 21px 20px 20px;
            }

            .project-title {
                font-size: 18px;
            }
        }

        /* =========================================================
           REDUCED MOTION
        ========================================================== */

        @media (prefers-reduced-motion: reduce) {

            .project-card,
            .project-image,
            .project-view-icon,
            .project-card-action,
            .project-card-action-arrow {
                transition: none !important;
            }
        }
    </style>
@endsection


@section('content')

    <main class="projects-page">

        <section class="projects-gallery">

            {{-- =========================
                 Header
            ========================== --}}

            <header class="projects-header">

                <div class="projects-header-badge">
                    {{ __('Project::words.projects') }}
                </div>

                <h2>
                    {{ __('Project::words.projects') }}
                </h2>

                <h4>
                    {{ __('Project::words.projects_desc') }}
                </h4>

            </header>
            {{-- =========================
                 Projects
            ========================== --}}
            <div class="project-container">
                @if($projects && $projects->count())
                    <div class="project-wrapper">
                        @foreach($projects as $project)

                            @php

                                $locale = app()->getLocale();

                                $projectName =
                                    $project->{$locale . '_name'};

                                $projectDescription =
                                    $project->{$locale . '_slug'};

                                $projectUrl = route((app()->getLocale() . '.projects.show'), [
                                    'name' => str_replace(
                                        ' ',
                                        '-',
                                        $projectName
                                    ),
                                    'id' => $project->id
                                ]);

                                $projectImage =
                                    $project->images[0]->img_src ?? null;

                            @endphp


                            <a
                                href="{{ $projectUrl }}"
                                class="project-link"
                                target="_blank"
                                rel="noopener noreferrer"
                            >

                                <article class="project-card">

                                    {{-- =========================
                                         Image
                                    ========================== --}}

                                    <div class="project-image-box">

                                        @if($projectImage)

                                            <img
                                                class="project-image"
                                                src="{{ asset('storage/' . $projectImage) }}"
                                                alt="{{ $projectName }}"
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


                                        <div class="project-image-overlay"></div>


                                        {{-- Badge --}}

                                        <div class="project-image-badge">
                                            {{ __('Project::words.projects') }}
                                        </div>


                                        {{-- Hover button --}}

                                        <div
                                            class="project-view-icon"
                                            aria-hidden="true"
                                        >
                                            →
                                        </div>

                                    </div>


                                    {{-- =========================
                                         Content
                                    ========================== --}}

                                    <div class="project-content">

                                        <h3 class="project-title">
                                            {{ $projectName }}
                                        </h3>

                                        <p class="project-description">
                                            {{ $projectDescription }}
                                        </p>


                                        {{-- =========================
                                             Footer
                                        ========================== --}}

                                        <div class="project-card-footer">

                                            <span class="project-card-label">
                                                {{ __('مشاهده پروژه') }}
                                            </span>

                                            <span class="project-card-action">

                                                <span>
                                                    {{ __('جزئیات') }}
                                                </span>

                                                <span class="project-card-action-arrow">
                                                    →
                                                </span>

                                            </span>

                                        </div>

                                    </div>

                                </article>

                            </a>

                        @endforeach

                    </div>

                @else
                    {{-- =========================
                         Empty State
                    ========================== --}}

                    <div class="projects-empty">

                        <div class="projects-empty-icon">
                            ◇
                        </div>

                        <h3>
                            پروژه‌ای وجود ندارد
                        </h3>

                        <p>
                            در حال حاضر پروژه‌ای برای نمایش وجود ندارد.
                        </p>

                    </div>

                @endif

            </div>

        </section>
        <div class="col-12 d-flex align-items-center justify-content-center mb-5 mt-5">
            <div class="simple-pagination">

                @if($projects->onFirstPage())
                    <button class="btn btn-danger text-white">
            <span class="simple-pagination__btn disabled">
             {{ __('messages.previous') }}
        </span>
                    </button>
                @else
                    <button class="btn btn-danger text-black">

                        <a href="{{ $projects->previousPageUrl() }}"
                           class="simple-pagination__btn text-decoration-none text-white">
                            {{ __('messages.previous') }}
                        </a>
                    </button>
                @endif

                @if($projects->hasMorePages())
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
    </main>

@endsection


@section('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const cards = document.querySelectorAll('.project-card');

            if (!cards.length) {
                return;
            }

            /*
             * Entrance animation
             */

            cards.forEach(function (card, index) {

                card.style.opacity = '0';
                card.style.transform = 'translateY(25px)';

                setTimeout(function () {

                    card.style.transition =
                        'opacity .6s ease, transform .6s cubic-bezier(.2,.8,.2,1)';

                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';

                }, 80 + (index * 70));

            });

        });
    </script>

@endsection
