<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    public function run(): void
    {
        Recipe::create([
            'name' => 'Chicken Broth',
            'description' => 'Chicken broth is usually made from a stock of chicken pieces and bones as well as vegetables that are boiled down and then removed.',
            'image' => 'recipes-images/default/default_photo.png',
            'cook_time' => '01:55',
            'servings' => 3,
            'dish_category_id' => 2,
            'dish_subcategory_id' => 37,
            'user_id' => 1,
            'cuisine_id' => 13,
            'menu_id' => 1,
        ]);
    }
}
