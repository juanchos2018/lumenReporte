<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departament;
use App\Models\Province;
use App\Models\District;

use App\Models\User;
use App\Models\Incidence;

class DepartamentController extends Controller
{
    
    public function getdepartament()
    {       
        $departament = Departament::get();
        $array=array();
        if($departament != null){
            return response()->json(['status' => 200,'result' => $departament]);
        }else{
            return response()->json(['status' => 404,'result' => $array]);
        }
    }

    public function provinces($department_id)
    {       
        $departament = Province::where('department_id',$department_id)->get();
        $array=array();
        if($departament != null){
            return response()->json(['status' => 200,'result' => $departament]);
        }else{
            return response()->json(['status' => 404,'result' => $array]);
        }
    }
    public function distrites($province_id)
    {       
        $departament = District::where('province_id',$province_id)->get();
        $array=array();
        if($departament != null){
            return response()->json(['status' => 200,'result' => $departament]);
        }else{
            return response()->json(['status' => 404,'result' => $array]);
        }
    }

}
