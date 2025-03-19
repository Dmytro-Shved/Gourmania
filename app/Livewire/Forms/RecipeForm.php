<?php

namespace App\Livewire\Forms;

use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RecipeForm extends Form
{
    #[Validate]
    #[Rule(['nullable','mimes:jpeg,png,webp'])]
    public $image;
    public $name;
    public $description;
    public $category;
    public $cuisine;
    public $menu;
    public $cook_time;
    public $servings;

    public function resetRecipeImage(): void
    {
        $this->image = null;
    }

    public function storeRecipeImage(): ?string
    {
        // Check if temp image exists then store
        if ($this->image){
            $recipe_image_path = $this->image->store('recipes-images', 'public');
        }else{
            $recipe_image_path = null;
        }

        return $recipe_image_path;
    }

    public function createRecipe($finalIngredients): Recipe
    {
        $recipe_data = [
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->storeRecipeImage(),
            'cook_time' => $this->cook_time,
            'servings' => $this->servings,
            'dish_category_id' => $this->category,
            'cuisine_id' => $this->cuisine,
            'menu_id' => $this->menu,
        ];

        if ($recipe_data['image'] === null){
            unset($recipe_data['image']);
        }

        $recipe = Auth::user()->recipes()->create($recipe_data);

        $recipe->ingredients()->attach(
            collect($finalIngredients)->mapWithKeys(function ($ingredient){
                return [$ingredient['id'] => [
                    'quantity' => $ingredient['quantity'],
                    'unit_id' => $ingredient['unit_id'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]];
            })->toArray()
        );

        return $recipe;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:recipes,name', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'category' => ['required'],
            'cuisine' => ['required'],
            'menu' => ['nullable'],
            'cook_time' => ['required', 'date_format:H:i', 'not_in:00:00'],
            'servings' => ['required', 'integer', 'min:1', 'max:99'],
        ];
    }

    public function messages(): array
    {
        return [
            'image.mimes' => 'The recipe image must be a file of type: jpeg, png, webp',
            'name.required' => 'Required',
            'name.string' => 'Recipe name must be a string',
            'name.unique:App\Models\Recipe, name' => 'This recipe name has already been taken',
            'name.max' => 'This recipe name is too long',

            'description.string' => 'Description must be a string',
            'description.max' => 'Description is too long',

            'category.required' => 'Required',
            'cuisine.required' => 'Required',

            'cook_time.required' => 'Required',
            'cook_time.not_in' => 'Invalid format',
            'servings.required' => 'Required',
        ];
    }
}
