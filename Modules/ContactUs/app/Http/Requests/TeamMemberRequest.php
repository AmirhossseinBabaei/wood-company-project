<?php

declare(strict_types=1);

namespace Modules\ContactUs\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamMemberRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'max:100'],
            'status' => ['required', 'in:active,inactive'],
            'field' => ['required', 'max:100'],
            'image' => ['max:5012']
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
