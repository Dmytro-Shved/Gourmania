<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DishType extends Model
{
    /** @use HasFactory<\Database\Factories\DishTypeFactory> */
    use HasFactory;

    protected $fillable = [
      'name'
    ];

    protected function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }
}
