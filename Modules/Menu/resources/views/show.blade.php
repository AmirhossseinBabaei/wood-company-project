@extends('components.layouts.dashboard')

@section('title', __('Menu::words.menu_details'))

@section('content')

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                {{ __('Menu::words.menu_details') }}
            </h4>


            <a
                href="{{ route((app()->getLocale() . '.dashboard.menus.edit'), $menu) }}"
                class="btn btn-warning"
            >
                {{ __('Menu::words.edit') }}
            </a>

        </div>


        <div class="card-body">

            <div class="row">

                {{-- Persian Title --}}
                <div class="col-md-6 mb-3">

                    <strong>
                        {{ __('Menu::words.fa_title') }}:
                    </strong>

                    <div>
                        {{ $menu->fa_title ?: '-' }}
                    </div>

                </div>


                {{-- English Title --}}
                <div class="col-md-6 mb-3">

                    <strong>
                        {{ __('Menu::words.en_title') }}:
                    </strong>

                    <div>
                        {{ $menu->en_title ?: '-' }}
                    </div>

                </div>


                {{-- Persian URL --}}
                <div class="col-md-6 mb-3">

                    <strong>
                        {{ __('Menu::words.fa_url') }}:
                    </strong>

                    <div>
                        {{ $menu->fa_url ?: '-' }}
                    </div>

                </div>


                {{-- English URL --}}
                <div class="col-md-6 mb-3">

                    <strong>
                        {{ __('Menu::words.en_url') }}:
                    </strong>

                    <div>
                        {{ $menu->en_url ?: '-' }}
                    </div>

                </div>


                {{-- Parent --}}
                <div class="col-md-6 mb-3">

                    <strong>
                        {{ __('Menu::words.parent') }}:
                    </strong>

                    <div>
                        {{ $menu->parent?->fa_title ?: __('Menu::words.no_parent') }}
                    </div>

                </div>


                {{-- Sort Order --}}
                <div class="col-md-6 mb-3">

                    <strong>
                        {{ __('Menu::words.sort_order') }}:
                    </strong>

                    <div>
                        {{ $menu->sort_order }}
                    </div>

                </div>


                {{-- Position --}}
                <div class="col-md-6 mb-3">

                    <strong>
                        {{ __('Menu::words.position') }}:
                    </strong>

                    <div>

                        @if($menu->position === 'header')

                            {{ __('Menu::words.header') }}

                        @elseif($menu->position === 'footer')

                            {{ __('Menu::words.footer') }}

                        @else

                            {{ $menu->position ?: '-' }}

                        @endif

                    </div>

                </div>


                {{-- Status --}}
                <div class="col-md-6 mb-3">

                    <strong>
                        {{ __('Menu::words.status') }}:
                    </strong>

                    <div>

                        @if($menu->status == \Modules\Menu\Models\Menu::ACTIVE)

                            <span class="badge bg-success">
                            {{ __('Menu::words.active') }}
                        </span>

                        @else

                            <span class="badge bg-danger">
                            {{ __('Menu::words.inactive') }}
                        </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>


        <div class="card-footer">

            <a
                href="{{ route((app()->getLocale() . '.dashboard.menus.index')) }}"
                class="btn btn-secondary"
            >
                {{ __('Menu::words.back') }}
            </a>

        </div>

    </div>

@endsection
