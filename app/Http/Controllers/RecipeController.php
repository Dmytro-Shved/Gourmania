<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeFilterRequest;
use App\Models\Recipe;
use Illuminate\Support\Facades\Gate;


class RecipeController extends Controller
{
    public function index(RecipeFilterRequest $request)
    {
        $request->validated();

        $dish_category = $request->query('dish_category');
        $dish_subcategory = $request->query('dish_subcategory');
        $cuisine = $request->query('cuisine');
        $menu = $request->query('menu');

        if (!$dish_category && $dish_subcategory) {
            abort(404);
        }

        $recipes = Recipe::with('user', 'ingredients.pivot.unit', 'cuisine', 'dishCategory')
            ->when($dish_category, function ($query) use ($dish_category, $dish_subcategory){
                $query
                    ->where('dish_category_id', $dish_category)
                    ->when($dish_subcategory, function ($query, $dish_subcategory){
                        $query->where('dish_subcategory_id', $dish_subcategory);
                    });
            })
            ->when($cuisine, function ($query, $cuisine){
                $query->where('cuisine_id', $cuisine);
            })
            ->when($menu, function ($query, $menu){
                $query->where('menu_id', $menu);
            })
            ->get();

        $title = collect($request->validated())->filter()->isEmpty()
            ? 'ALL RECIPES'
            : 'FILTERED RECIPES';

        return view('recipes.recipes', compact('recipes', 'title'));
    }

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
