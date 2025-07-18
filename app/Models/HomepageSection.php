<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class HomepageSection extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'type',
        'category_slug',
        'order',
        'visible',
        'limit',
    ];

    protected $casts = [
        'visible' => 'boolean',
        'order' => 'integer',
        'limit' => 'integer',
    ];

    public function scopeVisible(Builder $query): Builder
    {
        return $query->where('visible', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('order');
    }

    public function getRecipes(): Collection
    {
        $query = Recipe::with('dishCategory');

        return match($this->type) {
            'popular' => $query->popular()->limit($this->limit)->get(),
            'latest' => $query->latest()->limit($this->limit)->get(),
            'category' => $query->byCategory($this->category_slug)->limit($this->limit)->get(),
            default => collect(),
        };
    }
}
