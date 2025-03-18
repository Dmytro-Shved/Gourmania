<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RecipeForm extends Form
{
    #[Validate]
    #[Rule(['nullable','mimes:jpeg,png,webp'])]
    public $image;
    public $name;
    public $description;
    public $category;
    public $cuisine;
    public $menu;
    public $cook_time;
    public $servings;

    public function resetRecipeImage(): void
    {
        $this->image = null;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:recipes,name', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'category' => ['required'],
            'cuisine' => ['required'],
            'menu' => ['nullable'],
            'cook_time' => ['required', 'date_format:H:i', 'not_in:00:00'],
            'servings' => ['required', 'integer', 'min:1', 'max:99'],
        ];
    }

    public function messages(): array
    {
        return [
            'image.mimes' => 'The recipe image must be a file of type: jpeg, png, webp',
            'name.required' => 'Required',
            'name.string' => 'Recipe name must be a string',
            'name.unique:App\Models\Recipe, name' => 'This recipe name has already been taken',
            'name.max' => 'This recipe name is too long',

            'description.string' => 'Description must be a string',
            'description.max' => 'Description is too long',

            'category.required' => 'Required',
            'cuisine.required' => 'Required',

            'cook_time.required' => 'Required',
            'cook_time.not_in' => 'Invalid format',
            'servings.required' => 'Required',
        ];
    }
}
