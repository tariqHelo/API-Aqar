<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
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
            'shop_number'=>$this->shop_number,
            'shop_space'=>$this->shop_space,
            'is_there_any_water'=>$this->is_there_any_water,
            'is_there_any_water'=>$this->is_there_any_water,
            'is_there_electricity'=>$this->is_there_electricity,
            'is_there_a_bathroom'=>$this->is_there_a_bathroom,
            'duration'=>$this->duration,
            'additional_details'=>$this->additional_details,
            'created_at'=>$this->created_at,
         
        ];
    }
}
