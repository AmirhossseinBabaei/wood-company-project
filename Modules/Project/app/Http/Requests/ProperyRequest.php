<?php

namespace Modules\Project\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProperyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'fa_name' => ['required', 'max:255'],
            'en_name' => ['required', 'max:255']
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
