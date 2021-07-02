<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id','desc')->get();
        return view('orders.index',compact('orders'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function commited()
    {
        $orders = Order::where('committed',1)->orderBy('id','desc')->get();
        
        return view('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        try{
            // check if the email is used with another user
            if(Order::where('email',$request->email)->count() > 0 )
                return redirect()->back()->withInput()->with(['error' => "الرجاء تغيير البريد الالكتروني, مستخدم بالفعل مع مستخدم أخر ."]);
            Order::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('orders.index')->withInput()->with(['success' => "تمت الاضافة بنجاح"]);            
        }catch(\Exception $ex){
            return $ex;
            return redirect()->back()->withInput()->with(['error' => "حدثت مشكلة الرجاء المحاولة لاحقاً ."]);            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Order $user)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Order::find($id);
        return view('orders.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        
        try{ 
            $user = Order::find($request->id);

            if($request->password){
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
            }else{
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
            }
            
            return redirect()->route('orders.index')->withInput()->with(['success' => "تمت الاضافة بنجاح"]);            
        }catch(\Exception $ex){
            return redirect()->back()->withInput()->with(['error' => "حدثت مشكلة الرجاء المحاولة لاحقاً ."]);            
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Order::find($id);

        $user->delete();
        return redirect()->route('orders.index')->withInput()->with(['success' => "تمت الاضافة بنجاح"]);            
    }
}
