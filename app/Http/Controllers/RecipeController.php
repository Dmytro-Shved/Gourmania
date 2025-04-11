<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Support\Facades\Gate;

class RecipeController extends Controller
{
    public function showEditForm(Recipe $recipe)
    {
        Gate::authorize('editRecipe', $recipe);

        return view('recipes.recipe-edit', compact('recipe'));
    }

    public function guide(Recipe $recipe)
    {
        $ingredients = $recipe->ingredients; // get ingredients
        $guideSteps = $recipe->guideSteps->sortBy('step_number'); // get steps sorted by step_number

        return view('recipes.recipe-guide', compact('recipe', 'ingredients', 'guideSteps'));
    }
}
