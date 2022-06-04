<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;




class UserController extends Controller
{
    //


    public function store(Request $request)
    {   
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);    
        try
        {  
            $obj = new User();

            $obj->number_document =$request->number_document;
            $obj->name =$request->name;
            $obj->last_name =$request->last_name;
            $obj->user=$request->user;
            $obj->email =$request->email;
            $obj->password =Hash::make($request->password);
            $obj->phone =$request->phone;
            $obj->location =$request->location;
            $obj->lat =$request->lat;
            $obj->lon =$request->lon;
            $obj->photo =$request->photo;   
            $obj->api_token =Str::random(60);
            $obj->state =1;
            $obj->save();
            return response()->json(['status' => 200, 'result' => ['user' => $obj]]);
           // return response()->json(['status' => 200, 'result' => ['user' => $obj]]);
           // return response()->json(['status' => 200,'result' => $obj,'message' => "Registrado"]);                      
          
        } catch (\Exception $e){   
           // return response()->json(['status' => 404,'message'=>$e->getMessage()]);
            return response()->json(['status' => 404, 'result' => 'error'.$e]);
        } 
    }
    public function View($usuario_id)
    {
        try
        { 
            $obj = User::find($usuario_id);
            if($obj){
            // return response()->json(['status' => 200,'result' => $obj]);
                return response()->json(['status' => 200, 'result' => ['user' => $obj]]);
            }else{
            //  return response()->json(['status' => 404]);
                return response()->json(['status' => 404,'result'=>null]);
            }
        } catch (\Exception $e){   
            return response()->json(['status' => 404,'result'=>$e->getMessage()]);
            // return response()->json(['status' => 404, 'result' => 'error'.$e]);
        } 
    }
}
