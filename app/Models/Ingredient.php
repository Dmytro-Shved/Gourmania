<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;

class Ingredient extends Model
{
    use EagerLoadPivotTrait;

    protected $fillable = ['name'];

    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class);
    }
}
