<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'shop_number'=> 'required',
            'shop_space'=> 'required',
            'is_there_any_water'=> 'required',
            'is_there_electricity'=> 'required',
            'is_there_a_bathroom'=> 'required',
            'duration'=> 'required',
            'additional_details'=> 'required',
        ];
    }
}
