<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'last_name' => 'required|string|min:1|max:255',
            'first_name' => 'required|string|min:1|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|integer|min:8',
            'role' => 'nullable|string|in:Administrateur,Super Administrateur'
        ];
    }
}
