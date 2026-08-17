@extends('components.layouts.dashboard')

@section('title', __('Project::words.edit_property'))

@section('content')

    <div class="card">

        <div class="card-header">

            <h4>
                {{ __('Project::words.edit_property') }}
            </h4>

        </div>


        <form
            action="{{ route((app()->getLocale() . '.dashboard.properties.update'), $property) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            <div class="card-body">

                <div class="mb-3">

                    <label class="form-label">
                        {{ __('Project::words.fa_title') }}
                    </label>

                    <input
                        type="text"
                        name="fa_name"
                        class="form-control @error('fa_title') is-invalid @enderror"
                        value="{{ old('title', $property->fa_name) }}"
                    >

                    @error('fa_title')

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
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $property->en_name) }}"
                    >

                    @error('en_title')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror

                </div>

            </div>


            <div class="card-footer">

                <button type="submit"
                        class="btn btn-primary">

                    {{ __('Project::words.update') }}

                </button>


                <a href="{{ route((app()->getLocale() . '.dashboard.properties.index')) }}"
                   class="btn btn-secondary">

                    {{ __('Project::words.back') }}

                </a>

            </div>

        </form>

    </div>

@endsection
