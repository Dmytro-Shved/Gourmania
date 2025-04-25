<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitsSeeder extends Seeder
{
    public array $units = [
        'kg',
        'g',
        'mg',
        'liter',
        'milliliters',
        'piece',
        'head',
        'clove',
        'slice',
        'drop',
        'pinch',
        'dash',
        'to taste',
        'bunche',
        'twig',
        'stem',
        'pack',
        'can',
        'sheet',
    ];

    public function run(): void
    {
        foreach ($this->units as $unit) {
            Unit::create([
                'name' => $unit
            ]);
        }
    }
}
