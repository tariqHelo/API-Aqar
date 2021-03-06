<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Building;
use App\Http\Resources\BuildingResource;

use App\Http\Requests\BuildingRequest;
use Validator;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings=Building::get();
        return BuildingResource::collection($buildings);
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
        ]); 

        if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
        }

        $buildings=Building::create($request->all());
        return new BuildingResource($buildings);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Building $id)
    {  //dd(22);
      return new BuildingResource($id);

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
    public function destroy(Building $id)
    {
         $id->delete();
         return response()->noContent();
    }
}
