<?php

namespace Database\Seeders;

use App\Models\Cuisine;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\DishCategory;
use App\Models\GuideStep;
use App\Models\Ingredient;
use App\Models\IngredientRecipe;
use App\Models\Menu;
use App\Models\Recipe;
use App\Models\Role;
use App\Models\User;
use App\Models\UserProfile;
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

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // seed roles table
        Role::factory(1)->create([
            'name' => 'user'
        ]);

        // seed users table
        User::factory(1)->create();

        // seed user_profiles table
        UserProfile::factory(1)->create([
            'user_id' => 1,
            'gender' => 'male',
            'birth_date' => now(),
            'description' => "Hi everyone! I'm not a human, I was created from database seeder and I like to eat muffins",
        ]);

        // seed cuisines table
        foreach ($this->countries as $country) {
            Cuisine::factory(1)->create([
                'name' => $country
            ]);
        }

        // seed menus table
        foreach ($this->menus as $menu) {
            Menu::factory(1)->create([
                'name' => $menu
            ]);
        }

        // seed dish_categories table
        foreach ($this->dish_categories as $dish_category){
            DishCategory::factory(1)->create([
               'name' => $dish_category
            ]);
        }

        // seed ingredients table
        foreach ($this->ingredients as $ingredient) {
            Ingredient::factory(1)->create([
                'name' => $ingredient
            ]);
        }

        // seed recipes table
        Recipe::factory()->create([
            'name' => 'Chicken Broth',
            'description' => 'Chicken broth is usually made from a stock of chicken pieces and bones as well as vegetables that are boiled down and then removed.',
            'image' => 'recipes-images/default/chicken-broth.webp',
            'dish_category_id' => 2,
            'user_id' => 1,
            'cuisine_id' => 13,
            'menu_id' => 1,
        ]);

        // array for the ingredient_recipe (pivot) table
        $broth_ingredients = [
            ['id' => 1, 'quantity' => 1, 'unit' => 'kg'],
            ['id' => 2, 'quantity' => 3, 'unit' => 'pieces'],
            ['id' => 3, 'quantity' => 2, 'unit' => 'pieces'],
            ['id' => 5, 'quantity' => 2, 'unit' => 'heads'],
            ['id' => 8, 'quantity' => 1, 'unit' => 'to taste'],
            ['id' => 6, 'quantity' => 2, 'unit' => 'pieces'],
            ['id' => 11, 'quantity' => 2, 'unit' => 'liters'],
        ];

        // seed ingredient_recipe (pivot) table
        foreach ($broth_ingredients as $ingredient) {
            IngredientRecipe::factory()->create([
                'recipe_id' => 1,
                'ingredient_id' => $ingredient['id'],
                'quantity' => $ingredient['quantity'],
                'unit' => $ingredient['unit'],
            ]);
        }

        // array of the guide data
        $guide = [
            [ 'step_number' => 1, 'step_text' => 'Place the chicken bones on a baking tray and send to an oven preheated to 240 degrees for 20 minutes.'],
            [ 'step_number' => 2, 'step_text' => 'Pour cold water into a saucepan, put the baked bones in it and bring to a boil.'],
            [ 'step_number' => 3, 'step_text' => 'When the water comes to a boil, reduce the heat and skim off any foam. Cook the broth without a lid over a low heat for 1 hour.'],
        ];

        // seed guide_steps table
        foreach ($guide as $step){
            GuideStep::factory(1)->create([
                'recipe_id' => 1,
                'step_number' => $step['step_number'],
                'step_text' => $step['step_text'],
            ]);
        }
    }
}
