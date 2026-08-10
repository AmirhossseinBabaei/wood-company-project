```blade
@extends('components.layouts.dashboard')

@section('title', __('Slider::words.sliders'))

@section('content')

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                {{ __('Slider::words.sliders') }}
            </h4>

            <a
                href="{{ route('dashboard.sliders.create') }}"
                class="btn btn-primary"
            >
                {{ __('Slider::words.create_slider') }}
            </a>

        </div>

        <div class="card-body">

            @if($sliders->count())

                <div class="table-responsive">

                    <table class="table table-bordered table-striped align-middle">

                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('Slider::words.image') }}</th>
                            <th>{{ __('Slider::words.fa_title') }}</th>
                            <th>{{ __('Slider::words.en_title') }}</th>
                            <th>{{ __('Slider::words.fa_slug') }}</th>
                            <th>{{ __('Slider::words.en_slug') }}</th>
                            <th>{{ __('Slider::words.actions') }}</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($sliders as $slider)

                            <tr>

                                <td>
                                    {{ $slider->id }}
                                </td>

                                <td>

                                    @if($slider->image)

                                        <img
                                            src="{{ asset('storage/' . $slider->image) }}"
                                            alt="{{ $slider->fa_title }}"
                                            width="100"
                                            height="60"
                                            style="object-fit: cover;"
                                            class="rounded"
                                        >

                                    @else

                                        <span class="text-muted">
                                            {{ __('Slider::words.no_image') }}
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    {{ $slider->fa_title }}
                                </td>

                                <td>
                                    {{ $slider->en_title }}
                                </td>

                                <td>
                                    {{ $slider->fa_slug }}
                                </td>

                                <td>
                                    {{ $slider->en_slug }}
                                </td>

                                <td>

                                    <a
                                        href="{{ route('dashboard.sliders.show', $slider) }}"
                                        class="btn btn-sm btn-info"
                                    >
                                        {{ __('Slider::words.view') }}
                                    </a>

                                    <a
                                        href="{{ route('dashboard.sliders.edit', $slider) }}"
                                        class="btn btn-sm btn-warning"
                                    >
                                        {{ __('Slider::words.edit') }}
                                    </a>

                                    <form
                                        action="{{ route('dashboard.sliders.destroy', $slider) }}"
                                        method="POST"
                                        class="d-inline"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('{{ __('Slider::words.confirm_delete') }}')"
                                        >
                                            {{ __('Slider::words.delete') }}
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

                <div class="mt-3">
                    {{ $sliders->links() }}
                </div>

            @else

                <div class="alert alert-secondary">
                    {{ __('Slider::words.no_sliders') }}
                </div>

            @endif

        </div>

    </div>

@endsection
```
