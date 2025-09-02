<?php

namespace Database\Seeders;

use App\Models\IngredientRecipe;
use Illuminate\Database\Seeder;

class IngredientRecipeSeeder extends Seeder
{
    public array $broth_ingredients = [
        ['id' => 1, 'quantity' => 1, 'unit' => '1'], // Chicken
        ['id' => 2, 'quantity' => 3, 'unit' => '3'], // Carrots
        ['id' => 3, 'quantity' => 2, 'unit' => '3'], // Celery
        ['id' => 5, 'quantity' => 2, 'unit' => '4'], // Garlic
        ['id' => 8, 'quantity' => 1, 'unit' => '6'], // Salt
        ['id' => 6, 'quantity' => 2, 'unit' => '3'], // Bay leaves
        ['id' => 11, 'quantity' => 2, 'unit' => '5'], // Water
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
