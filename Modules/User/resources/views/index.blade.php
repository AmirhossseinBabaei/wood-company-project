@extends('components.layouts.dashboard')

@section('title', __('User::words.users'))


@section('content')

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-danger">{{ session('success') }}</div>
    @endif

    <div class="card">

        <div class="card-header d-flex justify-content-between">

            <h3 class="card-title">
                {{ __('User::words.users') }}
            </h3>

            <a href="{{ route((app()->getLocale() . '.dashboard.users.create')) }}"
               class="btn btn-primary">

                {{ __('User::words.create_user') }}

            </a>

        </div>


        <div class="card-body">


            @if(session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif



            <div class="table-responsive">


                <table class="table table-bordered">


                    <thead>

                    <tr>

                        <th>#</th>

                        <th>
                            {{ __('User::words.first_name') }}
                        </th>

                        <th>
                            {{ __('User::words.last_name') }}
                        </th>

                        <th>
                            {{ __('User::words.email') }}
                        </th>


                        <th>
                            {{ __('User::words.actions') }}
                        </th>

                    </tr>

                    </thead>

                    <tbody>


                    @forelse($users as $user)


                        <tr>

                            <td>
                                {{ $user->id }}
                            </td>


                            <td>
                                {{ $user->first_name }}
                            </td>

                            <td>
                                {{ $user->last_name }}
                            </td>

                            <td>
                                {{ $user->email }}
                            </td>


                            <td>

                                <a href="{{ route((app()->getLocale() . '.dashboard.users.show'),$user) }}"
                                   class="btn btn-info btn-sm">

                                    {{ __('User::words.view') }}

                                </a>


                                <a href="{{  route((app()->getLocale() . '.dashboard.users.edit'),$user) }}"
                                   class="btn btn-warning btn-sm">

                                    {{ __('User::words.edit_user') }}

                                </a>



                                <form action="{{  route((app()->getLocale() . '.dashboard.users.destroy'),$user) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')


                                    <button class="btn btn-danger btn-sm">

                                        {{ __('User::words.delete') }}

                                    </button>


                                </form>


                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td colspan="4" class="text-center">

                                {{ __('User::words.no_data') }}

                            </td>

                        </tr>


                    @endforelse


                    </tbody>


                </table>


            </div>


            {{ $users->links() }}


        </div>


    </div>


@endsection
