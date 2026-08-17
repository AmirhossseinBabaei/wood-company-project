@extends('components.layouts.dashboard')

@section('title', __('Services::words.edit_service'))

@section('content')

    <div class="card">

        <div class="card-header">
            <h4>
                {{ __('Services::words.edit_service') }}
            </h4>
        </div>

        <form method="POST"
              action="{{ route((app()->getLocale() . '.dashboard.services.update'), $service) }}"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="card-body">


                <div class="mb-3">

                    <label class="form-label">
                        {{ __('Services::words.fa_title') }}
                    </label>

                    <input type="text"
                           name="fa_title"
                           class="form-control @error('fa_title') is-invalid @enderror"
                           value="{{ old('title', $service->fa_title) }}">

                    @error('fa_title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        {{ __('Services::words.en_title') }}
                    </label>

                    <input type="text"
                           name="en_title"
                           class="form-control @error('en_title') is-invalid @enderror"
                           value="{{ old('title', $service->en_title) }}">

                    @error('en_title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        {{ __('Services::words.image') }}
                    </label>


                    @if($service->image)

                        <div class="mb-2">
                            <img src="{{ asset('storage/'.$service->image) }}"
                                 width="150"
                                 class="rounded">
                        </div>

                    @endif


                    <input type="file"
                           name="image"
                           class="form-control @error('image') is-invalid @enderror">


                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>



                <div class="mb-3">

                    <label class="form-label">
                        {{ __('Services::words.fa_description') }}
                    </label>


                    <textarea name="fa_description"
                              rows="5"
                              class="form-control @error('fa_description') is-invalid @enderror">{{ old('fa_description', $service->fa_description) }}</textarea>


                    @error('fa_description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        {{ __('Services::words.en_description') }}
                    </label>


                    <textarea name="en_description"
                              rows="5"
                              class="form-control @error('en_description') is-invalid @enderror">{{ old('en_description', $service->en_description) }}</textarea>


                    @error('en_description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>


            </div>


            <div class="card-footer">

                <button class="btn btn-primary">

                    {{ __('Services::words.update') }}

                </button>


                <a href="{{ route((app()->getLocale() . '.dashboard.services.index')) }}"
                   class="btn btn-secondary">

                    {{ __('Services::words.back') }}

                </a>

            </div>


        </form>

    </div>

@endsection
