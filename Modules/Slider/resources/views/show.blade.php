```blade
@extends('components.layouts.dashboard')

@section('title', __('Slider::words.slider_details'))

@section('content')

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                {{ __('Slider::words.slider_details') }}
            </h4>

            <a
                href="{{ route('dashboard.sliders.edit', $slider) }}"
                class="btn btn-warning"
            >
                {{ __('Slider::words.edit') }}
            </a>

        </div>


        <div class="card-body">

            <div class="row">

                {{-- Image --}}
                <div class="col-md-12 mb-4">

                    <strong class="d-block mb-2">
                        {{ __('Slider::words.image') }}
                    </strong>

                    @if($slider->image)

                        <img
                            src="{{ asset('storage/' . $slider->image) }}"
                            alt="{{ $slider->fa_title }}"
                            class="img-fluid rounded border"
                            style="max-width: 500px;"
                        >

                    @else

                        <span class="text-muted">
                        {{ __('Slider::words.no_image') }}
                    </span>

                    @endif

                </div>


                {{-- Persian Title --}}
                <div class="col-md-6 mb-3">

                    <strong>
                        {{ __('Slider::words.fa_title') }}:
                    </strong>

                    <div>
                        {{ $slider->fa_title ?: '-' }}
                    </div>

                </div>


                {{-- English Title --}}
                <div class="col-md-6 mb-3">

                    <strong>
                        {{ __('Slider::words.en_title') }}:
                    </strong>

                    <div>
                        {{ $slider->en_title ?: '-' }}
                    </div>

                </div>


                {{-- Persian Slug --}}
                <div class="col-md-6 mb-3">

                    <strong>
                        {{ __('Slider::words.fa_slug') }}:
                    </strong>

                    <div>
                        {{ $slider->fa_slug ?: '-' }}
                    </div>

                </div>


                {{-- English Slug --}}
                <div class="col-md-6 mb-3">

                    <strong>
                        {{ __('Slider::words.en_slug') }}:
                    </strong>

                    <div>
                        {{ $slider->en_slug ?: '-' }}
                    </div>

                </div>

            </div>

        </div>


        <div class="card-footer">

            <a
                href="{{ route('dashboard.sliders.index') }}"
                class="btn btn-secondary"
            >
                {{ __('Slider::words.back') }}
            </a>

        </div>

    </div>

@endsection
```
