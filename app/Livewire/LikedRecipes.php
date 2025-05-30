<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Builder;

class LikedRecipes extends RecipeList
{
    public function getBaseQuery(): Builder
    {
        return auth()->user()->likedRecipes()->getQuery();
    }
}
