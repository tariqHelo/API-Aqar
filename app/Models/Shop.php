<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
            'shop_number',
            'shop_space',
            'is_there_any_water',
            'is_there_electricity',
            'is_there_a_bathroom',
            'duration',
            'additional_details',
    ];
}
