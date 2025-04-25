<?php

namespace Database\Seeders;

use App\Models\GuideStep;
use Illuminate\Database\Seeder;

class GuideStepsSeeder extends Seeder
{
    // array of the guide data
    public array $guide = [
        [ 'step_number' => 1, 'step_text' => 'Place the chicken bones on a baking tray and send to an oven preheated to 240 degrees for 20 minutes.'],
        [ 'step_number' => 2, 'step_text' => 'Pour cold water into a saucepan, put the baked bones in it and bring to a boil.'],
        [ 'step_number' => 3, 'step_text' => 'When the water comes to a boil, reduce the heat and skim off any foam. Cook the broth without a lid over a low heat for 1 hour.'],
    ];

    public function run(): void
    {
        foreach ($this->guide as $step){
            GuideStep::create([
                'recipe_id' => 1,
                'step_number' => $step['step_number'],
                'step_text' => $step['step_text'],
            ]);
        }
    }
}
