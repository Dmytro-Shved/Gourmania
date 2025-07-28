<?php

namespace App\Models;

use App\Observers\GuideStepObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(GuideStepObserver::class)]
class GuideStep extends Model
{
    public const DEFAULT_IMAGE = 'recipes-images/default/default_photo.png';

    protected $fillable = [
        'recipe_id',
        'step_number',
        'step_text',
        'step_image',
        'created_at',
        'updated_at'
    ];
}
