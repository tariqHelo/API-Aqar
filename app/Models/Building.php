<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = [
        'name',
        'lag',
        'lat',
        'aqar_type',
        'elevator',
        'elevator_count',
        'campany',
        'campany_phone',
        'worker',
        'phone',
        'floor_id',
    ];
}
