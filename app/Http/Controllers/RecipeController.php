<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeFilterRequest;
use App\Http\Requests\RecipeSearchRequest;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Gate;


class RecipeController extends Controller
{
    public function index(RecipeFilterRequest $request)
    {
        $filters = $request->validated();

        $title = collect($filters)->filter()->isEmpty()
            ? 'ALL RECIPES'
            : 'FILTERED RECIPES';

        return view('recipes.recipes', compact(['title', 'filters']));
    }

    public function search(RecipeSearchRequest $request)
    {
        $param = $request->validated();

        $q = $param['q'] ?? '';

        return view('recipes.searched-recipes', compact('q'));
    }

    public function showEditForm(Recipe $recipe)
    {
        Gate::authorize('modifyRecipe', $recipe);

        return view('recipes.recipe-edit', compact('recipe'));
    }

    public function guide(Recipe $recipe)
    {
        // Take recipe
        $recipe->load(['user', 'ingredients.pivot.unit', 'userVote', 'savedByUsers'])
            ->loadCount([
                'votes as likesCount' => fn (Builder $query) => $query->where('vote', 1),
                'votes as dislikesCount' => fn (Builder $query) => $query->where('vote', -1),
                'savedByUsers as savedCount'
            ]);

        // Take similar recipes
        $similarRecipes = Recipe::where('id', '!=', $recipe->id)
            ->where('dish_category_id', '=', $recipe->dish_category_id)
            ->with(['user', 'ingredients.pivot.unit', 'cuisine', 'dishCategory', 'savedByUsers'])
            ->withCount([
                'votes as likesCount' => fn (Builder $query) => $query->where('vote', 1),
                'votes as dislikesCount' => fn (Builder $query) => $query->where('vote', -1),
                'savedByUsers as savedCount',
            ])
            ->take(10)
            ->get();

        return view('recipes.recipe-guide', compact(['recipe', 'similarRecipes']));
    }

    public function destroy(Recipe $recipe)
    {
        Gate::authorize('modifyRecipe', $recipe);

        $recipe->delete();

        return redirect()->back()->with('recipe_destroyed', 'Recipe successfully deleted');
    }
}
