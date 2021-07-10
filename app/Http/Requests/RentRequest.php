<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RentRequest extends FormRequest
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
              'name'=> 'required',
              'phone'=> 'required',
              'id_number'=> 'required',
              'date_contract'=> 'required',
             'email'=> 'required',
              'type_rent'=> 'required',
              'value_rent'=> 'required',
        ];
    }
}
