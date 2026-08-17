<?php

namespace Modules\Services\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'fa_title' => 'required',
            'en_title' => 'required',
            'image' => ['nullable', 'max:1024'],
            'fa_description' => 'required|max:3000',
            'en_description' => 'required|max:3000'
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
