@extends('components.layouts.dashboard')

@section('title', __('Services::words.services'))

@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

    @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">

        <div class="card-header d-flex justify-content-between">
            <h4>{{ __('Services::words.services') }}</h4>

            <a href="{{ route((app()->getLocale() . '.dashboard.services.create')) }}"
               class="btn btn-primary">
                {{ __('Services::words.create_service') }}
            </a>
        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered">

                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('Services::words.fa_title') }}</th>
                    <th>{{ __('Services::words.en_title') }}</th>
                    <th>{{ __('Services::words.image') }}</th>
                    <th>{{ __('Services::words.actions') }}</th>
                </tr>
                </thead>


                <tbody>

                @forelse($services as $service)

                    <tr>

                        <td>{{ $service->id }}</td>

                        <td>{{ $service->fa_title }}</td>
                        <td>{{ $service->en_title }}</td>

                        <td>
                            @if($service->image)
                                <img src="{{ asset('storage/'.$service->image) }}"
                                     width="80">
                            @endif
                        </td>

                        <td>

                            <a href="{{ route((app()->getLocale() . '.dashboard.services.show'), $service) }}"
                               class="btn btn-sm btn-info">
                                {{ __('Services::words.view') }}
                            </a>

                            <a href="{{ route((app()->getLocale() . '.dashboard.services.edit'), $service) }}"
                               class="btn btn-sm btn-warning">
                                {{ __('Services::words.update') }}
                            </a>

                            <form class="d-inline"
                                  action="{{ route((app()->getLocale() . '.dashboard.services.destroy'), $service) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger">
                                    {{ __('Services::words.delete') }}
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4">
                            {{ __('Services::words.no_data') }}
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

            {{ $services->links() }}

        </div>

    </div>

@endsection
