<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Api\BaseController as BaseController;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UserReqisterRequest;
use Validator;

class UserController extends Controller
{
  public function login(Request $request)
    {
        $user= User::where('email', $request->email)->first();
        // print_r($data);
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
      // return $this->sendResponse($response ,'User login successfully' );

    }

    public function register(Request $request){
         $validator = Validator::make($request->all(),[
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed',
        ]); 

        if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
        }
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        $token=$user->createToken('my-app-token')->plainTextToken;
        $respons=[
            'user'=>$user,
            'token'=>$token
        ];
      // return $this->sendResponse($respons ,'User registered successfully' );
        return $respons;

    }

  public function logout(Request $request){
    auth()->user()->tokens()->delete();
  }
}
