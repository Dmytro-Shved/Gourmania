<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // seed users table
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('1234567890'),
            'role_id' => 2, // admin
        ]);

        // seed user_profiles table
        $this->call(UserProfileSeeder::class);

        // seed recipes table
        $this->call(RecipeSeeder::class);

        // seed ingredient_recipe (pivot) table
        $this->call(IngredientRecipeSeeder::class);

        // seed guide_steps table
        $this->call(GuideStepsSeeder::class);
    }
}
