<?php

namespace Database\Seeders;

use App\Models\IngredientRecipe;
use Illuminate\Database\Seeder;

class IngredientRecipeSeeder extends Seeder
{
    public array $broth_ingredients = [
        ['id' => 1, 'quantity' => 1, 'unit' => '1'],
        ['id' => 2, 'quantity' => 3, 'unit' => '3'],
        ['id' => 3, 'quantity' => 2, 'unit' => '3'],
        ['id' => 5, 'quantity' => 2, 'unit' => '4'],
        ['id' => 8, 'quantity' => 1, 'unit' => '6'],
        ['id' => 6, 'quantity' => 2, 'unit' => '3'],
        ['id' => 11, 'quantity' => 2, 'unit' => '5'],
    ];

    public function run(): void
    {
        foreach ($this->broth_ingredients as $ingredient) {
            IngredientRecipe::create([
                'recipe_id' => 1,
                'ingredient_id' => $ingredient['id'],
                'quantity' => $ingredient['quantity'],
                'unit_id' => $ingredient['unit'],
            ]);
        }
    }
}
