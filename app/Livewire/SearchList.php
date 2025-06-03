<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class SearchList extends Component
{
    public string $search = '';

    public function updatedSearch($val)
    {
        $this->search = $val;
    }

    public function render()
    {
       $recipes = $this->search
           ? Recipe::where('name', 'like', '%'.$this->search.'%')
               ->select(['id', 'name', 'image'])
               ->take(3)
               ->get()
           : collect();

        return view('livewire.search-list', compact('recipes'));
    }
}
