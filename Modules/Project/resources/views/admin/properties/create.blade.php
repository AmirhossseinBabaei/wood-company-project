@extends('components.layouts.dashboard')

@section('title', __('Project::words.create_property'))

@section('content')

    <div class="card">

        <div class="card-header">

            <h4>
                {{ __('Project::words.create_property') }}
            </h4>

        </div>


        <form
            action="{{ route((app()->getLocale() . '.dashboard.properties.store')) }}"
            method="POST"
        >

            @csrf


            <div class="card-body">

                <div class="mb-3">

                    <label class="form-label">
                        {{ __('Project::words.fa_title') }}
                    </label>

                    <input
                        type="text"
                        name="fa_name"
                        class="form-control @error('fa_name') is-invalid @enderror"
                        value="{{ old('title') }}"
                    >

                    @error('title')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        {{ __('Project::words.en_title') }}
                    </label>

                    <input
                        type="text"
                        name="en_name"
                        class="form-control @error('en_title') is-invalid @enderror"
                        value="{{ old('title') }}"
                    >

                    @error('title')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror

                </div>
            </div>


            <div class="card-footer">

                <button type="submit"
                        class="btn btn-success">

                    {{ __('Project::words.save') }}

                </button>


                <a href="{{ route((app()->getLocale() . '.dashboard.properties.index')) }}"
                   class="btn btn-secondary">

                    {{ __('Project::words.back') }}

                </a>

            </div>

        </form>

    </div>

@endsection
