<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $guarded = ['img'];
    protected $table = "foods";

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
