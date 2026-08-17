@extends('components.layouts.dashboard')

@section('title', __('Project::words.edit_project'))

@section('content')

    <div class="card">

        <div class="card-header">

            <h4>
                {{ __('Project::words.edit_project') }}
            </h4>

        </div>

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        <form
            action="{{ route((app()->getLocale() . '.dashboard.projects.update'), $project) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')


            <div class="card-body">

                {{-- Title --}}
                <div class="mb-3">

                    <label
                        for="fa_name"
                        class="form-label"
                    >
                        {{ __('Project::words.fa_name') }}
                    </label>


                    <input
                        type="text"
                        id="fa_name"
                        name="fa_name"
                        value="{{ old('title', $project->fa_name) }}"
                        class="form-control @error('fa_name') is-invalid @enderror"
                    >


                    @error('fa_name')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror

                </div>
                <div class="mb-3">

                    <label
                        for="en_name"
                        class="form-label"
                    >
                        {{ __('Project::words.en_name') }}
                    </label>


                    <input
                        type="text"
                        id="en_name"
                        name="en_name"
                        value="{{ old('title', $project->en_name) }}"
                        class="form-control @error('en_name') is-invalid @enderror"
                    >


                    @error('en_name')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror

                </div>


                {{-- Description --}}
                <div class="mb-3">

                    <label
                        for="description"
                        class="form-label"
                    >
                        {{ __('Project::words.fa_description') }}
                    </label>


                    <textarea
                        id="fa_slug"
                        name="fa_slug"
                        rows="6"
                        class="form-control @error('slug') is-invalid @enderror"
                    >{{ old('slug', $project->fa_slug) }}</textarea>


                    @error('fa_slug')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror

                </div>

                <div class="mb-3">

                    <label
                        for="en_slug"
                        class="form-label"
                    >
                        {{ __('Project::words.en_description') }}
                    </label>


                    <textarea
                        id="en_slug"
                        name="en_slug"
                        rows="6"
                        class="form-control @error('en_slug') is-invalid @enderror"
                    >{{ old('slug', $project->en_slug) }}</textarea>


                    @error('en_slug')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror

                </div>


                {{-- Current Images --}}
                <div class="mb-4">

                    <label class="form-label">

                        {{ __('Project::words.current_images') }}

                    </label>


                    @if($project->images->isNotEmpty())

                        <div class="row g-3">

                            @foreach($project->images as $image)

                                <div class="col-md-3">

                                    <div class="card d-flex align-items-center justify-content-center">

                                        <img
                                            src="{{ asset('storage/' . $image->img_src) }}"
                                            alt="{{ $project->title }}"
                                            class="card-img-top"
                                            style="
                                            height: 100px;
                                            object-fit: cover;
                                            width:100px
                                        "
                                        >

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="alert alert-secondary">

                            {{ __('Project::words.no_image') }}

                        </div>

                    @endif

                </div>


                {{-- New Images --}}
                <div class="mb-4">

                    <label
                        for="images"
                        class="form-label"
                    >

                        {{ __('Project::words.add_images') }}

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

                    <div class="text-danger mt-2">

                        {{ $message }}

                    </div>

                    @enderror


                    <small class="text-muted">

                        {{ __('Project::words.multiple_images_hint') }}

                    </small>

                </div>


                {{-- Properties --}}
                <div class="mb-4">

                    <label class="form-label">

                        {{ __('Project::words.properties') }}

                    </label>


                    @forelse($properties as $property)

                        @php

                            $projectProperty = $project->properties
                                ->firstWhere('id', $property->id);

                            $pivotValue = $projectProperty?->pivot?->value;

                            $oldValue = old(
                                "properties.{$property->id}",
                                $pivotValue
                            );

                            $selectedProperties = old(
                                'selected_properties',
                                $project->properties
                                    ->pluck('id')
                                    ->toArray()
                            );

                        @endphp


                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="row align-items-center">


                                    {{-- Property --}}
                                    <div class="col-md-4">

                                        <div class="form-check">

                                            <input
                                                type="checkbox"
                                                name="selected_properties[]"
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
                                                {{ $property->{app()->getLocale() . "_name"} }}

                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                            <input
                                                type="text"
                                                name="properties[{{ $property->id }}][fa_value]"
                                                value="{{ $property->projectProperty($project->id)->fa_value ?? '' }}"
                                                class="form-control"
                                                placeholder="{{ __('Project::words.english_property_value') }}"
                                            >
                                    </div>
                                    <div class="col-md-4">
                                        <input
                                            type="text"
                                            name="properties[{{ $property->id }}][en_value]"
                                            value="{{ $property->projectProperty($project->id)->en_value }}"
                                            class="form-control mb"
                                            placeholder="{{ __('Project::words.fa_property_value') }}"
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

            </div>


            {{-- Footer --}}
            <div class="card-footer">

                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    {{ __('Project::words.update') }}

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
