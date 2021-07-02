<?php

namespace App\Http\Controllers;

use App\Eaqari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EaqariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Eaqari::orderBy('id','desc')->get();
        return view('eaqari.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eaqari.create');
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
            if(Eaqari::where('email',$request->email)->count() > 0 )
                return redirect()->back()->withInput()->with(['error' => "الرجاء تغيير البريد الالكتروني, مستخدم بالفعل مع مستخدم أخر ."]);
            Eaqari::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('eaqari.index')->withInput()->with(['success' => "تمت الاضافة بنجاح"]);            
        }catch(\Exception $ex){
            return $ex;
            return redirect()->back()->withInput()->with(['error' => "حدثت مشكلة الرجاء المحاولة لاحقاً ."]);            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Eaqari  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Eaqari $user)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Eaqari  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Eaqari::find($id);
        return view('eaqari.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Eaqari  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        
        try{ 
            $user = Eaqari::find($request->id);

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
            
            return redirect()->route('eaqari.index')->withInput()->with(['success' => "تمت الاضافة بنجاح"]);            
        }catch(\Exception $ex){
            return redirect()->back()->withInput()->with(['error' => "حدثت مشكلة الرجاء المحاولة لاحقاً ."]);            
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Eaqari  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Eaqari::find($id);

        $user->delete();
        return redirect()->route('eaqari.index')->withInput()->with(['success' => "تمت الاضافة بنجاح"]);            
    }
}
