<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // seed roles table
        $this->call(RolesSeeder::class);

        // seed cuisines table
        $this->call(CuisinesSeeder::class);

        // seed menus table
        $this->call(MenusSeeder::class);

        // seed dish_categories table
        $this->call(DishCategoriesSeeder::class);

        // seed dish_subcategories table
        $this->call(DishSubcategoriesSeeder::class);

        // seed ingredients table
        $this->call(IngredientsSeeder::class);

        // seed units table
        $this->call(UnitsSeeder::class);

        // seed homepage_sections table
        $this->call(HomepageSectionsSeeder::class);
    }
}
