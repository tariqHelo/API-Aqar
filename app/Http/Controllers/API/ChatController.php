<?php

namespace App\Http\Controllers\API;

use App\Chat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function coversisions(Request $request)
    {
        $data = Chat::where('sender_id',$request->user_id)
                ->orWhere('receiver_id',$request->user_id)
                ->groupBy('receiver_id')
                ->with('sender','receiver')->get();
        return response()->json(["coversisions" => $data , "status" => 200]);
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

            $chat = Chat::create([
                'sender_id' => $request->sender_id,
                'receiver_id' => $request->receiver_id,
                'message' => $request->message,
            ]);

            // upload image if it provied .
            if($request->hasFile('uploaded_file')){
                $file = $request->file('uploaded_file');
                $file->store('chat');
                $chat->update([
                    "attach" => 'storage/app/chat/'.$file->hashName(),
                ]);

                // $file = $request->file('uploaded_file');

                // $f_name = $file->getClientOriginalName();
                // $file_size = $file->getSize();
                // $file_extension = $file->getClientOriginalExtension();

                // $max_id = Chat::max('id');
                // $tst_id = str_pad($max_id+ 1, 8, '0', STR_PAD_LEFT);

                // $transaction_id = 'M-'.$tst_id;
                // $new_file_name = $transaction_id.".".$file_extension;

                // $destination_path = public_path('/images/chat');
                // //chmod($destination_path,0777);
                // $file = $file->move($destination_path,$new_file_name);

                // $chat->attach = $file;
                // $chat->save();
            }

            return response()->json(["message" => $chat , "status" => 200]);

        }catch(\Execption $ex){
            return $ex;
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
    public function destroy(Chat $chat)
    {
        //
    }
}