<?php

namespace App\Livewire\Forms;

use App\Models\Ingredient;
use Livewire\Form;

class IngredientsForm extends Form
{
    public $ingredients = [
        []
    ];

    public $ingredient = ['name' => null, 'quantity' => null, 'unit' => null];

    public function setIngredients($ingredients): void
    {
        foreach ($ingredients as $index => $ingredient){
            $this->ingredients[$index]['name'] = $ingredient->name;
            $this->ingredients[$index]['quantity'] = $ingredient->pivot->quantity;
            $this->ingredients[$index]['unit'] = $ingredient->pivot->unit_id;
        }
    }

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

    // Check that there are no repetitions, if there are, we sum up the quantity
    public function groupIngredients(): \Illuminate\Support\Collection
    {
        return collect($this->ingredients)
            ->groupBy(fn($item) => strtolower($item['name'])) // Group by ingredient name
            ->map(function ($group) {
                return [
                    'name' => ucfirst($group->first()['name']), // Take the first name
                    'quantity' => $group->sum('quantity'), // Sum quantities
                    'unit' => $group->first()['unit'], // Take the first unit
                ];
            });
    }

    public function prepareFinalIngredients(): array
    {
        $finalIngredients = [];
        $ingredientsGrouped = $this->groupIngredients();

        foreach ($ingredientsGrouped as $ingredientData){
            // Check if the ingredient exists (get the existed one or create and save to database)
            $ingredient = Ingredient::firstOrCreate([
                'name' => trim($ingredientData['name']) // Match by name
            ]);

            // Prepare data for pivot table
            $finalIngredients[] = [
                'id' => $ingredient->id,
                'quantity' => $ingredientData['quantity'],
                'unit_id' => $ingredientData['unit'],
            ];
        }
        return $finalIngredients;
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
