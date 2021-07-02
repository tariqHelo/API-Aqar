<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eaqari extends Model
{
    protected $fillable = [
        "name",
        "facility_name",
        "adjective",
        "email",
        "phone",
    ];
    
}
