<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeFilterRequest;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Gate;


class RecipeController extends Controller
{
    public function index(RecipeFilterRequest $request)
    {
        $title = collect($request->validated())->filter()->isEmpty()
            ? 'ALL RECIPES'
            : 'FILTERED RECIPES';

        return view('recipes.recipes', compact('title'));
    }

    public function showEditForm(Recipe $recipe)
    {
        Gate::authorize('modifyRecipe', $recipe);

        return view('recipes.recipe-edit', compact('recipe'));
    }

    public function guide(Recipe $recipe)
    {
        $recipe->load(['user', 'ingredients.pivot.unit', 'userVote', 'savedByUsers'])
            ->loadCount([
                'votes as likesCount' => fn (Builder $query) => $query->where('vote', 1),
                'votes as dislikesCount' => fn (Builder $query) => $query->where('vote', -1),
                'savedByUsers as savedCount'
            ]);

        return view('recipes.recipe-guide', compact('recipe'));
    }

    public function destroy(Recipe $recipe)
    {
        Gate::authorize('modifyRecipe', $recipe);

        $recipe->delete();

        return redirect()->back()->with('recipe_destroyed', 'Recipe successfully deleted');
    }
}
