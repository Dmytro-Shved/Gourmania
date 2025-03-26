<?php

namespace App\Livewire\Forms;

use App\Models\GuideStep;
use Livewire\Form;

class GuideForm extends Form
{
    public $recipeId;

    public $steps = [
        ['image' => null, 'text' => null],
    ];

    public $step = ['image' => null, 'text' => null];

    public $current_step_image = [];

    public function setRecipeForm(RecipeForm $recipeForm): void
    {
        $this->recipeId = $recipeForm->id;
    }

    public function setGuide($guideSteps): void
    {
        foreach ($guideSteps as $step){
            // Consider the step_number for the correct order in the array
            $index = $step->step_number - 1;

            if (!isset($this->steps[$index])){
                $this->steps[$index] = $this->step;
            }

            $this->steps[$index]['text'] = $step->step_text;
            $this->current_step_image[$index] = $step->step_image;
        }
    }

    public function resetStepImage($index): void
    {
        $this->steps[$index]['image'] = null;
    }

    public function addStep(): void
    {
        $this->steps[] = $this->step;

        if ($this->recipeId){
            $this->current_step_image[] = null;
        }
    }

    public function removeStep($index): void
    {
        unset($this->steps[$index]);
        // reshuffle indexes after deleting
        $this->steps = array_values($this->steps);

        if ($this->recipeId){
            unset($this->current_step_image[$index]);
            $this->current_step_image = array_values($this->current_step_image);
        }

        if (empty($this->steps)) {
            $this->steps[] = $this->step;

        }elseif($this->recipeId) {
            $this->current_step_image[] = null;
        }
    }

    public function insertGroupedSteps($recipeId): void
    {
        $groupedSteps = collect($this->steps)->map(function ($step, $index) use ($recipeId){
            return [
                'recipe_id' => $recipeId,
                'step_number' => $index + 1,
                'step_text' => trim($step['text']),
                'step_image' => $step['image']
                    ? $step['image']->store('guides-images', 'public')
                    : 'recipes-images/default/default_photo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        })->toArray();

       if ($this->recipeId != 0) {
           GuideStep::where('recipe_id', $recipeId)->delete();
       }
       GuideStep::insert($groupedSteps);
    }

    public function rules(): array
    {
        return [
            'steps.*.image' => ['nullable', 'mimes:jpeg,png,webp'],
            'steps.*.text' => ['required','string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'steps.*.image.mimes' => 'The image must be a file of type: jpeg, png, webp',

            'steps.*.text.required' => 'Required',
            'steps.*.text.string' => 'Invalid type',
            'steps.*.text.max' => 'Text is too long',
        ];
    }
}
