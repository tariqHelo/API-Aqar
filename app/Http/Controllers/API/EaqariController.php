<?php

namespace App\Http\Controllers\API;

use App\Eaqari;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EaqariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $eaqari = Eaqari::where('phone',$request->phone)->first();
        if(!empty($eaqari)){
            return response()->json(["error" => "phone number is registered", "status" => 500]);
        }

        if(empty($request->name)){
            response()->json(["error" => "name is required","status" => 500]);
        }
        if(empty($request->phone)){
            response()->json(["error" => "phone is required", "status" => 500]);
        }

        $eaqari = Eaqari::create($request->all());
        return response()->json(["message" => "تم التسجيل بيانات العقاري","data" => $eaqari, "status" => 200 ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Eaqari  $eaqari
     * @return \Illuminate\Http\Response
     */
    public function show(Eaqari $eaqari)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Eaqari  $eaqari
     * @return \Illuminate\Http\Response
     */
    public function edit(Eaqari $eaqari)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Eaqari  $eaqari
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eaqari $eaqari)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Eaqari  $eaqari
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eaqari $eaqari)
    {
        //
    }
}
