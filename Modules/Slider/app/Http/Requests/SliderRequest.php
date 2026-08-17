<?php

declare(strict_types=1);

namespace Modules\Slider\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'fa_title' => ['required', 'max:100'],
            'en_title' => ['required', 'max:100'],
            'fa_slug' => ['required', 'max:300'],
            'en_slug' => ['required', 'max:300'],
            'image' => ['mimes:png,svg,jpg,jpeg,gif', 'max:5012']
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
