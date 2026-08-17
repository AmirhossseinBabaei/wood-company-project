<?php

namespace Modules\Menu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'parent_id' => ['nullable', 'exists:menus,id'],
            'fa_title' => 'required',
            'en_title' => 'required',
            'fa_url' => 'required|url',
            'en_url' => 'required|url',
            'position' => 'required|in:header,footer',
            'sort_order' => 'required|integer',
            'status' => 'required|in:active,inactive'
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
