<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Provinces;
use App\Models\Regencies;

class DependenProvincesController extends Controller
{
    public function findCity($provinces_id){

        $query=DB::table("regencies")
        ->where("regencies.provinces_id","=",$provinces_id)
        ->select('*','regencies.id as id_regencies','prov.id as id_provinces')
        ->leftJoin('provinces as prov','prov.id','=','regencies.provinces_id')
        ->orderBy('regencies_name','asc')
        ->get();
       
        return json_encode($query);

        // dd($query);
    }
}
