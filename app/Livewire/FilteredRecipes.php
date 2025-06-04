<?php

namespace App\Livewire;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Builder;

class FilteredRecipes extends RecipeList
{
    public string $dish_category = '';
    public string $dish_subcategory = '';
    public string $cuisine = '';
    public string $menu = '';

    protected $queryString = [
        'dish_category',
        'dish_subcategory',
        'cuisine',
        'menu',
    ];

    public function mount(array $filters): void
    {
        // Assigning values to variables from $validatedRequest
        // set '' if variable isn't valid
        $this->dish_category = $filters['dish_category'] ?? '';
        $this->dish_subcategory = $filters['dish_subcategory'] ?? '';
        $this->cuisine = $filters['cuisine'] ?? '';
        $this->menu = $filters['menu'] ?? '';

        // Return 404 if a dish_subcategory without a dish_category is passed
        if (!$this->dish_category && $this->dish_subcategory) {
            abort(404);
        }
    }

    public function getBaseQuery(): Builder
    {
        // Filter logic using URL parameters
        $query = Recipe::when($this->dish_category, function ($query) {
                $query
                    ->where('dish_category_id', $this->dish_category)
                    ->when($this->dish_subcategory, function ($query){
                        $query->where('dish_subcategory_id', $this->dish_subcategory);
                    });
            })
            ->when($this->cuisine, function ($query){
                $query->where('cuisine_id', $this->cuisine);
            })
            ->when($this->menu, function ($query){
                $query->where('menu_id', $this->menu);
            });

        return $query;
    }
}
