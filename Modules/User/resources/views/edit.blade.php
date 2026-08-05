@extends('components.layouts.dashboard')


@section('title', __('User::words.edit_user'))


@section('content')


    <div class="card">


        <div class="card-header">

            {{ __('User::words.edit_user') }}

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
                  action="{{ route('dashboard.users.update',$user) }}">


                @csrf
                @method('PUT')


                <div class="mb-3">

                    <label>
                        {{ __('User::words.first_name') }}
                    </label>


                    <input type="text"
                           name="first_name"
                           class="form-control"
                           value="{{ $user->first_name }}">


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
                           value="{{ $user->last_name }}">


                    @error('last_name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror


                </div>

                <button class="btn btn-primary">

                    {{ __('User::words.update') }}

                </button>


            </form>


        </div>


    </div>


@endsection
