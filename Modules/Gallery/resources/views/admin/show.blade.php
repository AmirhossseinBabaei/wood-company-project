@extends('components.layouts.dashboard')

@section('title', __('Gallery::words.gallery_details'))

@section('content')

    <div class="row">

        <div class="col-xl-12">

            <div class="card">


                <div class="card-header d-flex justify-content-between align-items-center">

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


                    <h3 class="card-title">

                        {{ __('Gallery::words.gallery_details') }}

                    </h3>


                    <div>

                        <a href="{{ route('dashboard.galleries.edit',$gallery) }}"
                           class="btn btn-warning">

                            <i class="fe fe-edit"></i>

                            {{ __('Gallery::words.edit') }}

                        </a>


                        <a href="{{ route('dashboard.galleries.index') }}"
                           class="btn btn-secondary">

                            {{ __('Gallery::words.back') }}

                        </a>

                    </div>


                </div>



                <div class="card-body">


                    <div class="row">


                        {{-- Image --}}
                        <div class="col-md-4 mb-4">


                            <label class="form-label fw-bold">

                                {{ __('Gallery::words.image') }}

                            </label>


                            <div>


                                @if($gallery->image)

                                    <img src="{{ asset('storage/'.$gallery->image) }}"
                                         class="img-thumbnail"
                                         width="300">

                                @else

                                    <div class="alert alert-secondary">

                                        No Image

                                    </div>

                                @endif


                            </div>


                        </div>




                        {{-- Information --}}
                        <div class="col-md-8">


                            <div class="row">



                                <div class="col-md-6 mb-3">

                                    <label class="fw-bold">

                                        {{ __('Gallery::words.fa_title') }}

                                    </label>


                                    <p>

                                        {{ $gallery->fa_title }}

                                    </p>

                                </div>




                                <div class="col-md-6 mb-3">

                                    <label class="fw-bold">

                                        {{ __('Gallery::words.en_title') }}

                                    </label>


                                    <p>

                                        {{ $gallery->en_title }}

                                    </p>

                                </div>





                                <div class="col-md-6 mb-3">


                                    <label class="fw-bold">

                                        {{ __('Gallery::words.fa_description') }}

                                    </label>


                                    <p>

                                        {{ $gallery->fa_description }}

                                    </p>


                                </div>





                                <div class="col-md-6 mb-3">


                                    <label class="fw-bold">

                                        {{ __('Gallery::words.en_description') }}

                                    </label>


                                    <p>

                                        {{ $gallery->en_description }}

                                    </p>


                                </div>





                                <div class="col-md-6 mb-3">


                                    <label class="fw-bold">

                                        {{ __('Gallery::words.sort_order') }}

                                    </label>


                                    <p>

                                        {{ $gallery->sort_order }}

                                    </p>


                                </div>





                                <div class="col-md-6 mb-3">


                                    <label class="fw-bold">

                                        {{ __('Gallery::words.status') }}

                                    </label>


                                    <p>


                                        @if($gallery->status)

                                            <span class="badge bg-success">

                                            {{ __('Gallery::words.active') }}

                                        </span>

                                        @else

                                            <span class="badge bg-danger">

                                            {{ __('Gallery::words.inactive') }}

                                        </span>

                                        @endif


                                    </p>


                                </div>



                                <div class="col-md-6 mb-3">


                                    <label class="fw-bold">

                                        Created At

                                    </label>


                                    <p>

                                        {{ $gallery->created_at?->format('Y-m-d H:i') }}

                                    </p>


                                </div>



                                <div class="col-md-6 mb-3">


                                    <label class="fw-bold">

                                        Updated At

                                    </label>


                                    <p>

                                        {{ $gallery->updated_at?->format('Y-m-d H:i') }}

                                    </p>


                                </div>



                            </div>


                        </div>


                    </div>


                </div>


            </div>


        </div>


    </div>


@endsection
