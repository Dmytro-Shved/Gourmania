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
        $this->dishCategory = request()->get('dish_category', null);
        $this->dishSubcategory = request()->get('dish_subcategory', null);

        $this->cuisine = request()->get('cuisine', null);
        $this->menu = request()->get('menu', null);

        $this->dishCategories = DishCategory::all();

        $this->dishSubcategories = $this->dishCategory
            ? DishSubcategory::where('dish_category_id', $this->dishCategory)->get()
            : collect();

        $this->cuisines = Cuisine::get();
        $this->menus = Menu::get();
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
