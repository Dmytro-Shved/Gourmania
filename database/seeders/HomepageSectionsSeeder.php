<?php

namespace Database\Seeders;

use App\Models\HomepageSection;
use Illuminate\Database\Seeder;

class HomepageSectionsSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            [
                'name' => 'Popular Recipes',
                'type' => 'popular',
                'category_slug' => null,
                'order' => 1,
                'visible' => true,
                'limit' => 3,
            ],
            [
                'name' => 'Latest Recipes',
                'type' => 'latest',
                'category_slug' => null,
                'order' => 2,
                'visible' => true,
                'limit' => 8,
            ],
            [
                'name' => 'Meat Dishes',
                'type' => 'category',
                'category_slug' => 'main-dishes',
                'order' => 3,
                'visible' => true,
                'limit' => 4,
            ],
            [
                'name' => 'Salads',
                'type' => 'category',
                'category_slug' => 'salads',
                'order' => 4,
                'visible' => true,
                'limit' => 4,
            ],

            [
                'name' => 'Breakfasts',
                'type' => 'category',
                'category_slug' => 'breakfasts',
                'order' => 5,
                'visible' => true,
                'limit' => 4,
            ],
            [
                'name' => 'Baking And Desserts',
                'type' => 'category',
                'category_slug' => 'baking-and-desserts',
                'order' => 6,
                'visible' => true,
                'limit' => 4,
            ],
            [
                'name' => 'Drinks',
                'type' => 'category',
                'category_slug' => 'drinks',
                'order' => 7,
                'visible' => true,
                'limit' => 4,
            ],
        ];

        foreach ($sections as $section) {
            HomepageSection::create($section);
        }
    }
}
