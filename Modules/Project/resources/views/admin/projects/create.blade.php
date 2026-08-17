@extends('components.layouts.dashboard')

@section('title', __('Project::words.create_project'))

@section('content')

    <div class="card">

        <div class="card-header">
            <h4>
                {{ __('Project::words.create_project') }}
            </h4>
        </div>

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        <form
            action="{{ route((app()->getLocale() . '.dashboard.projects.store')) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="card-body">

                {{-- Title --}}
                <div class="mb-3">

                    <label for="title" class="form-label">
                        {{ __('Project::words.en_title') }}
                    </label>

                    <input
                        type="text"
                        id="en_title"
                        name="en_name"
                        value="{{ old('en_title') }}"
                        class="form-control @error('en_title') is-invalid @enderror"
                    >

                    @error('en_title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label for="fa_title" class="form-label">
                        {{ __('Project::words.fa_title') }}
                    </label>

                    <input
                        type="text"
                        id="fa_title"
                        name="fa_name"
                        value="{{ old('fa_title') }}"
                        class="form-control @error('fa_title') is-invalid @enderror"
                    >

                    @error('fa_title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                {{-- Properties --}}
                <div class="mb-4">

                    <label class="form-label">
                        {{ __('Project::words.properties') }}
                    </label>

                    @forelse($properties as $property)

                        @php
                            $faValue = old("properties.{$property->id}.fa_value");
                            $enValue = old("properties.{$property->id}.en_value");

                            $selectedProperties = old('selected_properties', []);
                        @endphp

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="row align-items-center">

                                    {{-- Property --}}
                                    <div class="col-md-4">

                                        <div class="form-check">

                                            <input
                                                type="checkbox"
                                                name="properties[{{ $property->id }}][fa_value]"
                                                value="{{ $property->id }}"
                                                id="property-{{ $property->id }}"
                                                class="form-check-input"

                                                @checked(
                                                in_array(
                                                $property->id,
                                            $selectedProperties
                                            )
                                            )
                                            >

                                            <label
                                                for="property-{{ $property->id }}"
                                                class="form-check-label"
                                            >
                                                {{ $property->{app()->getLocale() . '_name'} }}
                                            </label>

                                        </div>

                                    </div>

                                    {{-- Persian Property Value --}}
                                    <div class="col-md-4">
                                        <input
                                            type="text"
                                            name="properties[{{ $property->id }}][fa_value]"
                                            value="{{ $faValue }}"
                                            class="form-control"
                                            placeholder="{{ __('Project::words.fa_property_value') }}"
                                        >
                                    </div>

                                    {{-- English Property Value --}}
                                    <div class="col-md-4">
                                        <input
                                            type="text"
                                            name="properties[{{ $property->id }}][en_value]"
                                            value="{{ $enValue }}"
                                            class="form-control"
                                            placeholder="{{ __('Project::words.english_property_value') }}"
                                        >
                                    </div>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="alert alert-secondary">
                            {{ __('Project::words.no_properties') }}
                        </div>

                    @endforelse

                    @error('selected_properties')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror

                    @error('properties.*')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                {{-- Description --}}
                <div class="mb-3">

                    <label for="description" class="form-label">
                        {{ __('Project::words.fa_description') }}
                    </label>

                    <textarea
                        id="slug"
                        name="fa_slug"
                        rows="6"
                        class="form-control @error('fa_slug') is-invalid @enderror"
                    >{{ old('fa_slug') }}</textarea>

                    @error('fa_slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label for="description" class="form-label">
                        {{ __('Project::words.en_description') }}
                    </label>

                    <textarea
                        id="slug"
                        name="en_slug"
                        rows="6"
                        class="form-control @error('en_slug') is-invalid @enderror"
                    >{{ old('en_slug') }}</textarea>

                    @error('en_slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                {{-- Images --}}
                <div class="mb-4">

                    <label for="images" class="form-label">
                        {{ __('Project::words.images') }}
                    </label>

                    <input
                        type="file"
                        id="images"
                        name="images[]"
                        multiple
                        accept="image/*"
                        class="form-control @error('images') is-invalid @enderror"
                    >

                    @error('images')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    @error('images.*')
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                    @enderror

                    <small class="text-muted">
                        {{ __('Project::words.multiple_images_hint') }}
                    </small>

                </div>



            </div>


            <div class="card-footer">

                <button
                    type="submit"
                    class="btn btn-success"
                >
                    {{ __('Project::words.save') }}
                </button>


                <a
                    href="{{ route((app()->getLocale() . '.dashboard.projects.index')) }}"
                    class="btn btn-secondary"
                >
                    {{ __('Project::words.back') }}
                </a>

            </div>

        </form>

    </div>

@endsection
