<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Incidence;
class IncidenceController extends Controller
{
    //

    public function store(Request $request)
    {   
        $this->validate($request, [
            'user_id' => 'required',
        ]);    
        try
        {  
            $obj = new Incidence();
            $obj->description=$request->description;   
            $obj->location=$request->location; 
            $obj->lat=$request->lat; 
            $obj->lon=$request->lon; 
            $obj->photo=$request->photo; 
            $obj->date=$request->date; 
            $obj->hour=$request->hour; 
            $obj->state=0; 
            $obj->type_incidence_id=$request->type_incidence_id; 
            $obj->organization_id=$request->organization_id; 
            $obj->user_id=$request->user_id;           
            $obj->save();

         //   return response()->json(['status' => 200,'result' => $obj,'message' => "Registrado"]);    
            return response()->json(['status' => 200, 'result' => ['obj' => $obj]]);                  
          
        } catch (\Exception $e){   
        // return response()->json(['status' => 404,'message'=>$e->getMessage()]);
         return response()->json(['status' => 404, 'result' => $e->getMessage()]);
        } 
    }


    public function get($usuario_id)
    {       
        $obj = Incidence::getMyIncidences($usuario_id);
        $array=array();
        if($obj != null){
            return response()->json(['status' => 200,'result' => $obj]);
        }else{
            return response()->json(['status' => 404,'result' => $array]);
        }
    }

    public function getAll()
    {       
        $obj = Incidence::getAllIncidences();
        $array=array();
        if($obj != null){
            return response()->json(['status' => 200,'result' => $obj]);
        }else{
            return response()->json(['status' => 404,'result' => $array]);
        }
    }

    public function getAllThow()
    {       
        $obj = Incidence::getAllIncidencesthow();
        $array=array();
        if($obj != null){
            return response()->json(['status' => 200,'result' => $obj]);
        }else{
            return response()->json(['status' => 404,'result' => $array]);
        }
    }


}
