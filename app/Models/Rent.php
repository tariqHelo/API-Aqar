<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $fillable = [
            'name',
            'phone',
            'id_number',
            'date_contract',
            'email',
            'type_rent',
            'value_rent',
    ];
}
