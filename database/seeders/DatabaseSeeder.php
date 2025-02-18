<?php

namespace Database\Seeders;

use App\Models\Cuisine;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Menu;
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

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
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
    }
}
