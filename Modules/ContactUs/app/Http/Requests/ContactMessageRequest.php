<?php

declare(strict_types=1);

namespace Modules\ContactUs\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactMessageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'max:200'],
            'phone' => ['required', 'max:11'],
            'email' => ['required', 'email'],
            'message' => ['required', 'max:400']
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
