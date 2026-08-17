@extends('components.layouts.dashboard')

@section('title', __('ContactUs::words.contact_messages'))

@section('content')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>{{ __('ContactUs::words.contact_messages') }}</h4>
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
                    <th>{{ __('ContactUs::words.phone') }}</th>
                    <th>{{ __('ContactUs::words.email') }}</th>
                    <th>{{ __('ContactUs::words.status') }}</th>
                    <th width="150">{{ __('ContactUs::words.actions') }}</th>
                </tr>
                </thead>

                <tbody>

                @forelse($contacts as $contact)

                    <tr>

                        <td>{{ $contact->id }}</td>

                        <td>{{ $contact->full_name }}</td>

                        <td>{{ $contact->phone }}</td>

                        <td>{{ $contact->email }}</td>

                        <td>
                            @if($contact->is_read == "true")
                                <span class="badge bg-success text-black-50">
                                {{ __('ContactUs::words.read') }}
                            </span>
                            @else
                                <span class="badge bg-warning text-black-50">
                                {{ __('ContactUs::words.unread') }}
                            </span>
                            @endif
                        </td>

                        <td>

                            <a href="{{ route((app()->getLocale() . '.dashboard.contact-us.show'), $contact) }}"
                               class="btn btn-sm btn-primary">
                                {{ __('ContactUs::words.view') }}
                            </a>

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

            {{ $contacts->links() }}

        </div>
    </div>

@endsection
