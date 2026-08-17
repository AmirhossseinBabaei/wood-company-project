@extends('components.layouts.dashboard')

@section('title', __('Menu::words.edit_menu'))

@section('content')

    <div class="card">

        <div class="card-header">

            <h4>
                {{ __('Menu::words.edit_menu') }}
            </h4>

        </div>


        <form
            action="{{ route((app()->getLocale() . '.dashboard.menus.update'), $menu) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            <div class="card-body">

                {{-- Parent --}}
                <div class="mb-3">

                    <label
                        for="parent_id"
                        class="form-label"
                    >
                        {{ __('Menu::words.parent') }}
                    </label>


                    <select
                        name="parent_id"
                        id="parent_id"
                        class="form-select @error('parent_id') is-invalid @enderror"
                    >

                        <option value="">
                            {{ __('Menu::words.no_parent') }}
                        </option>


                        @foreach($menus as $parent)

                            @if($parent->id !== $menu->id)

                                <option
                                    value="{{ $parent->id }}"
                                    @selected(
                                    old(
                                'parent_id',
                                $menu->parent_id
                                ) == $parent->id
                                )
                                >
                                {{ $parent->fa_title }}
                                </option>

                            @endif

                        @endforeach

                    </select>


                    @error('parent_id')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror

                </div>


                {{-- Persian Title --}}
                <div class="mb-3">

                    <label
                        for="fa_title"
                        class="form-label"
                    >
                        {{ __('Menu::words.fa_title') }}
                    </label>


                    <input
                        type="text"
                        name="fa_title"
                        id="fa_title"
                        value="{{ old('fa_title', $menu->fa_title) }}"
                        class="form-control @error('fa_title') is-invalid @enderror"
                    >


                    @error('fa_title')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror

                </div>


                {{-- English Title --}}
                <div class="mb-3">

                    <label
                        for="en_title"
                        class="form-label"
                    >
                        {{ __('Menu::words.en_title') }}
                    </label>


                    <input
                        type="text"
                        name="en_title"
                        id="en_title"
                        value="{{ old('en_title', $menu->en_title) }}"
                        class="form-control @error('en_title') is-invalid @enderror"
                    >


                    @error('en_title')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror

                </div>


                {{-- Persian URL --}}
                <div class="mb-3">

                    <label
                        for="fa_url"
                        class="form-label"
                    >
                        {{ __('Menu::words.fa_url') }}
                    </label>


                    <input
                        type="text"
                        name="fa_url"
                        id="fa_url"
                        value="{{ old('fa_url', $menu->fa_url) }}"
                        class="form-control @error('fa_url') is-invalid @enderror"
                    >


                    @error('fa_url')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror

                </div>


                {{-- English URL --}}
                <div class="mb-3">

                    <label
                        for="en_url"
                        class="form-label"
                    >
                        {{ __('Menu::words.en_url') }}
                    </label>


                    <input
                        type="text"
                        name="en_url"
                        id="en_url"
                        value="{{ old('en_url', $menu->en_url) }}"
                        class="form-control @error('en_url') is-invalid @enderror"
                    >


                    @error('en_url')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror

                </div>


                {{-- Sort Order --}}
                <div class="mb-3">

                    <label
                        for="sort_order"
                        class="form-label"
                    >
                        {{ __('Menu::words.sort_order') }}
                    </label>


                    <input
                        type="number"
                        name="sort_order"
                        id="sort_order"
                        value="{{ old('sort_order', $menu->sort_order) }}"
                        class="form-control @error('sort_order') is-invalid @enderror"
                    >


                    @error('sort_order')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror

                </div>


                {{-- Position --}}
                <div class="mb-3">

                    <label
                        for="position"
                        class="form-label"
                    >
                        {{ __('Menu::words.position') }}
                    </label>


                    <select
                        name="position"
                        id="position"
                        class="form-select @error('position') is-invalid @enderror"
                    >

                        <option
                            value="header"
                            @selected(
                            old(
                        'position', $menu->position) === 'header'
                        )
                        >
                        {{ __('Menu::words.header') }}
                        </option>


                        <option
                            value="footer"
                            @selected(
                            old(
                        'position', $menu->position) === 'footer'
                        )
                        >
                        {{ __('Menu::words.footer') }}
                        </option>

                    </select>


                    @error('position')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror

                </div>


                {{-- Status --}}
                <div class="mb-3">

                    <label
                        for="status"
                        class="form-label"
                    >
                        {{ __('Menu::words.status') }}
                    </label>


                    <select
                        name="status"
                        id="status"
                        class="form-select @error('status') is-invalid @enderror"
                    >

                        @if($menu->status == \Modules\Menu\Models\Menu::ACTIVE)
                            <option
                                value="inactive"
                            >
                                {{ __('Menu::words.inactive') }}
                            </option>

                            <option
                                value="active"
                                selected>
                                {{ __('Menu::words.active') }}
                            </option>

                        @else

                            <option
                                value="active"
                            >
                                {{ __('Menu::words.active') }}
                            </option>

                            <option
                                value="inactive"
                                selected
                            >
                                {{ __('Menu::words.inactive') }}
                            </option>
                        @endif
                    </select>


                    @error('status')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror

                </div>

            </div>


            <div class="card-footer">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    {{ __('Menu::words.update') }}
                </button>

                <a
                    href="{{ route((app()->getLocale() . '.dashboard.menus.index')) }}"
                    class="btn btn-secondary"
                >
                    {{ __('Menu::words.back') }}
                </a>

            </div>

        </form>

    </div>

@endsection
