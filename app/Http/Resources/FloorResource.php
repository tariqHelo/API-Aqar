<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FloorResource extends JsonResource
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
            'floor_id'=>new FloorResource($this->brand),
            'created_at'=>$this->created_at,
        ];
    }
}
