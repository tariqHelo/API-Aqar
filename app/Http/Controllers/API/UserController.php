<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Eaqari;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $user = User::where('phone',$request->phone)->first();
        if(!empty($user)){
            return response()->json(["error" => "phone number is registered", "status" => 500]);
        }

        if(empty($request->name)){
            response()->json(["error" => "user name is required", "status" => 500]);
        }
        if(empty($request->phone)){
            response()->json(["error" => "user phone is required", "status" => 500]);
        }
        $user = User::create($request->all());
        return response()->json(["message" => "user successfuly registered.","data" => $user , "status" => 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $user = User::where('phone',$request->phone)->first();
        if(!empty($user)){
            return response()->json(["type" => "مستخدم", "data" => $user, "status" => 200]);
        }

        $eaqari = Eaqari::where('phone',$request->phone)->first();
        if(!empty($eaqari)){
            return response()->json(["type" => "عقاري", "data" => $eaqari, "status" => 200]);
        }

        return response()->json(["message" => "رقم الهاتف غير مسجل", "status" => 404]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
