@extends('components.layouts.dashboard')

@section('title', __('Settings::words.create_settings'))

@section('content')

    <div class="card">
        <div class="card-header">
            <h4>{{ __('Settings::words.create_settings') }}</h4>
        </div>

        <form action="{{ route('dashboard.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>{{ __('Settings::words.fa_website_name') }}</label>
                        <input
                            type="text"
                            name="fa_website_name"
                            class="form-control"
                            value="{{ old('fa_website_name', $setting->fa_website_name ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{ __('Settings::words.en_website_name') }}</label>
                        <input
                            type="text"
                            name="en_website_name"
                            class="form-control"
                            value="{{ old('en_website_name', $setting->en_website_name ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{ __('Settings::words.fa_website_description') }}</label>
                        <textarea
                            name="fa_website_description"
                            class="form-control"
                            rows="3">{{ old('fa_website_description', $setting->fa_website_description ?? '') }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{ __('Settings::words.en_website_description') }}</label>
                        <textarea
                            name="en_website_description"
                            class="form-control"
                            rows="3">{{ old('en_website_description', $setting->en_website_description ?? '') }}</textarea>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>{{ __('Settings::words.logo_src') }}</label>
                        <input type="file" name="logo_src" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>{{ __('Settings::words.favicon') }}</label>
                        <input type="file" name="favicon" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>{{ __('Settings::words.footer_logo') }}</label>
                        <input type="file" name="footer_logo" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>{{ __('Settings::words.email') }}</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email', $setting->email ?? '') }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>{{ __('Settings::words.phone') }}</label>
                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            value="{{ old('phone', $setting->phone ?? '') }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>{{ __('Settings::words.mobile') }}</label>
                        <input
                            type="text"
                            name="mobile"
                            class="form-control"
                            value="{{ old('mobile', $setting->mobile ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{ __('Settings::words.fa_address') }}</label>
                        <textarea
                            name="fa_address"
                            class="form-control"
                            rows="2">{{ old('fa_address', $setting->fa_address ?? '') }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{ __('Settings::words.en_address') }}</label>
                        <textarea
                            name="en_address"
                            class="form-control"
                            rows="2">{{ old('en_address', $setting->en_address ?? '') }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{ __('Settings::words.instagram') }}</label>
                        <input
                            type="url"
                            name="instagram"
                            class="form-control"
                            value="{{ old('instagram', $setting->instagram ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{ __('Settings::words.telegram') }}</label>
                        <input
                            type="url"
                            name="telegram"
                            class="form-control"
                            value="{{ old('telegram', $setting->telegram ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{ __('Settings::words.linkedin') }}</label>
                        <input
                            type="url"
                            name="linkedin"
                            class="form-control"
                            value="{{ old('linkedin', $setting->linkedin ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{ __('Settings::words.whatsapp') }}</label>
                        <input
                            type="url"
                            name="whatsapp"
                            class="form-control"
                            value="{{ old('whatsapp', $setting->whatsapp ?? '') }}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <h4>{{ __('Settings::words.saved_images') }}</h4>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                                <h4>{{ __('Settings::words.logo_src') }}</h4>
                                <img width="200px" alt="{{ __('Settings::words.logo_src') }}" height="120px" src="{{ asset('storage/' . ($setting->logo_src ?? null)) }}">
                            </div>

                            <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                                <h4>{{ __('Settings::words.favicon') }}</h4>
                                <img width="200px" alt="{{ __('Settings::words.favicon') }}" height="120px" src="{{ asset('storage/' . ($setting->favicon ?? null)) }}">
                            </div>

                            <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                                <h4>{{ __('Settings::words.footer_logo') }}</h4>
                                <img width="200px" alt="{{ __('Settings::words.footer_logo') }}" height="120px" src="{{ asset('storage/' . ($setting->footer_logo ?? null)) }}">
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="card-footer text-end">
                <button class="btn btn-primary">
                    {{ __('Settings::words.save') }}
                </button>
            </div>

        </form>
    </div>

@endsection
