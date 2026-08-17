@extends('components.layouts.dashboard')

@section('title', __('Project::words.projects'))

@section('content')

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4>
                {{ __('Project::words.projects') }}
            </h4>

            <a href="{{ route((app()->getLocale() . '.dashboard.projects.create')) }}"
               class="btn btn-primary">

                {{ __('Project::words.create_project') }}

            </a>

        </div>


        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead>

                    <tr>

                        <th>#</th>

                        <th>
                            {{ __('Project::words.fa_title') }}
                        </th>

                        <th>
                            {{ __('Project::words.en_title') }}
                        </th>

                        <th>
                            {{ __('Project::words.image') }}
                        </th>

                        <th>
                            {{ __('Project::words.properties') }}
                        </th>

                        <th>
                            {{ __('Project::words.actions') }}
                        </th>

                    </tr>

                    </thead>


                    <tbody>

                    @forelse($projects as $project)

                        <tr>

                            <td>
                                {{ $project->id }}
                            </td>


                            <td>
                                {{ $project->fa_name }}
                            </td>

                            <td>
                                {{ $project->en_name }}
                            </td>

                            <td>

                                @if($project->images->isNotEmpty())

                                    <img
                                        src="{{ asset('storage/' . $project->images->first()->img_src) }}"
                                        width="100"
                                        height="70"
                                        style="object-fit: cover"
                                        class="rounded"
                                        alt="{{ $project->title }}"
                                    >

                                @else

                                    <span class="text-muted">
                                    {{ __('Project::words.no_image') }}
                                </span>

                                @endif

                            </td>


                            <td>

                                @forelse($project->properties as $property)
                                    <span class="badge bg-secondary">
                                    {{ $property->{app()->getLocale() . "_name"} }}
                                </span>

                                @empty

                                    <span class="text-muted">
                                    {{ __('Project::words.no_properties') }}
                                </span>

                                @endforelse

                            </td>


                            <td>

                                <a href="{{ route((app()->getLocale() . '.dashboard.projects.edit'), $project) }}"
                                   class="btn btn-sm btn-warning">

                                    {{ __('Project::words.edit') }}

                                </a>


                                <form
                                    action="{{ route((app()->getLocale() . '.dashboard.projects.destroy'), $project) }}"
                                    method="POST"
                                    class="d-inline"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                    >

                                        {{ __('Project::words.delete') }}

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5"
                                class="text-center">

                                {{ __('Project::words.no_data') }}

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>


            {{ $projects->links() }}

        </div>

    </div>

@endsection
