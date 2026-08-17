@extends('components.layouts.dashboard')


@section('title', __('User::words.user_details'))



@section('content')

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

    <div class="card">


        <div class="card-header">

            {{ __('User::words.user_details') }}

        </div>



        <div class="card-body">


            <p>
                <strong>
                    {{ __('User::words.name') }}:
                </strong>

                {{ $user->name }}

            </p>



            <p>

                <strong>
                    {{ __('User::words.email') }}:
                </strong>

                {{ $user->email }}

            </p>



            <p>

                <strong>
                    {{ __('User::words.created_at') }}:
                </strong>

                {{ $user->created_at ?? '-' }}

            </p>



            <a href="{{ route((app()->getLocale() . '.dashboard.users.index')) }}"
               class="btn btn-secondary">

                {{ __('User::words.back') }}

            </a>



        </div>


    </div>


@endsection
