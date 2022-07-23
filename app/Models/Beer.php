<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    protected $guarded = [];

    protected $casts = [
        'ingredients' => 'array',
        'food_pairing' => 'array',
    ];
}
