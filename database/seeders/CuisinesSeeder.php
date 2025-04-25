<?php

namespace Database\Seeders;

use App\Models\Cuisine;
use Illuminate\Database\Seeder;

class CuisinesSeeder extends Seeder
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

    public function run(): void
    {
        foreach ($this->countries as $country) {
            Cuisine::create([
                'name' => $country
            ]);
        }
    }
}
