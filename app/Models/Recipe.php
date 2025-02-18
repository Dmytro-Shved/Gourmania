<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Recipe extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'user_id',
        'cuisine_id',
        'menu_id'
    ];

    public function menu(): HasOne
    {
        return $this->hasOne(Menu::class);
    }

    public function cuisine(): HasOne
    {
        return $this->hasOne(Cuisine::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class)
            ->withPivot(['quantity', 'unit']);
    }
}

