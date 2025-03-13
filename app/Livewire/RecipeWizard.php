<?php

namespace App\Livewire;

use App\Models\Cuisine;
use App\Models\DishCategory;
use App\Models\GuideStep;
use App\Models\Ingredient;
use App\Models\Menu;
use App\Models\Recipe;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class RecipeWizard extends Component
{
    use WithFileUploads;

    public $form_step = 1;

    public $dishCategories;
    public $cuisines;
    public $menus;
    public $units;

    // Fields Step 1
    #[Validate]
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
    public function prev_step()
    {
         $this->form_step--;
    }

    public function reset_recipe_image()
    {
        $this->recipe_image = null;
    }

    public function reset_step_image($index)
    {
        $this->guide_steps[$index]['step_image'] = null;
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

       if (empty($this->ingredients)){
           $this->ingredients[] = $this->ingredient;
       }
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

        if (empty($this->guide_steps)){
            $this->guide_steps[] = $this->guide_step;
        }
    }

    public function store()
    {
        $this->resetErrorBag();
        if ($this->form_step == 3){
            $this->validate([
                'guide_steps.*.step_image' => ['nullable', 'mimes:jpeg,png,webp'],
                'guide_steps.*.step_text' => ['required','string', 'max:255'],
            ]);
        }

        $ingredientsGrouped = collect($this->ingredients)
            ->groupBy('ingredient_name') // Group by ingredient name
            ->map(function ($group) {
                return [
                    'ingredient_name' => $group->first()['ingredient_name'], // Take the first name
                    'ingredient_quantity' => $group->sum('ingredient_quantity'), // Sum quantities
                    'ingredient_unit' => $group->first()['ingredient_unit'], // Take the first unit
                ];
            });

        $finalIngredients = []; // Data to attach to pivot table

        foreach ($ingredientsGrouped as $ingredientData){
            // Check if the ingredient exists (get the existed one or create and save to database)
            $ingredient = Ingredient::firstOrCreate(
                ['name' => trim($ingredientData['ingredient_name'])], // Match by name
            );

            // Prepare data for pivot table
            $finalIngredients[] = [
              'id' => $ingredient->id,
              'quantity' => $ingredientData['ingredient_quantity'],
              'unit_id' => $ingredientData['ingredient_unit'],
            ];
        }

        // Check if temp image exists then store
        if ($this->recipe_image){
            $recipe_image_path = $this->recipe_image->store('recipes-images', 'public');
        }else{
            $recipe_image_path = null;
        }

        // Create the recipe
        $recipe_data = [
            'name' => $this->recipe_name,
            'description' => $this->recipe_description,
            'image' => $recipe_image_path,
            'dish_category_id' => $this->recipe_category,
            'cuisine_id' => $this->recipe_cuisine,
            'menu_id' => $this->recipe_menu,
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

        $groupedSteps = collect($this->guide_steps)->map(function ($step, $index) use ($recipe){
            return [
                'recipe_id' => $recipe->id,
                'step_number' => $index + 1,
                'step_text' => trim($step['step_text']),
                'step_image' => $step['step_image']
                    ? $step['step_image']->store('guides-images', 'public')
                    : 'recipes-images/default/default_photo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        })->toArray();

        GuideStep::insert($groupedSteps);

        session()->flash('recipe_created', 'Recipe created successfully!');

        $this->redirect('/recipes/create');
    }

     public function validateFields(){
        if ($this->form_step == 1){
            $this->validate([
                // Step 1 rules
                'recipe_name' => ['required', 'string', 'unique:recipes,name', 'max:255'],
                'recipe_description' => ['nullable', 'string', 'max:255'],
                'recipe_category' => ['required'],
                'recipe_cuisine' => ['required'],
                'recipe_menu' => ['nullable'],
            ]);

        }else if ($this->form_step == 2){
            $this->validate([
                // Step 2 rules
                'ingredients' => ['required', 'array'],
                'ingredients.*.ingredient_name' => ['required', 'string', 'max:255'],
                'ingredients.*.ingredient_quantity' => ['required', 'numeric', 'min:0.1', 'max:999.99', 'regex:/^\d{1,3}(\.\d{1,2})?$/'],
                'ingredients.*.ingredient_unit' => ['required'],
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

            'recipe_description.string' => 'Description must be a string',
            'recipe_description.max' => 'Description is too long',

            'recipe_category.required' => 'Required',
            'recipe_cuisine.required' => 'Required',
            // END Step 1 messages

            // Step 2 messages
            'ingredients.*.ingredient_name.required' => 'Required',
            'ingredients.*.ingredient_name.string' => 'Invalid type',
            'ingredients.*.ingredient_name.max' => 'Too long',

            'ingredients.*.ingredient_quantity.required' => 'Required',
            'ingredients.*.ingredient_quantity.decimal' => 'Invalid type',
            'ingredients.*.ingredient_quantity.max' => 'Too big',
            'ingredients.*.ingredient_quantity.min' => 'Too small',
            'ingredients.*.ingredient_quantity.regex' => 'Invalid format',

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

