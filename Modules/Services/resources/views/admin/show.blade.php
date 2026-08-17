@extends('components.layouts.dashboard')

@section('title', __('Services::words.service_details'))

@section('content')


    <div class="card">

        <div class="card-header">

            <h4>
                {{ __('Services::words.service_details') }}
            </h4>

        </div>


        <div class="card-body">


            <h5>
                {{ __('Services::words.fa_title') }}
            </h5>

            <p>
                {{ $service->fa_title }}
            </p>

            <h5>
                {{ __('Services::words.en_title') }}
            </h5>

            <p>
                {{ $service->en_title }}
            </p>

            <h5>
                {{ __('Services::words.image') }}
            </h5>


            @if($service->image)

                <img src="{{ asset('storage/'.$service->image) }}"
                     width="200">

            @endif



            <h5 class="mt-3">
                {{ __('Services::words.fa_description') }}
            </h5>


            <p>
                {{ $service->fa_description }}
            </p>

            <h5 class="mt-3">
                {{ __('Services::words.en_description') }}
            </h5>


            <p>
                {{ $service->en_description }}
            </p>

        </div>


        <div class="card-footer">

            <a href="{{ route((app()->getLocale() . '.dashboard.services.index')) }}"
               class="btn btn-secondary">

                {{ __('Services::words.back') }}

            </a>

        </div>


    </div>


@endsection
