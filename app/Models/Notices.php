<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class Notices extends Model
{
    
    public static function getAllyano(){       
       
        return DB::table('notices')
        ->join('departments', 'departments.id', '=', 'notices.department_id')
        ->join('provinces', 'provinces.id', '=', 'notices.province_id')
        ->join('districts', 'districts.id', '=', 'notices.district_id')
        ->select('notices.id','notices.title','notices.description','notices.photo','departments.description as departament','provinces.description as province','districts.description as distric','notices.location')           
        ->get();        
    }   
    public static function getAll(){       
       
        return DB::table('notices')      
        ->select('notices.id','notices.title','notices.description','notices.photo','departments.description as departament','provinces.description as province','districts.description as distric','notices.location')           
        ->get();        
    } 
}
