<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterestBy extends Model
{
    protected $table = "interest_bies";

    protected $fillable = [
        "user_id",
        "order_id",
    ];

    function user(){
        return $this->belongsTo('\App\User','user_id');
    }

    function order(){
        return $this->belongsTo('\App\Order','order_id')->with('user');
    }
}
