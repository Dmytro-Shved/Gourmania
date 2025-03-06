<?php

namespace App\Livewire;

use App\Models\Cuisine;
use App\Models\DishCategory;
use App\Models\Menu;
use App\Models\Unit;
use Livewire\Component;
use Livewire\WithFileUploads;

class RecipeWizard extends Component
{
    use WithFileUploads;

    // CHANGE TO 1 LATER
    public $form_step = 2;

    public $dishCategories;
    public $cuisines;
    public $menus;
    public $units;

    // Fields Step 1
    public $recipe_image;
    public $recipe_name;
    public $recipe_description;
    public $recipe_category;
    public $recipe_cuisine;
    public $recipe_menu;

    // Fields Step 2
    public $ingredients = [
        ['ingredient_name' => 'Chicken', 'ingredient_quantity' => 1, 'ingredient_unit' => 1]
    ];
    public $ingredient = [];

    public function mount()
    {
        $this->dishCategories = DishCategory::get();
        $this->cuisines = Cuisine::get();
        $this->menus = Menu::get();
        $this->units = Unit::get();
    }

    public function next_step()
    {
//        $this->resetErrorBag();

        $this->validate();

        $this->form_step++;
    }


    public function reset_recipe_image()
    {
        $this->recipe_image = null;
    }

    public function prev_step()
    {
         $this->form_step--;
    }

    public function render()
    {
        return view('livewire.recipe-wizard');
    }

    protected function rules()
    {
        return [
            'recipe_image'=> [ 'nullable','mimes:jpeg,png,webp'],
            'recipe_name' => ['required', 'string', 'unique:recipes,name', 'max:255'],
            'recipe_description' => ['required', 'string', 'max:255'],
            'recipe_category' => ['required'],
            'recipe_cuisine' => ['required'],
            'recipe_menu' => ['required']
        ];
    }

    protected function messages()
    {
        return [
            'recipe_image.mimes' => 'The recipe image must be a file of type: jpeg, png, webp',

            'recipe_name.required' => 'Recipe name is required',
            'recipe_name.string' => 'Recipe name must be a string',
            'recipe_name.unique:App\Models\Recipe, name' => 'This recipe name has already been taken',
            'recipe_name.max' => 'This recipe name is too long',

            'recipe_description.required' => 'Description is required',
            'recipe_description.string' => 'Description must be a string',
            'recipe_description.max' => 'Description is too long',

            'recipe_category.required' => 'Required',
            'recipe_cuisine.required' => 'Required',
            'recipe_menu.required' => 'Required',
        ];
    }
}
