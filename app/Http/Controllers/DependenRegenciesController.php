<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Regencies;
use App\Models\Districts;

class DependenRegenciesController extends Controller
{
    public function findDistricts($regencies_id){

        $query=DB::table("districts")
        ->where("districts.regencies_id","=",$regencies_id)
        ->select('*','districts.id as id_districts','regen.id as id_regencies')
        ->leftJoin('regencies as regen','regen.id','=','districts.regencies_id')
        ->orderBy('districts_name','asc')
        ->get();
       
        return json_encode($query);
    }
}
