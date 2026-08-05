@extends('components.layouts.dashboard')

@section('title', __('Gallery::words.create_gallery'))

@section('content')

    <div class="row">

        <div class="col-xl-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">
                        {{ __('Gallery::words.create_gallery') }}
                    </h3>

                </div>


                <div class="card-body">

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif


                    <form action="{{ route('dashboard.galleries.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf


                        <div class="row">


                            {{-- Persian Title --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    {{ __('Gallery::words.fa_title') }}
                                </label>

                                <input type="text"
                                       name="fa_title"
                                       value="{{ old('fa_title') }}"
                                       class="form-control @error('fa_title') is-invalid @enderror">


                                @error('fa_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>


                            {{-- English Title --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    {{ __('Gallery::words.en_title') }}
                                </label>


                                <input type="text"
                                       name="en_title"
                                       value="{{ old('en_title') }}"
                                       class="form-control @error('en_title') is-invalid @enderror">


                                @error('en_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>


                            {{-- Persian Description --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    {{ __('Gallery::words.fa_description') }}
                                </label>


                                <textarea name="fa_description"
                                          rows="5"
                                          class="form-control @error('fa_description') is-invalid @enderror">{{ old('fa_description') }}</textarea>


                                @error('fa_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>


                            {{-- English Description --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    {{ __('Gallery::words.en_description') }}
                                </label>


                                <textarea name="en_description"
                                          rows="5"
                                          class="form-control @error('en_description') is-invalid @enderror">{{ old('en_description') }}</textarea>


                                @error('en_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>

                            {{-- Sort --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    {{ __('Gallery::words.sort_order') }}
                                </label>


                                <input type="number"
                                       name="sort_order"
                                       value="{{ old('sort_order',0) }}"
                                       class="form-control @error('sort_order') is-invalid @enderror">


                                @error('sort_order')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>

                            {{-- Status --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label d-block">
                                    {{ __('Gallery::words.status') }}
                                </label>

                                <select class="form-control">
                                    <option value="active">{{ __('Gallery::words.active') }}</option>
                                    <option value="inactive">{{ __('Gallery::words.inactive') }}</option>
                                </select>
                            </div>

                            {{-- Image --}}
                            <div class="col-md-12 mb-3">

                                <label class="form-label">
                                    {{ __('Gallery::words.image') }}
                                </label>

                                <input type="file"
                                       name="image"
                                       class="form-control @error('image') is-invalid @enderror">


                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>


                        </div>


                        <div class="mt-3">


                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="fe fe-save"></i>

                                {{ __('Gallery::words.save') }}

                            </button>


                            <a href="{{ route('dashboard.galleries.index') }}"
                               class="btn btn-secondary">

                                {{ __('Gallery::words.back') }}

                            </a>


                        </div>


                    </form>


                </div>

            </div>

        </div>

    </div>


@endsection
