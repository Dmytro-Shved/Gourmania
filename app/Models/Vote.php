<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'recipe_id',
        'user_id',
        'vote'
    ];
}

