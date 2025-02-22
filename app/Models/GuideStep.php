<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GuideStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'step_number',
        'step_text',
        'step_image'
    ];
}
