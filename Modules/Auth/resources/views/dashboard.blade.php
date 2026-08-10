@extends('components.layouts.dashboard')

@section('title', __('Auth::words.dashboard'))

@section('styles')
    <style>
        @media (min-width: 992px) {
            .rtl .app-content {
                margin-left: inherit;
                margin-right: 125px;
            }
            .app-sidebar-toggle{
                display:none !important;
            }
        }

        @media all and (min-width: 100px) and (max-width: 992px)
        {
            .app-sidebar-toggle{
                display:block !important;
            }
        }
    </style>
@endsection

@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE HEADER -->
                <div class="page-header">
                    <h1 class="page-title">
                        {{ __('Auth::words.dashboard') }}
                    </h1>

                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0)">
                                    {{ __('Auth::words.dashboard') }}
                                </a>
                            </li>

                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('Auth::words.dashboard') }}
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE HEADER END -->


                <!-- STATISTICS -->
                <div class="row">

                    {{-- Users --}}
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">

                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-md bg-primary-transparent bradius">
                                            <i class="fe fe-users fs-20 text-primary"></i>
                                        </div>
                                    </div>

                                    <div class="ms-3">
                                        <p class="mb-1 text-muted">
                                            {{ __('Auth::words.users') }}
                                        </p>

                                        <h3 class="mb-0 fw-semibold">
                                            {{ number_format($data['counters']['users']) }}
                                        </h3>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- Projects --}}
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">

                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-md bg-success-transparent bradius">
                                            <i class="fe fe-briefcase fs-20 text-success"></i>
                                        </div>
                                    </div>

                                    <div class="ms-3">
                                        <p class="mb-1 text-muted">
                                            {{ __('Auth::words.projects') }}
                                        </p>

                                        <h3 class="mb-0 fw-semibold">
                                            {{ number_format($data['counters']['projects']) }}
                                        </h3>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- Contact Messages --}}
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">

                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-md bg-warning-transparent bradius">
                                            <i class="fe fe-mail fs-20 text-warning"></i>
                                        </div>
                                    </div>

                                    <div class="ms-3">
                                        <p class="mb-1 text-muted">
                                            {{ __('Auth::words.contact_messages') }}
                                        </p>

                                        <h3 class="mb-0 fw-semibold">
                                            {{ number_format($data['counters']['contact_messages_count']) }}
                                        </h3>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- Services --}}
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">

                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-md bg-danger-transparent bradius">
                                            <i class="fe fe-layers fs-20 text-danger"></i>
                                        </div>
                                    </div>

                                    <div class="ms-3">
                                        <p class="mb-1 text-muted">
                                            {{ __('Auth::words.services') }}
                                        </p>

                                        <h3 class="mb-0 fw-semibold">
                                            {{ number_format($data['counters']['services']) }}
                                        </h3>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- STATISTICS END -->


                <!-- PROJECTS + SERVICES -->
                <div class="row">

                    {{-- Latest Projects --}}
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">

                            <div class="card-header justify-content-between">
                                <h3 class="card-title">
                                    {{ __('Auth::words.latest_projects') }}
                                </h3>

                                <a href="{{ route('dashboard.projects.index') }}"
                                   class="btn btn-sm btn-primary">
                                    {{ __('Auth::words.view_all') }}
                                </a>
                            </div>

                            <div class="card-body">

                                @if($data['latest_projects']->count())

                                    <div class="table-responsive">
                                        <table class="table table-bordered text-nowrap mb-0">

                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>
                                                    {{ __('Auth::words.title') }}
                                                </th>
                                                <th>
                                                    {{ __('Auth::words.created_at') }}
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            @foreach($data['latest_projects'] as $project)

                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>

                                                    <td>
                                                        {{ $project->{app()->getLocale() . "_name"} ?? '-' }}
                                                    </td>

                                                    <td>
                                                        {{ $project->persianCreatedAt() ?? '-' }}
                                                    </td>
                                                </tr>

                                            @endforeach

                                            </tbody>

                                        </table>
                                    </div>

                                    <div class="mt-3">
                                        {{ $data['latest_projects']->links() }}
                                    </div>

                                @else

                                    <div class="text-center py-5">

                                        <i class="fe fe-folder fs-40 text-muted"></i>

                                        <p class="text-muted mt-3 mb-0">
                                            {{ __('Auth::words.no_projects') }}
                                        </p>

                                    </div>

                                @endif

                            </div>
                        </div>
                    </div>


                    {{-- Latest Services --}}
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">

                            <div class="card-header justify-content-between">
                                <h3 class="card-title">
                                    {{ __('Auth::words.latest_services') }}
                                </h3>

                                <a href="{{ route('dashboard.services.index') }}"
                                   class="btn btn-sm btn-success">
                                    {{ __('Auth::words.view_all') }}
                                </a>
                            </div>

                            <div class="card-body">

                                @if($data['latest_services']->count())

                                    <div class="table-responsive">
                                        <table class="table table-bordered text-nowrap mb-0">

                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>
                                                    {{ __('Auth::words.title') }}
                                                </th>
                                                <th>
                                                    {{ __('Auth::words.created_at') }}
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            @foreach($data['latest_services'] as $service)

                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>

                                                    <td>
                                                        {{ $service->{app()->getLocale() . '_title'} ?? '-' }}
                                                    </td>

                                                    <td>
                                                        {{ $service->created_at?->format('Y/m/d') ?? '-' }}
                                                    </td>
                                                </tr>

                                            @endforeach

                                            </tbody>

                                        </table>
                                    </div>

                                    <div class="mt-3">
                                        {{ $data['latest_services']->links() }}
                                    </div>

                                @else

                                    <div class="text-center py-5">

                                        <i class="fe fe-layers fs-40 text-muted"></i>

                                        <p class="text-muted mt-3 mb-0">
                                            {{ __('Auth::words.no_services') }}
                                        </p>

                                    </div>

                                @endif

                            </div>
                        </div>
                    </div>

                </div>
                <!-- PROJECTS + SERVICES END -->


                <!-- SLIDERS -->
                <div class="row">

                    <div class="col-xl-12">

                        <div class="card">

                            <div class="card-header justify-content-between">

                                <h3 class="card-title">
                                    {{ __('Auth::words.latest_sliders') }}
                                </h3>

                                <a href="{{ route('dashboard.sliders.index') }}"
                                   class="btn btn-sm btn-warning">
                                    {{ __('Auth::words.view_all') }}
                                </a>

                            </div>

                            <div class="card-body">

                                @if($data['latest_sliders']->count())

                                    <div class="table-responsive">
                                        <table class="table table-bordered text-nowrap mb-0">

                                            <thead>
                                            <tr>
                                                <th>#</th>

                                                <th>
                                                    {{ __('Auth::words.title') }}
                                                </th>

                                                <th>
                                                    {{ __('Auth::words.created_at') }}
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            @foreach($data['latest_sliders'] as $slider)

                                                <tr>

                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>

                                                    <td>
                                                        {{ $slider->{app()->getLocale() . "_title"} ?? "" }}
                                                    </td>

                                                    <td>
                                                        {{ $slider->persianCreatedAt() ?? '-' }}
                                                    </td>

                                                </tr>

                                            @endforeach

                                            </tbody>

                                        </table>
                                    </div>

                                    <div class="mt-3">
                                        {{ $data['latest_sliders']->links() }}
                                    </div>

                                @else

                                    <div class="text-center py-5">

                                        <i class="fe fe-image fs-40 text-muted"></i>

                                        <p class="text-muted mt-3 mb-0">
                                            {{ __('Auth::words.no_sliders') }}
                                        </p>

                                    </div>

                                @endif

                            </div>
                        </div>

                    </div>

                </div>
                <!-- SLIDERS END -->

            </div>
            <!-- CONTAINER END -->

        </div>
    </div>
@endsection
