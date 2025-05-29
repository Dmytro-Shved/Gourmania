<?php

namespace App\Livewire;

use App\Http\Requests\RecipeFilterRequest;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Builder;

class FilteredRecipes extends AbstractRecipeList
{
    public $dish_category = '';
    public $dish_subcategory = '';
    public $cuisine = '';
    public $menu = '';

    protected $queryString = [
        'dish_category',
        'dish_subcategory',
        'cuisine',
        'menu',
    ];

    public function mount(RecipeFilterRequest $request): void
    {
        // Validate URL params
        $validatedRequest = $request->validated();

        // Assigning values to variables from $validatedRequest
        // set '' if variable isn't valid
        $this->dish_category = $validatedRequest['dish_category'] ?? '';
        $this->dish_subcategory = $validatedRequest['dish_subcategory'] ?? '';
        $this->cuisine = $validatedRequest['cuisine'] ?? '';
        $this->menu = $validatedRequest['menu'] ?? '';

        // Return 404 if a dish_subcategory without a dish_category is passed
        if (!$this->dish_category && $this->dish_subcategory) {
            abort(404);
        }
    }

    public function getBaseQuery(): Builder
    {
        // Initializing variables for query
        $dish_category = $this->dish_category;
        $dish_subcategory = $this->dish_subcategory;
        $cuisine = $this->cuisine;
        $menu = $this->menu;

        // Filter logic using URL parameters
        $query = Recipe::when($dish_category, function ($query) use ($dish_category, $dish_subcategory){
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
            });

        return $query;
    }
}
