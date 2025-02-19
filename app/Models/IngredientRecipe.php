<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class IngredientRecipe extends Pivot
{
    use HasFactory;

    protected $table = 'ingredient_recipe';

    protected $fillable = [
        'recipe_id',
        'ingredient_id',
        'quantity',
        'unit'
    ];
}
