<?php

namespace App\Livewire;

use App\Http\Requests\RecipeFilterRequest;
use App\Models\Recipe;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class RecipeList extends Component
{
    use WithPagination;

    public $dish_category = '';
    public $dish_subcategory = '';
    public $cuisine = '';
    public $menu = '';

    protected $queryString = [
        'dish_category',
        'dish_subcategory',
        'cuisine',
        'menu',
    ];

    public function mount(RecipeFilterRequest $request): void
    {
        $validatedRequest = $request->validated();

        $this->dish_category = $validatedRequest['dish_category'] ?? '';
        $this->dish_subcategory ??= $validatedRequest['dish_subcategory'] ?? '';
        $this->cuisine ??= $validatedRequest['cuisine'] ?? '';
        $this->menu ??= $validatedRequest['menu'] ?? '';

        if (!$this->dish_category && $this->dish_subcategory) {
            abort(404);
        }
    }

    public function render(): View
    {
        $recipes = $this->getFilteredRecipes();

        return view('livewire.recipe-list', [
            'recipes' => $recipes
        ]);
    }

    public function handleSort($value)
    {
        // code for sorting
    }

    public function getFilteredRecipes(): \Illuminate\Pagination\LengthAwarePaginator
    {
        $dish_category = $this->dish_category;
        $dish_subcategory = $this->dish_subcategory;
        $cuisine = $this->cuisine;
        $menu = $this->menu;

        $recipes = Recipe::with('user', 'ingredients.pivot.unit', 'cuisine', 'dishCategory')
            ->when($dish_category, function ($query) use ($dish_category, $dish_subcategory){
                $query
                    ->where('dish_category_id', $dish_category)
                    ->when($dish_subcategory, function ($query, $dish_subcategory){
                        $query->where('dish_subcategory_id', $dish_subcategory);
                    });
            })
            ->when($cuisine, function ($query, $cuisine){
                $query->where('cuisine_id', $cuisine);
            })
            ->when($menu, function ($query, $menu){
                $query->where('menu_id', $menu);
            })
            ->paginate(2);

        return $recipes;
    }
}
