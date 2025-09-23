<?php

namespace App\Livewire;

use App\Models\Cuisine;
use App\Models\DishCategory;
use App\Models\DishSubcategory;
use App\Models\Menu;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Filter extends Component
{
    public $dishSubcategories;

    public $dishCategory;
    public $dishSubcategory;
    public $cuisine;
    public $menu;

    #[Computed()]
    public function dishCategories()
    {
        return cache()->remember('dish-categories', Carbon::today()->addDay(), function (){
            return DishCategory::get();
        });
    }

    #[Computed()]
    public function cuisines()
    {
        return cache()->remember('cuisines', Carbon::today()->addDay(), function (){
            return Cuisine::orderBy('name')->get();
        });
    }

    #[Computed()]
    public function menus()
    {
        return cache()->remember('menus', Carbon::today()->addDay(), function (){
            return Menu::get();
        });
    }

    public function mount()
    {
        $this->dishCategory = request()->get('dish_category', null);
        $this->dishSubcategory = request()->get('dish_subcategory', null);

        $this->cuisine = request()->get('cuisine', null);
        $this->menu = request()->get('menu', null);

        $this->dishSubcategories = $this->dishCategory
            ? DishSubcategory::where('dish_category_id', $this->dishCategory)->get()
            : collect();
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
