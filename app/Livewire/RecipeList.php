<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

abstract class RecipeList extends Component
{
    use WithPagination;

    // Default sorting parameter
    public string $sort = 'popularity';

    public function render()
    {
        $recipes = $this->getRecipes();
        $recipes = $recipes->paginate(10)->withQueryString();

        return view('livewire.recipe-list', [
            'recipes' => $recipes
        ]);
    }

    // Child component must realize this logic
    abstract protected function getBaseQuery(): Builder;

    // Get recipes and load relationships
    protected function getRecipes(){
        $query = $this->getBaseQuery()
            ->with(['user', 'ingredients.pivot.unit', 'cuisine', 'dishCategory', 'savedByUsers'])
            ->withCount([
                'votes as likesCount' => fn (Builder $query) => $query->where('vote', 1),
                'votes as dislikesCount' => fn (Builder $query) => $query->where('vote', -1),
                'savedByUsers as savedCount',
            ]);

        return $this->applySorting($query);
    }

    // Sorting logic
    public function applySorting($query)
    {
        return match ($this->sort){
            'popularity' => $query
                ->orderByDesc('savedCount')
                ->orderByDesc('likesCount')
                ->orderBy('dislikesCount')
                ->orderByDesc('created_at'),
            'newest' => $query->orderByDesc('created_at'),
            'oldest' => $query->orderBy('created_at'),
        };
    }
}
