@extends('components.layouts.dashboard')

@section('title', __('Project::words.project_details'))

@section('content')

    <div class="card">

        <div class="card-header">

            <h4>
                {{ __('Project::words.project_details') }}
            </h4>

        </div>


        <div class="card-body">


            {{-- Title --}}

            <div class="mb-4">

                <h5>
                    {{ __('Project::words.title') }}
                </h5>

                <p>
                    {{ $project->title }}
                </p>

            </div>


            {{-- Image --}}

            <div class="mb-4">

                <h5>
                    {{ __('Project::words.image') }}
                </h5>


                @if($project->images->isNotEmpty())

                    <div class="d-flex flex-wrap gap-3">

                        @foreach($project->images as $image)

                            <img
                                src="{{ asset('storage/' . $image->img_src) }}"
                                width="250"
                                height="180"
                                style="object-fit: cover"
                                class="rounded"
                                alt="{{ $project->title }}"
                            >

                        @endforeach

                    </div>

                @else

                    <p class="text-muted">
                        {{ __('Project::words.no_image') }}
                    </p>

                @endif

            </div>


            {{-- Description --}}

            <div class="mb-4">

                <h5>
                    {{ __('Project::words.description') }}
                </h5>

                <p>
                    {{ $project->description }}
                </p>

            </div>


            {{-- Properties --}}

            <div class="mb-4">

                <h5>
                    {{ __('Project::words.properties') }}
                </h5>


                @forelse($project->properties as $property)

                    <span class="badge bg-secondary me-1">

                    {{ $property->title }}

                </span>

                @empty

                    <p class="text-muted">

                        {{ __('Project::words.no_properties') }}

                    </p>

                @endforelse

            </div>


        </div>


        <div class="card-footer">

            <a href="{{ route('dashboard.projects.edit', $project) }}"
               class="btn btn-warning">

                {{ __('Project::words.edit') }}

            </a>


            <a href="{{ route((app()->getLocale() . '.dashboard.projects.index')) }}"
               class="btn btn-secondary">

                {{ __('Project::words.back') }}

            </a>

        </div>

    </div>

@endsection
