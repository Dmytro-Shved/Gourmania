<?php

namespace App;

trait HasSorting
{
    // Default sorting parameter
    public string $sort = 'popularity';

    // Sorting logic
    public function applySorting($query)
    {
       return match ($this->sort){
           'popularity' => $query
               ->orderByDesc('savedCount')
               ->orderByDesc('likesCount')
               ->orderBy('dislikesCount')
               ->orderByDesc('created_at'),
           'newest' => $query->orderByDesc('created_at'),
           'oldest' => $query->orderBy('created_at'),
       };
    }
}
