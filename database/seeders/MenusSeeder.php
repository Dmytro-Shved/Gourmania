<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenusSeeder extends Seeder
{
    public array $menus = [
        "Ketogenic",
        "Gluten-free",
        "Vegetarian",
        "Vegan",
        "Lactose-free",
        "Kids menu",
        "Low-calorie",
        "Lenten",
        "Diabetic-friendly"
    ];

    public function run(): void
    {
        foreach ($this->menus as $menu) {
            Menu::create([
                'name' => $menu
            ]);
        }
    }
}
