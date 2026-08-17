```blade
@extends('components.layouts.dashboard')

@section('title', __('Slider::words.edit_slider'))

@section('content')

    <div class="card">

        <div class="card-header">

            <h4>
                {{ __('Slider::words.edit_slider') }}
            </h4>

        </div>

        <form
            action="{{ route((app()->getLocale() . '.dashboard.sliders.update'), $slider) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <div class="card-body">

                {{-- Persian Title --}}
                <div class="mb-3">

                    <label
                        for="fa_title"
                        class="form-label"
                    >
                        {{ __('Slider::words.fa_title') }}
                    </label>

                    <input
                        type="text"
                        name="fa_title"
                        id="fa_title"
                        value="{{ old('fa_title', $slider->fa_title) }}"
                        class="form-control @error('fa_title') is-invalid @enderror"
                    >

                    @error('fa_title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>


                {{-- English Title --}}
                <div class="mb-3">

                    <label
                        for="en_title"
                        class="form-label"
                    >
                        {{ __('Slider::words.en_title') }}
                    </label>

                    <input
                        type="text"
                        name="en_title"
                        id="en_title"
                        value="{{ old('en_title', $slider->en_title) }}"
                        class="form-control @error('en_title') is-invalid @enderror"
                    >

                    @error('en_title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>


                {{-- Persian Slug --}}
                <div class="mb-3">

                    <label
                        for="fa_slug"
                        class="form-label"
                    >
                        {{ __('Slider::words.fa_slug') }}
                    </label>

                    <input
                        type="text"
                        name="fa_slug"
                        id="fa_slug"
                        value="{{ old('fa_slug', $slider->fa_slug) }}"
                        class="form-control @error('fa_slug') is-invalid @enderror"
                    >

                    @error('fa_slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>


                {{-- English Slug --}}
                <div class="mb-3">

                    <label
                        for="en_slug"
                        class="form-label"
                    >
                        {{ __('Slider::words.en_slug') }}
                    </label>

                    <input
                        type="text"
                        name="en_slug"
                        id="en_slug"
                        value="{{ old('en_slug', $slider->en_slug) }}"
                        class="form-control @error('en_slug') is-invalid @enderror"
                    >

                    @error('en_slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>


                {{-- Current Image --}}
                @if($slider->image)

                    <div class="mb-3">

                        <label class="form-label">
                            {{ __('Slider::words.current_image') }}
                        </label>

                        <div>

                            <img
                                src="{{ asset('storage/' . $slider->image) }}"
                                alt="{{ $slider->fa_title }}"
                                width="250"
                                height="140"
                                style="object-fit: cover;"
                                class="rounded border"
                            >

                        </div>

                    </div>

                @endif


                {{-- New Image --}}
                <div class="mb-3">

                    <label
                        for="image"
                        class="form-label"
                    >
                        {{ __('Slider::words.new_image') }}
                    </label>

                    <input
                        type="file"
                        name="image"
                        id="image"
                        accept="image/*"
                        class="form-control @error('image') is-invalid @enderror"
                    >

                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

            </div>


            <div class="card-footer">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    {{ __('Slider::words.update') }}
                </button>

                <a
                    href="{{ route((app()->getLocale() . '.dashboard.sliders.index')) }}"
                    class="btn btn-secondary"
                >
                    {{ __('Slider::words.back') }}
                </a>

            </div>

        </form>

    </div>

@endsection
```
