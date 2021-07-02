<?php

namespace App\Http\Controllers\API;

use App\Order;
use App\InterestBy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->user_id){
            $data = Order::where("user_id",$request->user_id)->get();
        }else{
            $data = Order::all();
        }

        return response()->json(["message" => "get user orders .","data" => $data , "status" => 200]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function interest(Request $request)
    {
        $data = InterestBy::create([
            "user_id" => $request->user_id,
            "order_id" => $request->order_id,
        ]);

        return response()->json(["message" => "تم الاضافة لطلبات المهتم بها", "data" => $data, ], 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_interest_order(Request $request)
    {
        $data = InterestBy::where([
            "user_id" => $request->user_id,
        ])->with("order")->get();

        return response()->json(["data" => $data, ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::create([
            "user_id" => $request->user_id,
            "apply_as" => $request->apply_as,
            "order_type" => $request->order_type,
            "eqaar_type" => $request->eqaar_type,
            "description" => $request->description,
            "address" => $request->address,
            "lat" => $request->lat,
            "lng" => $request->lng,
            "price" => $request->price,
            "space" => $request->space,
            "need_ivestment" => $request->need_ivestment,
            "sms" => $request->over_recive_on['sms'] ? 1 : 0,
            "whatsapp" => $request->over_recive_on['whatsapp'] ? 1 : 0,
            "call" => $request->over_recive_on['call'] ? 1 : 0,
            "committed" => $request->committed
        ]);

        return response()->json(["message" => "order successfuly created.","data" => $order , "status" => 200]);

    }

    /**
     * Return the near by order from user location
     *
     * @param  \Illuminate\Http\Request [ lat , lng ] as the current user location
     * @return \Illuminate\Http\Response as near by order max length 10 kilometter
     */
    public function get_near_order(Request $request)
    {
        // the distance between user location and near order .
        $near_orders_id = [];
        foreach(Order::all() as $order){
            if($this->distance($request->lat,$request->lng,$order->lat,$order->lng,'k') < 50){
                array_push($near_orders_id,$order->id);
            }
        }

        return response()->json(Order::whereIn('id',$near_orders_id)->with("user")->get(), 200);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
