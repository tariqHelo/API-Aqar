<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'apartment_number',
        'the_number_of_bathrooms',
        'the_number_of_halls',
        'the_number_of_kitchens',
        'the_number_of_stores',
        'is_there_a_balcony',
        'is_there_a_ready_kitchen',
        'are_there_air_conditioners_installed',
        'apartment_space',
        'price',
        'property_value',
        'electricity_meter_number',
        'duration',
        'additional_details',
        'image',
    ];
}
