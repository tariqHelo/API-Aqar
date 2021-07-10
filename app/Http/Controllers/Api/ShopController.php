<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Http\Resources\ShopResource;
use App\Http\Requests\ShopRequest;
use Validator;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $shops=Shop::get();
         return ShopResource::collection($shops);
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
             'shop_number'=> 'required',
             'shop_space'=> 'required',
             'is_there_any_water'=> 'required',
             'is_there_electricity'=> 'required',
             'is_there_a_bathroom'=> 'required',
             'duration'=> 'required',
             'additional_details'=> 'required',
        ]); 

        if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
        }
        $shops=Shop::create($request->all());
        return new ShopResource($shops);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $id)
    {
         return new ShopResource($id);
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
        
        $validator = Validator::make($request->all(),[
             'shop_number'=> 'required',
             'shop_space'=> 'required',
             'is_there_any_water'=> 'required',
             'is_there_electricity'=> 'required',
             'is_there_a_bathroom'=> 'required',
             'duration'=> 'required',
             'additional_details'=> 'required',
        ]); 

        if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
        }
        $shops=Shop::update($request->all());
        return new ShopResource($shops);
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
