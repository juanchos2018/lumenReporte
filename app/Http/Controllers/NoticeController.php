<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Notices;

class NoticeController extends Controller
{    

    public function store(Request $request)
    {
        $name_file = "uploads/default.png";   
        $name="notica";
        if ($request->hasFile('photo')){
            $name_file = $this->Upload($request->file('photo'),$name."-".time(),'uploads/');
        }
        $obj = new Notices();
        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->location = $request->location;
        $obj->date = $request->date;
        $obj->photo = $name_file;
        $obj->department_id = $request->department_id;
        $obj->province_id = $request->province_id;
        $obj->district_id = $request->district_id;
     
        $obj->save();             

        return response()->json(['status' => 200,'result' => $obj]);
    }

    public function get()
    {       
        $obj = Notices::get();
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
