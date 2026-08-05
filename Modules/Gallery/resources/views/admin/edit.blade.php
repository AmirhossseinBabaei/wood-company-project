@extends('components.layouts.dashboard')

@section('title', __('Gallery::words.edit_gallery'))

@section('content')

    <div class="row">

        <div class="col-xl-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">
                        {{ __('Gallery::words.edit_gallery') }}
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
                        <div class="alert alert-danger">{{ session('success') }}</div>
                    @endif


                    <form action="{{ route('dashboard.galleries.update',$gallery) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')


                        <div class="row">


                            {{-- Persian Title --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    {{ __('Gallery::words.fa_title') }}
                                </label>

                                <input type="text"
                                       name="fa_title"
                                       value="{{ old('fa_title',$gallery->fa_title) }}"
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
                                       value="{{ old('en_title',$gallery->en_title) }}"
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
                                          class="form-control @error('fa_description') is-invalid @enderror">{{ old('fa_description',$gallery->fa_description) }}</textarea>


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
                                          class="form-control @error('en_description') is-invalid @enderror">{{ old('en_description',$gallery->en_description) }}</textarea>


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
                                       value="{{ old('sort_order',$gallery->sort_order) }}"
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


                                <label class="custom-switch">

                                    <select class="form-select">
                                        @if($gallery->status == "active")
                                            <option selected value="active">{{ __('Gallery::words.active') }}</option>
                                            <option value="inactive">{{ __('Gallery::words.inactive') }}</option>
                                        @else
                                            <option value="active">{{ __('Gallery::words.active') }}</option>
                                            <option selected value="inactive">{{ __('Gallery::words.inactive') }}</option>
                                        @endif

                                    </select>

                                    <span class="custom-switch-indicator"></span>


                                    <span class="custom-switch-description">
                                    {{ __('Gallery::words.active') }}
                                </span>


                                </label>


                            </div>





                            {{-- Current Image --}}
                            <div class="col-md-6 mb-3">


                                <label class="form-label">
                                    {{ __('Gallery::words.image') }}
                                </label>


                                @if($gallery->image)

                                    <div class="mb-3">

                                        <img src="{{ asset('storage/'.$gallery->image) }}"
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



                        </div>



                        <div class="mt-3">


                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="fe fe-save"></i>

                                {{ __('Gallery::words.update') }}

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
