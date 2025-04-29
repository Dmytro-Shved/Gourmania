<?php

namespace App\Livewire\Forms;

use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RecipeForm extends Form
{
    #[Locked]
    public int $id = 0;

    #[Locked]
    public $current_image;

    // Real time validation for image
    #[Validate]
    #[Rule(['nullable', 'mimetypes:image/jpeg,image/png,image/webp'])]
    public $image;
    public $name;
    public $description;
    public $category;
    public $subcategory;
    public $cuisine;
    public $menu;
    public $cook_time;
    public $servings;

    public function setRecipe(Recipe $recipe): void
    {
        $this->id = $recipe->id;
        $this->name = $recipe->name;
        $this->description = $recipe->description;
        $this->current_image = $recipe->image;
        $this->cook_time = $recipe->cook_time;
        $this->servings = $recipe->servings;

        $this->category = $recipe->dish_category_id;
        $this->subcategory = $recipe->dish_subcategory_id ? $recipe->dish_subcategory_id : null;
        $this->cuisine = $recipe->cuisine_id;
        $this->menu = $recipe->menu_id;
    }

    public function resetRecipeImage(): void
    {
        $this->image = null;
    }

    public function updateOrStoreRecipeImage(): ?string
    {
        if ($this->id == 0){
            // Check if temp image exists then store
            if ($this->image){
                $recipe_image_path = $this->image->store('recipes-images', 'public');
            }else{
                $recipe_image_path = null;
            }
        }else{
            $recipe_image_path = $this->current_image; // current path
            if ($this->image){
                if ($this->current_image != 'recipes-images/default/default_photo.png'){
                    Storage::disk('public')->delete($this->current_image);
                }
                $recipe_image_path = $this->image->store('recipes-images', 'public');
            }
        }
        return $recipe_image_path;
    }

    public function updateOrCreateRecipe($finalIngredients): Recipe
    {
        $recipe_data = [
            'name' => trim($this->name),
            'description' => trim($this->description),
            'image' => $this->updateOrStoreRecipeImage(),
            'cook_time' => $this->cook_time,
            'servings' => $this->servings,
            'dish_category_id' => $this->category,
            'dish_subcategory_id' => $this->subcategory === "" ? null : $this->subcategory,
            'cuisine_id' => $this->cuisine,
            'menu_id' => $this->menu === "" ? null : $this->menu,
        ];

        if ($recipe_data['image'] === null){
            unset($recipe_data['image']);
        }

        // If recipe doesn't exist create recipe
        // through auth user
        // otherwise update recipe using id and recipe_data
        if ($this->id == 0){
            $recipe = Auth::user()->recipes()->create($recipe_data);
        }else{
            $recipe = Recipe::find($this->id);
            $recipe->update($recipe_data);
        }

        // Sync ingredients in pivot table
        $recipe->ingredients()->sync(
            collect($finalIngredients)->mapWithKeys(function ($ingredient){
                return [$ingredient['id'] => [
                    'quantity' => $ingredient['quantity'],
                    'unit_id' => $ingredient['unit_id'],
                ]];
            })->toArray()
        );

        return $recipe;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', \Illuminate\Validation\Rule::unique('recipes')->ignore($this->id), 'max:255',],
            'description' => ['nullable', 'string', 'max:255'],
            'category' => ['required'],
            'subcategory' => ['nullable'],
            'cuisine' => ['required'],
            'menu' => ['nullable'],
            'cook_time' => ['required', 'date_format:H:i', 'not_in:00:00'],
            'servings' => ['required', 'integer', 'min:1', 'max:99'],
        ];
    }

    public function messages(): array
    {
        return [
            'image.mimes' => 'Image must be a file of type: jpeg, png, webp',
            'image.image' => 'Invalid type',
            'image.max' => 'Too big image',

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
