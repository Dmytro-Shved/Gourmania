<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\Pivot;

class IngredientRecipe extends Pivot
{
    use HasFactory;

    protected $table = 'ingredient_recipe';

    protected $fillable = [
        'recipe_id',
        'ingredient_id',
        'quantity',
        'unit_id',
        'created_at',
        'updated_at',
    ];

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}
