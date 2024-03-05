<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function restaurants()
    {
        return $this->belongsToMany(Food::class, 'restaurant_food_types');
    }
}
