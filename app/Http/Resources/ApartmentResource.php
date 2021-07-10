<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         return [
            'id'=>$this->id,
            'apartment_number'=>$this->apartment_number,
            'apartment_space'=>$this->apartment_space,
            'the_number_of_rooms'=>$this->the_number_of_rooms,
            'the_number_of_bathrooms'=>$this->the_number_of_bathrooms,
            'the_number_of_halls'=>$this->the_number_of_halls,
            'the_number_of_kitchens'=>$this->the_number_of_kitchens,
            'the_number_of_stores'=>$this->the_number_of_stores,
            'is_there_a_balcony'=>$this->is_there_a_balcony,
            'is_there_a_ready_kitchen'=>$this->is_there_a_ready_kitchen,
            'are_there_air_conditioners_installed'=>$this->are_there_air_conditioners_installed,
            'price'=>$this->price,
            'duration'=>$this->duration,
            'image'=>$this->image,
            'additional_details'=>$this->additional_details,
            'electricity_meter_number'=>$this->electricity_meter_number,
            'created_at'=>$this->created_at,
              // $table->integer('property_value');
              // $table->integer('electricity_meter_number');
         
        ];
    }
}
