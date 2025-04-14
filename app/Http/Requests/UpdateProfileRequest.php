<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:25'],
            'email' => ['required', 'email', 'min:2', 'max:45',  Rule::unique('users')->ignore($this->user->id)],
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
