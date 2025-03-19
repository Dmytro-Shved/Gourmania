<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function showCreateForm(Recipe $recipe)
    {
        return view('recipes.recipe-create', compact('recipe'));
    }

    public function showEditForm(Recipe $recipe)
    {
        return view('recipes.recipe-edit', compact('recipe'));
    }
}
