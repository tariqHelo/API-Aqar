<?php

namespace App\Http\Controllers\API;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Coversision;
use App\Models\Store;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ChatFamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function coversisions(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                "family_id" => 'required',
            ],[
                'family_id.required' => 'الرجاء إرسال رقم الاسرة   family_id',
            ]);
            
            if( $validator->fails()){
                foreach($validator->errors()->toArray() as $k => $v){
                    $errors[$k] = $v[0];
                }
                $data['errors'] = $errors;
                return response()->json($data, 200);
            }else{
                $id = Store::find($request->family_id)->user->id ?? 0;
                $coversisions = Chat::where('sender_id',$id)
                ->orWhere('receiver_id',$id)
                ->where('type',1)
                ->groupBy('receiver_id')
                ->with('sender','receiver')->get();
                $data['status'] = 1;
                $data['coversisions'] = $coversisions;
                return response()->json($data, 200);
            }

        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json($e->getMessage(),500);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function coversisions_user(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                "user_id" => 'required',
            ],[
                'user_id.required' => 'الرجاء إرسال رقم المستخدم   user_id',
            ]);
            
            if( $validator->fails()){
                foreach($validator->errors()->toArray() as $k => $v){
                    $errors[$k] = $v[0];
                }
                $data['errors'] = $errors;
                return response()->json($data, 200);
            }else{

                $coversisions = Coversision::where('sender_id',$request->user_id)
                ->orWhere('receiver_id',$request->user_id)
                ->where('type',1)
                // ->groupBy('receiver_id','sender_id')
                ->with('sender','receiver','messages')->get();
                $data['status'] = 1;
                $data['coversisions'] = $coversisions;
                return response()->json($data, 200);
            }

        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json($e->getMessage(),500);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function chat(Request $request)
    {
        $data = Chat::where([
                    'sender_id' => $request->sender_id,
                    'receiver_id' => $request->receiver_id,
                ])
                ->orWhere([
                    'sender_id' => $request->receiver_id,
                    'receiver_id' => $request->sender_id,
                ])
                ->with('sender','receiver')->get();
        return response()->json(["messages" => $data , "status" => 200]);
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
        try{

            $check = Coversision::where([
                'sender_id' => $request->sender_id,
                'receiver_id' => $request->receiver_id,
            ])
            ->orWhere([
                'sender_id' => $request->receiver_id,
                'receiver_id' => $request->sender_id,
            ]);
            // check if thier are old or just create new coversision
            if( $check->count() == 0){
                $coversision = Coversision::create([
                    'sender_id' => $request->sender_id,
                    'receiver_id' => $request->receiver_id,
                    'type' => 1,
                ]);
            }else{
                $coversision = $check->first();
            }

            $chat = Chat::create([
                'sender_id' => $request->sender_id,
                'receiver_id' => $request->receiver_id,
                'message' => $request->message,
                'coversision_id' => $coversision->id,
            ]);

            // upload image if it provied .
            if($request->hasFile('uploaded_file')){
                $file = $request->file('uploaded_file');
                $file->store('chat');
                $chat->update([
                    "attach" => 'storage/app/chat/'.$file->hashName(),
                ]);
            }

            return response()->json(["message" => $chat , "status" => 200]);

        }catch(\Exception $ex){
            return response()->json(['message' => 'حدثت مشكلة اثناء عملية الحفظ'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{

            $validator = Validator::make($request->all(), [
                "sender_id" => 'required',
                "receiver_id" => 'required',
            ]);
            
            if( $validator->fails()){
                foreach($validator->errors()->toArray() as $k => $v){
                    $errors[$k] = $v[0];
                }
                $data['errors'] = $errors;
                return response()->json($data, 200);
            }else{
                Chat::where([
                    'sender_id' => $request->sender_id,
                    'receiver_id' => $request->receiver_id,
                ])->delete();

                $id = Store::find($request->family_id)->user->id ?? 0;
                $coversisions = "تم حذف المحادثة";
                $data['status'] = 1;
                $data['data'] = $coversisions;
                return response()->json($data, 200);
            }

        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json($e->getMessage(),500);
        }
    }
}