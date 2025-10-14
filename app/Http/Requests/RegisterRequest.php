<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
     */
    public function rules(): array
    {
        // the package for email validation: propaganistas/laravel-disposable-email
        return [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,dns', 'indisposable', 'unique:users,email', 'min:2', 'max:255'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'Required',
          'email.required' => 'Required',
          'password.required' => 'Required',
        ];
    }
}
