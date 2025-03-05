<?php

namespace App\Livewire;

use App\Models\Cuisine;
use App\Models\DishCategory;
use App\Models\Menu;
use App\Models\Unit;
use Livewire\Component;

class RecipeWizard extends Component
{
    public $form_step = 1;

    public $dishCategories;
    public $cuisines;
    public $menus;
    public $units;

    public function mount()
    {
        $this->dishCategories = DishCategory::get();
        $this->cuisines = Cuisine::get();
        $this->menus = Menu::get();
        $this->units = Unit::get();
    }

    public function next_step()
    {
         $this->form_step++;
    }

    public function prev_step()
    {
         $this->form_step--;
    }

    public function render()
    {
        return view('livewire.recipe-wizard');
    }
}
