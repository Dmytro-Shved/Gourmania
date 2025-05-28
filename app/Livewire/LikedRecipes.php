<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
use App\HasSorting;

class LikedRecipes extends Component
{
    use WithPagination;
    use HasSorting;

    public string $sort = 'popularity';

    public function render()
    {
        $recipes = $this->getLikedRecipes();

        return view('livewire.liked-recipes', [
            'recipes' => $recipes
        ]);
    }

    public function getLikedRecipes()
    {
        $query = auth()->user()->likedRecipes()
            ->with(['user', 'ingredients.pivot.unit', 'cuisine', 'dishCategory', 'savedByUsers'])
            ->withCount([
                'votes as likesCount' => fn (Builder $query) => $query->where('vote', 1),
                'votes as dislikesCount' => fn (Builder $query) => $query->where('vote', -1),
                'savedByUsers as savedCount',
            ]);

        // Sort
        $query = $this->applySorting($query);

        // Paginate
        return $query->paginate(1);
    }
}
