<?php

namespace App\Livewire;

use App\Models\Cuisine;
use App\Models\DishCategory;
use App\Models\GuideStep;
use App\Models\Ingredient;
use App\Models\Menu;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class RecipeWizard extends Component
{
    use WithFileUploads;

    public Forms\RecipeForm $recipeForm;
    public Forms\IngredientsForm $ingredientsForm;
    public Forms\GuideForm $guideForm;

    public $form_step = 1;

    public $dishCategories;
    public $cuisines;
    public $menus;
    public $units;

    public function mount(): void
    {
        $this->dishCategories = DishCategory::get();
        $this->cuisines = Cuisine::get();
        $this->menus = Menu::get();
        $this->units = Unit::get();
    }

    public function render(): View
    {
        return view('livewire.recipe-wizard');
    }

    public function next_step(): void
    {
        $this->resetErrorBag();
        $this->validateFields();
        $this->form_step++;
    }

    public function prev_step(): void
    {
         $this->form_step--;
    }

    public function validateFields(): void
    {
        if ($this->form_step == 1){
            $this->recipeForm->validate();
        }else if ($this->form_step == 2){
            $this->ingredientsForm->validate();
        }
    }

    public function reset_recipe_image(): void
    {
        $this->recipeForm->resetRecipeImage();
    }

    public function add_ingredient(): void
    {
        $this->ingredientsForm->addIngredient();
    }

    public function remove_ingredient($index): void
    {
        $this->ingredientsForm->removeIngredient($index);
    }

    public function reset_step_image($index): void
    {
        $this->guideForm->resetStepImage($index);
    }

    public function add_step()
    {
        $this->guideForm->addStep();
    }

    public function remove_step($index)
    {
        $this->guideForm->removeStep($index);
    }

    public function store()
    {
        $this->resetErrorBag();
        if ($this->form_step == 3){
            $this->guideForm->validate();
        }

        dd('now store data');

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
            'cook_time' => $this->recipe_time,
            'servings' => $this->recipe_servings,
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
}
