<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ApartmentResource;
use App\Models\Apartment;
use App\Http\Requests\Apartment\ApartmentRequest;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $apartments=Apartment::get();
         return ApartmentResource::collection($apartments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

          $validator = Validator::make($request->all(),[
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
        ]); 

        if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
        }


        $data=$request->all();
       if ($request->hasFile('image')) {
            $file = $request->file('image'); // UplodedFile Object
            $image_path = $file->store('/', [
                'disk' => 'uploads',
            ]);
            $request->merge([
                'image_path' => $image_path,
            ]);
        }

           $apartments=Apartment::create($data);
           return new ApartmentResource($apartments);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $id)
    {
      return  new ApartmentResource($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
