@extends('components.layouts.dashboard')

@section('title', __('ContactUs::words.message_details'))

@section('content')

    <div class="card">

        <div class="card-header">
            <h4>{{ __('ContactUs::words.message_details') }}</h4>
        </div>

        <div class="card-body">

            <div class="mb-3">
                <strong>{{ __('ContactUs::words.full_name') }} :</strong>
                {{ $contactMessage->full_name }}
            </div>

            <div class="mb-3">
                <strong>{{ __('ContactUs::words.phone') }} :</strong>
                {{ $contactMessage->phone }}
            </div>

            <div class="mb-3">
                <strong>{{ __('ContactUs::words.email') }} :</strong>
                {{ $contactMessage->email }}
            </div>

            <div class="mb-3">
                <strong>{{ __('ContactUs::words.message') }} :</strong>

                    {{ $contactMessage->message }}
            </div>

        </div>

        <div class="card-footer d-flex justify-content-end gap-2">

            @unless($contactMessage->is_read == "true")

                <form method="POST"
                      action="{{ route((app()->getLocale() . '.dashboard.contact-us.read'), $contactMessage) }}">

                    @csrf
                    @method('POST')

                    <button class="btn btn-success">
                        {{ __('ContactUs::words.confirm_read') }}
                    </button>

                </form>

            @endunless

            <a href="{{ route((app()->getLocale() . '.dashboard.contact-us.index')) }}"
               class="btn btn-secondary">
                {{ __('ContactUs::words.back') }}
            </a>

        </div>

    </div>

@endsection
