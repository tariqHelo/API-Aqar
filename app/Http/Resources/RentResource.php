<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RentResource extends JsonResource
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
            'name'=>$this->name,
            'id_number'=>$this->id_number,
            'date_contract'=>$this->date_contract,
            'email'=>$this->email,
            'type_rent'=>$this->type_rent,
            'type_rent'=>$this->type_rent,
            'created_at'=>$this->created_at,
         
        ]; 
     
    }
}
