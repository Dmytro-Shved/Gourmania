<?php

namespace App\Livewire;

use App\Models\Cuisine;
use App\Models\DishCategory;
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
    public $cuisines;
    public $menus;
    public $units;

    public function mount(Recipe $recipe): void
    {
        $this->dishCategories = DishCategory::get();
        $this->cuisines = Cuisine::get();
        $this->menus = Menu::get();
        $this->units = Unit::get();

        if (isset($recipe->id)){
            $this->recipeForm->setRecipe($recipe);
            $this->ingredientsForm->setIngredients($recipe->ingredients);
            $this->guideForm->setGuide($recipe->guideSteps);
            $this->guideForm->setRecipeForm($this->recipeForm);
        }
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

    public function add_step(): void
    {
        $this->guideForm->addStep();
    }

    public function remove_step($index): void
    {
        $this->guideForm->removeStep($index);
    }

    public function store(): void
    {
        $this->resetErrorBag();
        if ($this->form_step == 3){
            $this->guideForm->validate();
        }

        $finalIngredients = $this->ingredientsForm->prepareFinalIngredients();

        $recipe = $this->recipeForm->updateOrCreateRecipe($finalIngredients);

//        $this->guideForm->upsertGroupedSteps($recipe->id);
        $this->guideForm->updateGroupedSteps($recipe->id);

        session()->flash('recipe_created', 'Recipe created successfully!');

        $this->redirect('/recipes/create');
    }
}
