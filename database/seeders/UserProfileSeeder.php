<?php

namespace Database\Seeders;

use App\Models\UserProfile;
use Illuminate\Database\Seeder;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seed user_profiles table
        UserProfile::create([
            'user_id' => 1,
            'gender' => 'male',
            'birth_date' => now(),
            'description' => "Hi everyone! I'm not a human, I was created from database seeder and I like to eat muffins",
        ]);
    }
}
