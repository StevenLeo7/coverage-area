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

class RequestAllAreaExport implements FromCollection, WithHeadings /*from collection ambil dari query*/
{
 
    function __construct($provinces) {
        $this->provinces = $provinces;
    }

    public function collection()
    {
        // kalo null datenya maka download semua
        if($this->provinces=='all'){
            $query=DB::table('request_areas')
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
            // dd($query,'kalo null datenya maka download semua');
        }
        else{ // in case kalo mau nampilin semua data tapi provinsi tertentu dengan input date kosong
            $query=DB::table('request_areas')
            ->where('provinsi',$this->provinces)
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
        // dd($query,'provinsi tertentu but date null');
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
