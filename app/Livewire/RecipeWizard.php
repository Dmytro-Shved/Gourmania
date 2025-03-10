<?php

namespace App\Livewire;

use App\Models\Cuisine;
use App\Models\DishCategory;
use App\Models\Menu;
use App\Models\Unit;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate; // extra
use Livewire\Component;
use Livewire\WithFileUploads;

class RecipeWizard extends Component
{
    use WithFileUploads;

    // CHANGE TO 1 LATER
    public $form_step = 1;

    public $dishCategories;
    public $cuisines;
    public $menus;
    public $units;

    // Fields Step 1
    #[Validate] // real-time validation
    #[Rule(['nullable','mimes:jpeg,png,webp'])]
    public $recipe_image;
    public $recipe_name;
    public $recipe_description;
    public $recipe_category;
    public $recipe_cuisine;
    public $recipe_menu;

    // Fields Step 2
    public $ingredients = [
        []
    ];
    public $ingredient = ['ingredient_name' => null, 'ingredient_quantity' => null, 'ingredient_unit' => null];

    // Fields Step 3
    public $guide_steps = [
        ['step_image' => null, 'step_text' => null],
    ];
    public $guide_step = ['step_image' => null, 'step_text' => null];

    public function mount()
    {
        $this->dishCategories = DishCategory::get();
        $this->cuisines = Cuisine::get();
        $this->menus = Menu::get();
        $this->units = Unit::get();
    }

    public function next_step()
    {
        $this->resetErrorBag();

        $this->validateFields();

        $this->form_step++;
    }

    public function reset_recipe_image()
    {
        $this->recipe_image = null;
    }

    public function reset_step_image($index)
    {
        $this->guide_steps[$index]['step_image'] = null;
    }

    public function prev_step()
    {
         $this->form_step--;
    }

    public function render()
    {
        return view('livewire.recipe-wizard');
    }

    public function add_ingredient()
    {
        $this->ingredients[] = $this->ingredient;
    }


    public function remove_ingredient($index)
    {
        unset($this->ingredients[$index]);

        // reshuffle indexes after deleting
        $this->ingredients = array_values($this->ingredients);
    }

    public function add_step()
    {
        $this->guide_steps[] = $this->guide_step;
    }

    public function remove_step($index)
    {
        unset($this->guide_steps[$index]);

        // reshuffle indexes after deleting
        $this->guide_steps = array_values($this->guide_steps);
    }

    public function store()
    {
        $this->resetErrorBag();

        $this->validateFields();

        dump('ok');
    }

     public function validateFields(){
        if ($this->form_step == 1){
            $this->validate([
                // Step 1 rules
                'recipe_name' => ['required', 'string', 'unique:recipes,name', 'max:255'],
                'recipe_description' => ['required', 'string', 'max:255'],
                'recipe_category' => ['required'],
                'recipe_cuisine' => ['required'],
                'recipe_menu' => ['required'],
            ]);
        }else if ($this->form_step == 2){
            $this->validate([
                // Step 2 rules
                'ingredients.*.ingredient_name' => ['required', 'string', 'max:255'],
                'ingredients.*.ingredient_quantity' => ['required', 'integer', 'max:999'],
                'ingredients.*.ingredient_unit' => ['required'],
            ]);
        }else if($this->form_step == 3){
            // Step 3 rules
            $this->validate([
                'guide_steps.*.step_image' => ['nullable', 'mimes:jpeg,png,webp'],
                'guide_steps.*.step_text' => ['required','string', 'max:255'],
            ]);
        }
     }


    protected function messages()
    {
        return [
            // Step 1 messages
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
            // END Step 1 messages

            // Step 2 messages
            'ingredients.*.ingredient_name.required' => 'Required',
            'ingredients.*.ingredient_name.string' => 'Invalid type',
            'ingredients.*.ingredient_name.max' => 'Too long',

            'ingredients.*.ingredient_quantity.required' => 'Required',
            'ingredients.*.ingredient_quantity.integer' => 'Invalid type',
            'ingredients.*.ingredient_quantity.max' => 'Too big',

            'ingredients.*.ingredient_unit.required' => 'Required',
            // END Step 2 messages

            // Step 3 messages
            'guide_steps.*.step_image.mimes' => 'The image must be a file of type: jpeg, png, webp',

            'guide_steps.*.step_text.required' => 'Required',
            'guide_steps.*.step_text.string' => 'Invalid type',
            'guide_steps.*.step_text.max' => 'Text is too long',
            // END Step 3 messages
        ];
    }
}

