@extends('components.layouts.dashboard')

@section('title', __('ContactUs::words.create_team_member'))

@section('content')

    <div class="card">

        <div class="card-header">
            <h4>{{ __('ContactUs::words.create_team_member') }}</h4>
        </div>

        <div class="card-body">

            <form action="{{ route(app()->getLocale() . '.dashboard.team-members.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="form-label">
                        {{ __('ContactUs::words.full_name') }}
                    </label>

                    <input type="text"
                           name="full_name"
                           value="{{ old('full_name') }}"
                           class="form-control @error('full_name') is-invalid @enderror">

                    @error('full_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        {{ __('ContactUs::words.field') }}
                    </label>

                    <input type="text"
                           name="field"
                           value="{{ old('field') }}"
                           class="form-control @error('field') is-invalid @enderror">

                    @error('field')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        {{ __('ContactUs::words.status') }}
                    </label>

                    <select name="status"
                            class="form-select @error('status') is-invalid @enderror">

                        <option value="">
                            {{ __('ContactUs::words.select_status') }}
                        </option>

                        <option value="active" @selected(old('status') === 'active')>
                        {{ __('ContactUs::words.active') }}
                        </option>

                        <option value="inactive" @selected(old('status') === 'inactive')>
                        {{ __('ContactUs::words.inactive') }}
                        </option>

                    </select>

                    @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        {{ __('ContactUs::words.image') }}
                    </label>

                    <input type="file"
                           name="image"
                           class="form-control @error('image') is-invalid @enderror">

                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">
                    {{ __('ContactUs::words.save') }}
                </button>

                <a href="{{ route(app()->getLocale() . '.dashboard.team-members.index') }}"
                   class="btn btn-secondary">
                    {{ __('ContactUs::words.back') }}
                </a>

            </form>

        </div>

    </div>

@endsection
