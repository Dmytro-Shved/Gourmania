<?php

namespace App\Livewire;

use App\Models\Cuisine;
use App\Models\DishCategory;
use App\Models\DishSubcategory;
use App\Models\Menu;
use Livewire\Component;

class Filter extends Component
{
    public $dishCategories;
    public $dishSubcategories;

    public $dishCategory;
    public $dishSubcategory;

    public $cuisines;
    public $menus;

    public $cuisine;
    public $menu;

    public function mount()
    {
        // Get id of parameter from request()
        $this->dishCategory = request()->get('dish_category', null);
        $this->dishSubcategory = request()->get('dish_subcategory', null);
        $this->cuisine = request()->get('cuisine', null);
        $this->menu = request()->get('menu', null);

        // Cache Dish Categories for 24h
        $this->dishCategories = cache()->remember('dish-categories', 60*60*24, function (){
            return DishCategory::get();
        });

        // Get Dish Category by given Dish Subcategory id
        $this->dishSubcategories = $this->dishCategory
            ? DishSubcategory::where('dish_category_id', $this->dishCategory)->get()
            : collect();

        // Cache cuisines for 24h
        $this->cuisines = cache()->remember('cuisines', 60*60*24, function (){
            return Cuisine::get();
        });

        // Cache menus for 24h
        $this->menus = cache()->remember('menus', 60*60*24, function (){
            return Menu::get();
        });
    }

    public function render()
    {
        return view('livewire.filter');
    }

    public function updatedDishCategory($value)
    {
        $this->dishSubcategory = null;
        return $this->dishSubcategories = DishSubcategory::where('dish_category_id', $value)->get();
    }
}
