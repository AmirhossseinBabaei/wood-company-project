@extends('components.layouts.dashboard')

@section('title', __('ContactUs::words.team_members'))

@section('content')

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4>{{ __('ContactUs::words.team_members') }}</h4>

            <a href="{{ route(app()->getLocale() . '.dashboard.team-members.create') }}"
               class="btn btn-success">
                {{ __('ContactUs::words.create') }}
            </a>

        </div>

        <div class="card-body table-responsive">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-hover align-middle">

                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('ContactUs::words.full_name') }}</th>
                    <th>{{ __('ContactUs::words.field') }}</th>
                    <th>{{ __('ContactUs::words.status') }}</th>
                    <th>{{ __('ContactUs::words.image') }}</th>
                    <th width="200">{{ __('ContactUs::words.actions') }}</th>
                </tr>
                </thead>

                <tbody>

                @forelse($teamMembers as $teamMember)

                    <tr>

                        <td>{{ $teamMember->id }}</td>

                        <td>{{ $teamMember->full_name }}</td>

                        <td>{{ $teamMember->field }}</td>

                        <td>
                            @if($teamMember->status === 'active')
                                <span class="badge bg-success">
                                    {{ __('ContactUs::words.active') }}
                                </span>
                            @else
                                <span class="badge bg-warning text-black-50">
                                    {{ __('ContactUs::words.inactive') }}
                                </span>
                            @endif
                        </td>

                        <td>
                            @if($teamMember->image)
                                <img src="{{ asset('storage/' . $teamMember->image) }}"
                                     alt="{{ $teamMember->full_name }}"
                                     width="60"
                                     height="60"
                                     class="rounded">
                            @else
                                -
                            @endif
                        </td>

                        <td>

                            <a href="{{ route(app()->getLocale() . '.dashboard.team-members.show', $teamMember) }}"
                               class="btn btn-sm btn-primary">
                                {{ __('ContactUs::words.view') }}
                            </a>

                            <a href="{{ route(app()->getLocale() . '.dashboard.team-members.edit', $teamMember) }}"
                               class="btn btn-sm btn-warning">
                                {{ __('ContactUs::words.edit') }}
                            </a>

                            <form action="{{ route(app()->getLocale() . '.dashboard.team-members.destroy', $teamMember) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('{{ __('ContactUs::words.confirm_delete') }}')">
                                    {{ __('ContactUs::words.delete') }}
                                </button>
                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center">
                            {{ __('ContactUs::words.no_data') }}
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

            {{ $teamMembers->links() }}

        </div>

    </div>

@endsection
