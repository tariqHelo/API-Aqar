<?php

namespace App\Http\Requests\Apartment;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //dd(20);
        return [
         'apartment_number' =>'required|int',
         'apartment_space' =>'required',
         'the_number_of_rooms' =>'required',
         'the_number_of_halls' =>'required',
         'the_number_of_kitchens' =>'required',
         'the_number_of_bathrooms' =>'required',
         'the_number_of_stores' =>'required',
         'electricity_service' =>'required',
         'is_there_a_balcony' =>'required',
         'is_there_a_ready_kitchen' =>'required',
         'are_there_air_conditioners_installed' =>'required',
         'price' =>'required',
         'property_value' =>'required',
         'electricity_meter_number' =>'required',
         'duration' =>'required',
         'additional_details' =>'required',
         'icon' =>'required',
         'image' =>'required',

        ];
    }
}
