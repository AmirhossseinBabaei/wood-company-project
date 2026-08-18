<?php

declare(strict_types=1);

namespace Modules\Gallery\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'fa_title' => 'required',
            'en_title' => 'required',
            'fa_description' => 'required',
            'en_description' => 'required',
            'sort_order' => ['required', 'integer'],
            'image' => 'max:50012',
            'status' => 'in:active,inactive'
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
