<?php

namespace App\Livewire;

use App\HasSorting;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractRecipeList extends Component
{
    use WithPagination;
    use HasSorting;

    public string $sort = 'popularity';

    public function render()
    {
        $recipes = $this->getRecipes();
        $recipes = $recipes->paginate(2)->withQueryString();

        return view('livewire.recipe-list', [
            'recipes' => $recipes
        ]);
    }

    abstract protected function getBaseQuery(): Builder;

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
}
