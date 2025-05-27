<?php

namespace App;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

trait HasSortingAndPagination
{
    // Default sorting parameter
    public string $sort = 'popularity';

    // Sorting logic
    public function applySorting(Builder $query): Builder
    {
       return match ($this->sort){
           'popularity' => $query
               ->orderByDesc('savedCount')
               ->orderByDesc('likesCount')
               ->orderBy('dislikesCount')
               ->orderByDesc('created_at'),
           'newest' => $query->orderByDesc('created_at'),
           'oldest' => $query->orderBy('created_at'),
           default => $query, // user types ?sort=foobar => error
       };
    }

    // Pagination logic
    public function paginateQuery(Builder $query, $perPage = 10): LengthAwarePaginator
    {
        return $query->paginate($perPage);
    }
}
