<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeFilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'dish_category' => ['nullable', 'integer'],
            'dish_subcategory' => ['nullable', 'integer'],
            'cuisine' => ['nullable', 'integer'],
            'menu' => ['nullable', 'integer'],
        ];
    }
}
