<?php

namespace Database\Seeders;

use App\Models\Cuisine;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // seed roles table
        $this->call(RolesSeeder::class);

        // seed users table
        User::factory(1)->create();

        // seed user_profiles table
        $this->call(UserProfileSeeder::class);

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

        // seed recipes table
        $this->call(RecipeSeeder::class);

        // seed ingredient_recipe (pivot) table
        $this->call(IngredientRecipeSeeder::class);

        // seed guide_steps table
        $this->call(GuideStepsSeeder::class);

        // seed homepage_sections table
        $this->call(HomepageSectionsSeeder::class);
    }
}
