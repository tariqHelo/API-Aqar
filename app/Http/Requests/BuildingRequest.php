<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuildingRequest extends FormRequest
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
        return [
            'name'        =>'required',
            'lag'         =>'required',
            'lat'         =>'required',
            'aqar_type'   =>'required',
            'elevator'    =>'required',
            'elevator_count'=>'required',
            'campany'      =>'required',
            'campany_phone'=>'required',
            'worker'       =>'required',
            'phone'        =>'required',
            'floor_id'     =>'required',
        ];
    }
}
