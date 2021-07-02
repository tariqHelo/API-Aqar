<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "user_id",
        "apply_as",
        "order_type",
        "eqaar_type",
        "description",
        "address",
        "lat",
        "lng",
        "price",
        "space",
        "need_ivestment",
        "call",
        "sms",
        "whatsapp",
        "committed"
    ];

    function user(){
        return $this->belongsTo('\App\User','user_id');
    }
}
