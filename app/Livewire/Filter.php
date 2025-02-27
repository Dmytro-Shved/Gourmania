<?php

namespace App\Livewire;

use App\Models\Cuisine;
use App\Models\DishCategory;
use App\Models\Menu;
use App\Models\Recipe;
use Livewire\Component;

class Filter extends Component
{
    public $dishCategories;
    public $dishes;

    public $dishCategory;
    public $dish;

    public $cuisines;
    public $menus;

    public $cuisine;
    public $menu;

//    public function mount()
//    {
//        $this->dishCategories = DishCategory::all();
//        $this->dishes = collect();
//
//        $this->cuisines = Cuisine::get();
//        $this->menus = Menu::get();
//    }

//    public function mount()
//    {
//        $this->dishCategory = null;
//        $this->dish = null;
//        $this->dishCategories = DishCategory::all();
//        $this->dishes = collect();
//
//        $this->cuisines = Cuisine::get();
//        $this->menus = Menu::get();
//    }

    public function mount()
    {
        $this->dishCategory = request()->get('dish_category', null);
        $this->dish = request()->get('dish', null);

        $this->cuisine = request()->get('cuisine', null);
        $this->menu = request()->get('menu', null);

        $this->dishCategories = DishCategory::all();

        $this->dishes = $this->dishCategory
            ? Recipe::where('dish_category_id', $this->dishCategory)->get()
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
        return $this->dishes = Recipe::where('dish_category_id', $value)->get();
    }
}
