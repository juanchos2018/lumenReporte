<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HelpNumber;

class HelpNumberController extends Controller
{
    //


    public function store(Request $request)
    {
        $name_file = "uploads/default.png";   
        $name="number";
        if ($request->hasFile('photo')){
            $name_file = $this->Upload($request->file('photo'),$name."-".time(),'uploads/');
        }
        $obj = new HelpNumber();
        $obj->grupo = $request->grupo;
        $obj->unid = $request->unid;
        $obj->phone = $request->phone;
        $obj->photo = $name_file;     
        $obj->save();             

        return response()->json(['status' => 200,'result' => $obj]);
    }

    public function get()
    {       
        $obj = HelpNumber::get();
        $array=array();
        if($obj != null){
            return response()->json(['status' => 200,'result' => $obj]);
        }else{
            return response()->json(['status' => 404,'result' => $array]);
        }
    }

    public function Upload($file,$name,$path)
    {
        $extension = $file->getClientOriginalExtension();
        $filenamestore = $name."-".time().".".$extension;
        $file->move($path, $filenamestore);
        return $path.$filenamestore;
    }
}
