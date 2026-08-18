@extends('components.layouts.dashboard')

@section('title', __('ContactUs::words.team_member_details'))

@section('content')

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4>{{ __('ContactUs::words.team_member_details') }}</h4>

            <a href="{{ route(app()->getLocale() . '.dashboard.team-members.edit', $teamMember) }}"
               class="btn btn-warning">
                {{ __('ContactUs::words.edit') }}
            </a>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 text-center mb-3">

                    @if($teamMember->image)

                        <img src="{{ asset('storage/' . $teamMember->image) }}"
                             alt="{{ $teamMember->full_name }}"
                             class="img-fluid rounded"
                             style="max-height: 300px;">

                    @else

                        <p>{{ __('ContactUs::words.no_image') }}</p>

                    @endif

                </div>

                <div class="col-md-8">

                    <table class="table table-bordered">

                        <tr>
                            <th>{{ __('ContactUs::words.full_name') }}</th>
                            <td>{{ $teamMember->full_name }}</td>
                        </tr>

                        <tr>
                            <th>{{ __('ContactUs::words.field') }}</th>
                            <td>{{ $teamMember->field }}</td>
                        </tr>

                        <tr>
                            <th>{{ __('ContactUs::words.status') }}</th>
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
                        </tr>

                    </table>

                </div>

            </div>

            <a href="{{ route(app()->getLocale() . '.dashboard.team-members.index') }}"
               class="btn btn-secondary">
                {{ __('ContactUs::words.back') }}
            </a>

        </div>

    </div>

@endsection
