<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Builder;

class SavedRecipes extends AbstractRecipeList
{
    public function getBaseQuery(): Builder
    {
        return auth()->user()->savedRecipes()->getQuery();
    }
}
