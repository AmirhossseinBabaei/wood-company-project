@extends('components.layouts.dashboard')

@section('title', __('Services::words.create_service'))

@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

    <div class="card">

        <div class="card-header">
            <h4>
                {{ __('Services::words.create_service') }}
            </h4>
        </div>

        <form method="POST"
              action="{{ route((app()->getLocale() . '.dashboard.services.store')) }}"
              enctype="multipart/form-data">

            @csrf

            @if(isset($service))
                @method('PUT')
            @endif


            <div class="card-body">


                <div class="mb-3">

                    <label>
                        {{ __('Services::words.en_title') }}
                    </label>

                    <input type="text"
                           name="en_title"
                           class="form-control"
                           value="{{ old('en_title',$service->en_title ?? '') }}">

                </div>

                <div class="mb-3">

                    <label>
                        {{ __('Services::words.fa_title') }}
                    </label>

                    <input type="text"
                           name="fa_title"
                           class="form-control"
                           value="{{ old('fa_title',$service->fa_title ?? '') }}">

                </div>

                <div class="mb-3">

                    <label>
                        {{ __('Services::words.image') }}
                    </label>

                    <input type="file"
                           name="image"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>
                        {{ __('Services::words.fa_description') }}
                    </label>

                    <textarea name="fa_description"
                              class="form-control"
                              rows="5">{{ old('fa_description',$service->fa_description ?? '') }}</textarea>

                </div>

                <div class="mb-3">

                    <label>
                        {{ __('Services::words.en_description') }}
                    </label>

                    <textarea name="en_description"
                              class="form-control"
                              rows="5">{{ old('en_description',$service->en_description ?? '') }}</textarea>

                </div>


            </div>


            <div class="card-footer">

                <button class="btn btn-success">

                    {{ isset($service)
                        ? __('Services::words.update')
                        : __('Services::words.save') }}

                </button>


                <a href="{{ route((app()->getLocale() . '.dashboard.services.index')) }}"
                   class="btn btn-secondary">

                    {{ __('Services::words.back') }}

                </a>


            </div>


        </form>

    </div>

@endsection
