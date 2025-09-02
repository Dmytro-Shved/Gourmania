<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientsSeeder extends Seeder
{
    public array $ingredients = [
        "Chicken",
        "Carrots",
        "Celery",
        "Onion",
        "Garlic",
        "Bay leaves",
        "Black peppercorns",
        "Salt",
        "Parsley",
        "Thyme",
        "Water"
    ];

    public function run(): void
    {
        foreach ($this->ingredients as $ingredient) {
            Ingredient::create([
                'name' => $ingredient
            ]);
        }
    }
}
