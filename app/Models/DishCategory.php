<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DishCategory extends Model
{
    use HasFactory;

    protected $fillable = [
      'name'
    ];

    protected function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }
}
