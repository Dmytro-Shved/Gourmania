<?php

namespace App\Livewire;

use App\Models\Cuisine;
use App\Models\DishCategory;
use App\Models\DishSubcategory;
use App\Models\Menu;
use App\Models\Recipe;
use App\Models\Unit;
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
    public $dishSubcategories;
    public $cuisines;
    public $menus;
    public $units;

    public function mount(Recipe $recipe): void
    {
        $this->dishCategories = DishCategory::get();
        $this->dishSubcategories = collect();

        $this->cuisines = Cuisine::get();
        $this->menus = Menu::get();
        $this->units = Unit::get();

        // If you are editing a recipe,
        // fill in the input fields data
        if (isset($recipe->id)){
            $this->recipeForm->setRecipe($recipe);

            // get a list of categories based on $this->recipeForm->category
            // then in RecipeForm we'll get the proper subcategory in setRecipe()
            $this->dishSubcategories = $this->recipeForm->category
                ? DishSubcategory::where('dish_category_id', $this->recipeForm->category)->get()
                : collect();

            $this->ingredientsForm->setIngredients($recipe->ingredients);
            $this->guideForm->setGuide($recipe->guideSteps);
            $this->guideForm->setRecipeForm($this->recipeForm);
        }
    }

    // Update list of subcategories
    // if category was updated
    public function updatedRecipeFormCategory($value): void
    {
        $this->recipeForm->subcategory = null;
        $this->dishSubcategories = DishSubcategory::where('dish_category_id', $value)->get();
    }

    public function render(): View
    {
        return view('livewire.recipe-wizard');
    }

    // Next wizard step
    public function next_step(): void
    {
        $this->resetErrorBag();
        $this->validateFields();
        $this->form_step++;
    }

    // Previous wizard step
    public function prev_step(): void
    {
         $this->form_step--;
    }

    // Validate fields 1 & 2
    // 3 step validates in store()
    public function validateFields(): void
    {
        if ($this->form_step == 1){
            $this->recipeForm->validate();
        }else if ($this->form_step == 2){
            $this->ingredientsForm->validate();
        }
    }

    // Reset recipe image
    // wizard step 1
    public function reset_recipe_image(): void
    {
        $this->recipeForm->resetRecipeImage();
    }

    // Add ingredient
    public function add_ingredient(): void
    {
        $this->ingredientsForm->addIngredient();
    }

    // Remove ingredient
    public function remove_ingredient($index): void
    {
        $this->ingredientsForm->removeIngredient($index);
    }

    // Reset guide step image
    public function reset_step_image($index): void
    {
        $this->guideForm->resetStepImage($index);
    }

    // Add new guide step
    public function add_step(): void
    {
        $this->guideForm->addStep();
    }

    // Remove guide step
    public function remove_step($index): void
    {
        $this->guideForm->removeStep($index);
    }

    public function store(): void
    {
        // Validate fields in 3 wizard step
        $this->resetErrorBag();
        if ($this->form_step == 3){
            $this->guideForm->validate();
        }

        // Ingredients data
        $finalIngredients = $this->ingredientsForm->prepareFinalIngredients();

        // Recipe data
        $recipe = $this->recipeForm->updateOrCreateRecipe($finalIngredients);

        // Guide data
        $this->guideForm->storeGroupedSteps($recipe->id);

        // Flash message
        if ($this->recipeForm->id == 0){
            // Recipe created
            session()->flash('recipe_created', 'Recipe created successfully!');
        }else{
            // Recipe updated
            session()->flash('recipe_updated', 'Recipe updated successfully!');
        }

        // Redirect to create recipe page
        $this->redirect(route('recipes.create'));
    }
}
