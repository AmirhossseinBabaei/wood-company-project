@extends('components.layouts.dashboard')

@section('title', __('Project::words.properties'))

@section('content')

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4>
                {{ __('Project::words.properties') }}
            </h4>

            <a href="{{ route((app()->getLocale() . '.dashboard.properties.create')) }}"
               class="btn btn-primary">

                {{ __('Project::words.create_property') }}

            </a>

        </div>

        <div class="card-body">

            @if(session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif


            <div class="table-responsive">

                <table class="table table-bordered table-hover">

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
                            {{ __('Project::words.actions') }}
                        </th>

                    </tr>

                    </thead>


                    <tbody>

                    @forelse($properties as $property)

                        <tr>

                            <td>
                                {{ $property->id }}
                            </td>

                            <td>
                                {{ $property->fa_name }}
                            </td>

                            <td>
                                {{ $property->en_name }}
                            </td>

                            <td>

                                <a href="{{ route((app()->getLocale() . '.dashboard.properties.edit'), $property) }}"
                                   class="btn btn-sm btn-warning">

                                    {{ __('Project::words.edit') }}

                                </a>


                                <form
                                    action="{{ route((app()->getLocale() . '.dashboard.properties.destroy'), $property) }}"
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

                            <td colspan="3"
                                class="text-center">

                                {{ __('Project::words.no_data') }}

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>


            {{ $properties->links() }}

        </div>

    </div>

@endsection
