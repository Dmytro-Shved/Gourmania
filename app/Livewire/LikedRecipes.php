<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Builder;

class LikedRecipes extends AbstractRecipeList
{
    public function getBaseQuery(): Builder
    {
        return auth()->user()->likedRecipes()->getQuery();
    }
}
