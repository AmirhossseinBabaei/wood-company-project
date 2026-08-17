@extends('components.layouts.dashboard')

@section('title', __('Menu::words.menus'))

@section('content')

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                {{ __('Menu::words.menus') }}
            </h4>

            <a
                href="{{ route((app()->getLocale() .'.dashboard.menus.create')) }}"
                class="btn btn-primary"
            >
                {{ __('Menu::words.create_menu') }}
            </a>

        </div>


        <div class="card-body">

            @if($menus->count())

                <div class="table-responsive">

                    <table class="table table-bordered table-striped">

                        <thead>

                        <tr>

                            <th>#</th>

                            <th>
                                {{ __('Menu::words.title') }}
                            </th>

                            <th>
                                {{ __('Menu::words.url') }}
                            </th>

                            <th>
                                {{ __('Menu::words.position') }}
                            </th>

                            <th>
                                {{ __('Menu::words.sort_order') }}
                            </th>

                            <th>
                                {{ __('Menu::words.status') }}
                            </th>

                            <th>
                                {{ __('Menu::words.actions') }}
                            </th>

                        </tr>

                        </thead>


                        <tbody>

                        @foreach($menus as $menu)

                            <tr>

                                <td>
                                    {{ $menu->id }}
                                </td>

                                <td>
                                    {{ $menu->fa_title }}
                                </td>

                                <td>
                                    {{ $menu->fa_url }}
                                </td>

                                <td>
                                    {{ $menu->position }}
                                </td>

                                <td>
                                    {{ $menu->sort_order }}
                                </td>

                                <td>

                                    @if($menu->status === \Modules\Menu\Models\Menu::ACTIVE)

                                        <span class="badge bg-success">
                                            {{ __('Menu::words.active') }}
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            {{ __('Menu::words.inactive') }}
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <a
                                        href="{{ route((app()->getLocale() .'.dashboard.menus.show'), $menu) }}"
                                        class="btn btn-sm btn-info"
                                    >
                                        {{ __('Menu::words.view') }}
                                    </a>


                                    <a
                                        href="{{ route((app()->getLocale() . '.dashboard.menus.edit'), $menu) }}"
                                        class="btn btn-sm btn-warning"
                                    >
                                        {{ __('Menu::words.edit') }}
                                    </a>


                                    <form
                                        action="{{ route((app()->getLocale() . '.dashboard.menus.destroy'), $menu) }}"
                                        method="POST"
                                        class="d-inline"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('{{ __('Menu::words.confirm_delete') }}')"
                                        >
                                            {{ __('Menu::words.delete') }}
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>


                <div class="mt-3">

                    {{ $menus->links() }}

                </div>

            @else

                <div class="alert alert-secondary">

                    {{ __('Menu::words.no_menus') }}

                </div>

            @endif

        </div>

    </div>

@endsection
