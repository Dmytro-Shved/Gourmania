<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GuideStep extends Model
{
    /** @use HasFactory<\Database\Factories\GuideStepFactory> */
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'step_text',
        'image'
    ];

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
}
