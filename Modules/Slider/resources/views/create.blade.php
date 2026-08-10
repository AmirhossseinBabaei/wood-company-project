```blade
@extends('components.layouts.dashboard')

@section('title', __('Slider::words.create_slider'))

@section('content')

    <div class="card">

        <div class="card-header">

            <h4>
                {{ __('Slider::words.create_slider') }}
            </h4>

        </div>

        <form
            action="{{ route('dashboard.sliders.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

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
                        value="{{ old('fa_title') }}"
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
                        value="{{ old('en_title') }}"
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
                        value="{{ old('fa_slug') }}"
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
                        value="{{ old('en_slug') }}"
                        class="form-control @error('en_slug') is-invalid @enderror"
                    >

                    @error('en_slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>


                {{-- Image --}}
                <div class="mb-3">

                    <label
                        for="image"
                        class="form-label"
                    >
                        {{ __('Slider::words.image') }}
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
                    class="btn btn-success"
                >
                    {{ __('Slider::words.save') }}
                </button>

                <a
                    href="{{ route('dashboard.sliders.index') }}"
                    class="btn btn-secondary"
                >
                    {{ __('Slider::words.back') }}
                </a>

            </div>

        </form>

    </div>

@endsection
```
