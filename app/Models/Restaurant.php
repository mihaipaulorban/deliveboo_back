<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function foodTypes()
    {
        return $this->belongsToMany(FoodType::class, 'restaurant_food_types');
    }

    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
