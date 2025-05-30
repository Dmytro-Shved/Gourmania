<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Builder;

class SavedRecipes extends RecipeList
{
    public function getBaseQuery(): Builder
    {
        return auth()->user()->savedRecipes()->getQuery();
    }
}
