<?php

namespace App\Livewire;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Builder;

class SearchedRecipes extends RecipeList
{
    public string $q = '';

    protected $queryString = [
        'q',
    ];

    public function mount(string $q): void
    {
        $this->q = $q;
    }

    public function getBaseQuery(): Builder
    {
        // Search logic using URL parameter
        $query = Recipe::when($this->q, function ($query) {
            $query->where('name', 'like', '%'.$this->q.'%');
        });

        return $query;
    }
}
