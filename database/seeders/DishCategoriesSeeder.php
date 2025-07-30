<?php

namespace Database\Seeders;

use App\Models\DishCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DishCategoriesSeeder extends Seeder
{
    public array $dish_categories = [
        'Breakfasts',
        'Broths',
        'Appetizers',
        'Drinks',
        'Main Dishes',
        'Pasta and Pizza',
        'Risotto',
        'Salads',
        'Sauces and Marinades',
        'Soups',
        'Sandwiches',
        'Baking and Desserts',
        'Preparations'
    ];

    public function run(): void
    {
        foreach ($this->dish_categories as $dish_category){
            DishCategory::create([
                'name' => $dish_category,
            ]);
        }
    }
}
