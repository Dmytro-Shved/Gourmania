<?php

namespace App\Livewire;

use App\Models\Cuisine;
use App\Models\DishCategory;
use App\Models\Menu;
use Livewire\Component;

class RecipeWizard extends Component
{
    public $form_step = 1;
    public $total_steps = 3;

    public $dishCategories;
    public $cuisines;
    public $menus;

    public function mount()
    {
        $this->dishCategories = DishCategory::get();
        $this->cuisines = Cuisine::get();
        $this->menus = Menu::get();
    }

    // From the db soon
    public array $units = [
        'kg', 'g', 'piece',
        'head', 'liter', 'to taste',
        'bunche', 'twig', 'stem'
    ];

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
