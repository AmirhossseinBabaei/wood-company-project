<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        if(request()->route()->parameterNames()){

            return [
                'first_name' => 'required',
                'last_name' => 'required',
            ];
        }

        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => 'required'
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
