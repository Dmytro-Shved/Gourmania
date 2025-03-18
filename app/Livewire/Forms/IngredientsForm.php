<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class IngredientsForm extends Form
{
    public $ingredients = [
        []
    ];

    public $ingredient = ['name' => null, 'quantity' => null, 'unit' => null];

    public function addIngredient(): void
    {
        $this->ingredients[] = $this->ingredient;
    }

    public function removeIngredient($index): void
    {
        unset($this->ingredients[$index]);

        // reshuffle indexes after deleting
        $this->ingredients = array_values($this->ingredients);

        // if there are no ingredients, then create a new one
        if (empty($this->ingredients)){
            $this->ingredients[] = $this->ingredient;
        }
    }

    public function rules(): array
    {
        return [
            'ingredients' => ['required', 'array'],
            'ingredients.*.name' => ['required', 'string', 'max:255'],
            'ingredients.*.quantity' => ['required', 'numeric', 'min:0.1', 'max:999.99', 'regex:/^\d{1,3}(\.\d{1,2})?$/'],
            'ingredients.*.unit' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'ingredients.*.name.required' => 'Required',
            'ingredients.*.name.string' => 'Invalid type',
            'ingredients.*.name.max' => 'Too long',

            'ingredients.*.quantity.required' => 'Required',
            'ingredients.*.quantity.decimal' => 'Invalid type',
            'ingredients.*.quantity.max' => 'Too big',
            'ingredients.*.quantity.min' => 'Too small',
            'ingredients.*.quantity.regex' => 'Invalid format',

            'ingredients.*.unit.required' => 'Required',
        ];
    }
}
