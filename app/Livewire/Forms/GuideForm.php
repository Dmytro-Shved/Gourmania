<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class GuideForm extends Form
{
    public $steps = [
        ['image' => null, 'text' => null],
    ];

    public $step = ['image' => null, 'text' => null];

    public function resetStepImage($index): void
    {
        $this->steps[$index]['image'] = null;
    }

    public function addStep()
    {
        $this->steps[] = $this->step;
    }

    public function removeStep($index)
    {
        unset($this->steps[$index]);

        // reshuffle indexes after deleting
        $this->steps = array_values($this->steps);

        if (empty($this->steps)){
            $this->steps[] = $this->step;
        }
    }

    public function rules()
    {
        return [
            'steps.*.image' => ['nullable', 'mimes:jpeg,png,webp'],
            'steps.*.text' => ['required','string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'steps.*.image.mimes' => 'The image must be a file of type: jpeg, png, webp',

            'steps.*.text.required' => 'Required',
            'steps.*.text.string' => 'Invalid type',
            'steps.*.text.max' => 'Text is too long',
        ];
    }
}
