<?php

namespace Database\Seeders;

use App\Models\Cuisine;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ingredient;
use App\Models\Menu;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public array $countries = [
        "Australia",
        "Belgium",
        "China",
        "France",
        "Germany",
        "Italy",
        "Mexico",
        "Poland",
        "Portugal",
        "Spain",
        "Turkey",
        "Ukraine",
        "United Kingdom",
        "United States"
    ];

    public array $menus = [
        "Ketogenic",
        "Gluten-free",
        "Vegetarian",
        "Vegan",
        "Paleo"
    ];

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

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // seed roles table
        Role::factory(1)->create([
            'name' => 'user'
        ]);

        // seed cuisines table
        foreach ($this->countries as $country){
            Cuisine::factory(1)->create([
               'name' => $country
            ]);
        }

        // seed menus table
        foreach ($this->menus as $menu){
            Menu::factory(1)->create([
                'name' => $menu
            ]);
        }

        // seed ingredients table
        foreach ($this->ingredients as $ingredient){
            Ingredient::factory(1)->create([
                'name' => $ingredient
            ]);
        }
    }
}
