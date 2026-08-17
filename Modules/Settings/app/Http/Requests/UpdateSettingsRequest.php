<?php

declare(strict_types=1);

namespace Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'fa_website_name' => ['nullable', 'max:100'],
            'en_website_name' => ['nullable', 'max:100'],
            'fa_website_description' => ['nullable'],
            'en_website_description' => ['nullable'],
            'logo_src' => ['nullable'],
            'favicon' => ['nullable', 'max:1024'],
            'footer_logo' => ['nullable', 'max:1024'],
            'email' => ['nullable', 'email'],
            'phone' => ['nullable', 'max:12'],
            'mobile' => ['nullable', 'max:12'],
            'fa_address' => ['nullable', 'max:200'],
            'en_address' => ['nullable', 'max:200'],
            'instagram' => ['nullable', 'url'],
            'telegram' => ['nullable', 'url'],
            'linkedin' => ['nullable', 'url'],
            'whatsapp' => ['nullable', 'url'],
            'fa_owner_full_name' => ['required', 'max:100'],
            'fa_owner_bio' => ['required'],
            'fa_hero_title' => ['required', 'max:100'],
            'en_owner_full_name' => ['required', 'max:100'],
            'en_owner_bio' => ['required'],
            'en_hero_title' => ['required', 'max:100'],
            'owner_avatar' => ['max:1024']
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }
}
