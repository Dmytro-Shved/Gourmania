<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:25'],
            'email' => ['required', 'email', 'min:2', 'max:45',  Rule::unique('users')->ignore($this->user->id)],
            'password' => ['nullable',Password::defaults(), 'confirmed'],
            'gender' => ['nullable'],
            'birth_date' => ['nullable', 'date'],
            'description' => ['nullable', 'string', 'max:150'],
            'photo' => ['nullable', 'image']
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'This email address is already in use',
        ];
    }
}
