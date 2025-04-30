<?php

namespace App\Livewire;

use App\Http\Requests\RecipeFilterRequest;
use App\Models\Recipe;
use Livewire\Component;
use Livewire\WithPagination;

class RecipeList extends Component
{
    use WithPagination;

    // don't forget function's return type declaration

    public function render(RecipeFilterRequest $request)
    {
        $recipes = $this->getFilteredRecipes($request);

        return view('livewire.recipe-list', [
            'recipes' => $recipes
        ]);
    }

    public function getFilteredRecipes($request)
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
            ->paginate(2);

        return $recipes;
    }
}
