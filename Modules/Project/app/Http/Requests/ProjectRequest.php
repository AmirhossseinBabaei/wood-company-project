<?php

declare(strict_types=1);

namespace Modules\Project\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'fa_name' => [
                'required',
                'string',
                'max:255',
            ],

            'fa_slug' => [
                'required',
                'string'
            ],

            'en_name' => [
                'required',
                'string',
                'max:255',
            ],

            'en_slug' => [
                'required',
                'string'
            ],

            'images' => [
                'nullable',
            ],

            'image.*' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'properties' => [
                'array',
            ],

            'properties.*' => [
                'required',
            ],
        ];
    }
}
