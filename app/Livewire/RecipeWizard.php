<?php

namespace App\Livewire;

use Livewire\Component;

class RecipeWizard extends Component
{
    public $form_step = 1;
    public $total_steps = 3;

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
