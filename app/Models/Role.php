<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public const IS_USER = 1;
    public const IS_ADMIN = 2;

    protected $fillable = ['name'];
}
