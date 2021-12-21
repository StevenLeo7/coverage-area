<?php

namespace App\Exports;
use App\Models\RequestArea;
use App\Models\Provinces;
use App\Models\Regencies;
use App\Models\Districts;
use App\Models\Villages;
use App\Models\Homepass;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class RequestAreaExport implements FromCollection, WithHeadings /*from collection ambil dari query*/
{
    protected $date_start;
    protected $date_finish;
    function __construct($date_start,$date_finish,$provinces) {
        $this->date_start = $date_start;
        $this->date_finish = $date_finish;
        $this->provinces = $provinces;
    }

    public function collection()
    {
        // kalo input all tapi date nya diset sama user
        if($this->provinces=='all'){
            $query=DB::table('request_areas')
            ->whereBetween(DB::raw("(STR_TO_DATE(request_areas.created_at,'%Y-%m-%d'))"), [$this->date_start, $this->date_finish])
            ->select('full_name',
            'email',
            'phone_number',
            'prov.provinces_name as provinsi',
            'reg.regencies_name as kota',
            'dis.districts_name as kecamatan',
            'vill.villages_name as kelurahan',
            'request_areas.street_name',
            'request_areas.postal_code',
            'request_areas.remarks',
            'request_areas.created_at',
            )
            ->leftJoin('provinces as prov','request_areas.provinsi','=','prov.id')
            ->leftJoin('regencies as reg','request_areas.kota','=','reg.id')
            ->leftJoin('districts as dis','request_areas.kecamatan','=','dis.id')
            ->leftJoin('villages as vill','request_areas.kelurahan','=','vill.id')
            ->orderBy('request_areas.created_at','desc')
            ->orderBy('request_areas.id','desc')
            ->get();
            // dd($query,'kalo input all tapi date nya diset sama user');
        }
        else{ // input provinsi tertentu dengan date tertentu
            $query=DB::table('request_areas')
            ->where('provinsi',$this->provinces)
            ->whereBetween(DB::raw("(STR_TO_DATE(request_areas.created_at,'%Y-%m-%d'))"), [$this->date_start, $this->date_finish])
            ->select('full_name',
            'email',
            'phone_number',
            'prov.provinces_name as provinsi',
            'reg.regencies_name as kota',
            'dis.districts_name as kecamatan',
            'vill.villages_name as kelurahan',
            'request_areas.street_name',
            'request_areas.postal_code',
            'request_areas.remarks',
            'request_areas.created_at',
            )
            ->leftJoin('provinces as prov','request_areas.provinsi','=','prov.id')
            ->leftJoin('regencies as reg','request_areas.kota','=','reg.id')
            ->leftJoin('districts as dis','request_areas.kecamatan','=','dis.id')
            ->leftJoin('villages as vill','request_areas.kelurahan','=','vill.id')
            ->orderBy('request_areas.created_at','desc')
            ->orderBy('request_areas.id','desc')
            ->get();
        }
        // dd($query,'input provinsi tertentu dengan date tertentu');
        return $query;
    }

    public function headings(): array
    {
        return [
            'full_name', 
            'email',  
            'phone_number', 
            'provinsi',  
            'kota', 
            'kecamatan', 
            'kelurahan', 
            'street name', 
            'postal code',
            'remarks',
            'request date',  
        ];
    }
}
