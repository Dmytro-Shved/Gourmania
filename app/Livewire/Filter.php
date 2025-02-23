<?php

namespace App\Livewire;

use App\Models\Cuisine;
use App\Models\DishCategory;
use App\Models\Menu;
use App\Models\Recipe;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Filter extends Component
{
    public $dishCategoryID;
    public $recipeID;
    public $cuisineID;
    public $menuID;

    public function updatedDishCategoryID()
    {
        $this->recipeID = null;
    }

    #[Computed()]
    public function dishCategories()
    {
        return DishCategory::all();
    }

    #[Computed()]
    public function dishes()
    {
        return Recipe::where('dish_category_id', $this->dishCategoryID)->get();
    }

    #[Computed()]
    public function cuisines()
    {
        return Cuisine::all();
    }

    #[Computed()]
    public function menus()
    {
        return Menu::all();
    }

    public function render()
    {
        return view('livewire.filter');
    }
}
