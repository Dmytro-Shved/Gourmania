<?php

namespace App\Livewire;

use App\HasSorting;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class SavedRecipes extends Component
{
    use WithPagination;
    use HasSorting;

    public string $sort = 'popularity';

    public function render()
    {
        $recipes = $this->getSavedRecipes();

        return view('livewire.saved-recipes', [
            'recipes' => $recipes
        ]);
    }

    public function getSavedRecipes()
    {
        $query = auth()->user()->savedRecipes()
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
