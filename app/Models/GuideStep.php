<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuideStep extends Model
{
    protected $fillable = [
        'recipe_id',
        'step_number',
        'step_text',
        'step_image',
        'created_at',
        'updated_at'
    ];
}
