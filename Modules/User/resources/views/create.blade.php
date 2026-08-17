@extends('components.layouts.dashboard')

@section('title', __('User::words.create_user'))

@section('content')

    <div class="card">

        <div class="card-header">

            {{ __('User::words.create_user') }}

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

            <form method="POST"
                  action="{{ route((app()->getLocale() . '.dashboard.users.store')) }}">

                @csrf

                <div class="mb-3">

                    <label>
                        {{ __('User::words.first_name') }}
                    </label>


                    <input type="text"
                           name="first_name"
                           class="form-control"
                           value="{{ old('first_name') }}">


                    @error('first_name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror


                </div>

                <div class="mb-3">

                    <label>
                        {{ __('User::words.last_name') }}
                    </label>


                    <input type="text"
                           name="last_name"
                           class="form-control"
                           value="{{ old('last_name') }}">


                    @error('last_name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror


                </div>


                <div class="mb-3">

                    <label>
                        {{ __('User::words.email') }}
                    </label>


                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email') }}">


                </div>


                <div class="mb-3">

                    <label>
                        {{ __('User::words.password') }}
                    </label>


                    <input type="password"
                           name="password"
                           class="form-control">


                </div>


                <button class="btn btn-success">

                    {{ __('User::words.save') }}

                </button>


            </form>


        </div>


    </div>


@endsection
