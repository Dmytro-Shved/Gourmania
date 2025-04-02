<?php

namespace App\Livewire\Forms;

use App\Models\GuideStep;
use Illuminate\Support\Facades\Storage;
use Livewire\Form;

use Illuminate\Support\Facades\DB;

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

    public function storeGroupedSteps($recipeId): void
    {
        $groupedSteps = collect($this->steps)->map(function ($step, $index) use ($recipeId){
            return [
                'recipe_id' => $recipeId,
                'step_number' => $index + 1,
                'step_text' => trim($step['text']),
                'step_image' => $step['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        })->toArray();

        // edit steps
        if ($this->recipeId != 0){

            // Fetch existing steps
            $existingSteps = GuideStep::where('recipe_id', $recipeId)
                ->pluck('id', 'step_number')
                ->toArray();

            $newStepNumbers = [];
            $updateData = [];

            foreach ($groupedSteps as $index => $step) {
                $stepNumber = $step['step_number'];
                $newStepNumbers[] = $stepNumber;

                if (isset($existingSteps[$stepNumber])) {
                    // current step image path
                    $step_image_path = $this->current_step_image[$index];

                    // if new image exists delete the old one and store new image
                    if (!empty($step['step_image'])) {
                        if (isset($this->current_step_image[$index]) && $this->current_step_image[$index] !== 'recipes-images/default/default_photo.png') {
                            Storage::disk('public')->delete($this->current_step_image[$index]);
                        }
                        $step_image_path = $step['step_image']->store('guides-images', 'public');
                    }

                    // Prepare update data
                    $updateData[] = [
                        'id' => $existingSteps[$stepNumber],
                        'step_text' => $step['step_text'],
                        'step_image' => $step_image_path ?? 'recipes-images/default/default_photo.png',
                        'updated_at' => now(),
                    ];
                }else{
                    // Prepare insert data
                    $insertData[] = [
                        'recipe_id' => $recipeId,
                        'step_number' => $stepNumber,
                        'step_text' => $step['step_text'],
                        'step_image' => $step['step_image']
                            ? $step['step_image']->store('guides-images', 'public')
                            : 'recipes-images/default/default_photo.png',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }

            // Perform batch insert
            if (!empty($insertData)) {
                GuideStep::insert($insertData);
            }

            // Perform batch update
            $this->batchUpdate($updateData);

            // delete images for deleted steps
            $deleteSteps = GuideStep::where('recipe_id', $recipeId)
                ->whereNotIn('step_number', $newStepNumbers)
                ->get();

            foreach ($deleteSteps as $deleteStep) {
                if ($deleteStep['step_image'] && $deleteStep['step_image'] !== 'recipes-images/default/default_photo.png') {
                    Storage::disk('public')->delete($deleteStep['step_image']);
                }
            }

            // Delete steps that are not in the new set
            GuideStep::where('recipe_id', $recipeId)
                ->whereNotIn('step_number', $newStepNumbers)
                ->delete();

        }else{ // save steps
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

            // insert steps
            GuideStep::insert($groupedSteps);
        }
    }

    private function batchUpdate(array $updateData): void
    {
        if (!empty($updateData)) {
            $table = (new GuideStep)->getTable();
            $casesText = [];
            $casesImage = [];
            $ids = [];
            $bindingsText = [];
            $bindingsImage = [];

            foreach ($updateData as $data) {
                $id = (int) $data['id'];
                $ids[] = $id;

                $casesText[] = "WHEN id = ? THEN ?";
                $bindingsText[] = $id;
                $bindingsText[] = $data['step_text'];

                if (!empty($data['step_image'])) {
                    $casesImage[] = "WHEN id = ? THEN ?";
                    $bindingsImage[] = $id;
                    $bindingsImage[] = $data['step_image'];
                }
            }

            $sql = "UPDATE {$table} SET step_text = CASE " . implode(" ", $casesText) . " END";

            if (!empty($casesImage)) {
                $sql .= ", step_image = CASE " . implode(" ", $casesImage) . " END";
                $bindingsText = array_merge($bindingsText, $bindingsImage);
            }

            $sql .= " WHERE id IN (" . implode(',', $ids) . ")";

            DB::update($sql, $bindingsText);
        }
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
