<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\DB;

class Incidence extends Model
{    

    public static function getMyIncidences($usuario_id){       
       
        return DB::table('incidences')
        ->join('type_incidences', 'type_incidences.id', '=', 'incidences.type_incidence_id')
        ->select('type_incidences.descrition as type_incidence','incidences.id','incidences.description','incidences.location','incidences.lat','incidences.lon','incidences.photo','incidences.date','incidences.hour')     
        ->where('incidences.user_id', $usuario_id)     
        ->get();        
    }
    public static function getAllIncidences(){       
       
        return DB::table('incidences')
        ->join('type_incidences', 'type_incidences.id', '=', 'incidences.type_incidence_id')
        ->select('type_incidences.descrition as type_incidence','incidences.id','incidences.description','incidences.location','incidences.lat','incidences.lon','incidences.photo','incidences.date','incidences.hour','incidences.user_id','incidences.photo')           
        ->get();        
    }
    public static function getAllIncidencesthow(){       
       
        return DB::table('incidences')
        ->join('type_incidences', 'type_incidences.id', '=', 'incidences.type_incidence_id')
        ->join('users', 'users.id', '=', 'incidences.user_id')
        ->select('incidences.id','users.name','incidences.description','incidences.location','incidences.lat','incidences.lon','incidences.photo','incidences.date','incidences.hour','incidences.user_id','incidences.photo','type_incidences.descrition as type_incidence',)           
        ->get();        
    }

}
