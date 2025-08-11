<?php

namespace App\Models;

use App\Observers\HomepageSectionObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

#[ObservedBy(HomepageSectionObserver::class)]
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
}
