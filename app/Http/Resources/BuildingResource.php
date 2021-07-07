<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BuildingResource extends JsonResource
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
            'lag'=>$this->lag,
            'lat'=>$this->lat,
            'aqar_type'=>$this->aqar_type,
            'elevator'=>$this->elevator,
            'elevator_count'=>$this->elevator_count,
            'campany'=>$this->campany,
            'campany_phone'=>$this->campany_phone,
            'worker'=>$this->worker,
            'phone'=>$this->phone,
            'floor_id'=>$this->floor_id,
            'created_at'=>$this->created_at,
        ];
    }
}
