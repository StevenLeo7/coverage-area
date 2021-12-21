<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Villages;
use App\Models\Districts;

class DependenDistrictsController extends Controller
{
    public function findVillages($districts_id){

        $query=DB::table("villages")
        ->where("villages.districts_id","=",$districts_id)
        ->select('*','villages.id as id_villages','dist.id as id_districts')
        ->leftJoin('districts as dist','dist.id','=','villages.districts_id')
        ->orderBy('villages_name','asc')
        ->get();

       
        return json_encode($query);
    }
}
