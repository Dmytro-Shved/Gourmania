<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Support\Facades\Gate;

class RecipeController extends Controller
{
    public function showEditForm(Recipe $recipe)
    {
        Gate::authorize('modifyRecipe', $recipe);

        return view('recipes.recipe-edit', compact('recipe'));
    }

    public function guide(Recipe $recipe)
    {
        $recipe->load(['user', 'ingredients.pivot.unit', 'guideSteps']);
        $ingredients = $recipe->ingredients;
        $guideSteps = $recipe->guideSteps->sortBy('step_number');

        return view('recipes.recipe-guide', compact('recipe', 'ingredients', 'guideSteps'));
    }

    public function destroy(Recipe $recipe)
    {
        Gate::authorize('modifyRecipe', $recipe);

        $recipe->delete();

        return redirect()->back()->with('recipe_destroyed', 'Recipe successfully deleted');
    }
}
