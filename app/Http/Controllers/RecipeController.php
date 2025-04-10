<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Support\Facades\Gate;

class RecipeController extends Controller
{
    public function showCreateForm()
    {
        return view('recipes.recipe-create');
    }

    public function showEditForm(Recipe $recipe)
    {
        Gate::authorize('editRecipe', $recipe);

        return view('recipes.recipe-edit', compact('recipe'));
    }
}
