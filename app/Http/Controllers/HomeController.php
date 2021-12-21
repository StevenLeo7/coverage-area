<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestArea;
use Illuminate\Support\Carbon;
use App\Traits\AuditLogsTraits;
use App\Model\AuditLog;
use Browser;

class HomeController extends Controller
{
    use AuditLogsTraits;

    function index(Request $request)
    {
        $now=Carbon::now();

        // get all data and count amount data request area
        $total=RequestArea::all(); 
        $count_total = count($total);

        $jakarta=RequestArea::where('prov.provinces_name', '=', 'DKI Jakarta')
        ->leftJoin('provinces as prov','request_areas.provinsi','=','prov.id')
        ->get();
        $count_jakarta=count($jakarta);

        $outside_jakarta=RequestArea::where('prov.provinces_name', '!=', 'DKI Jakarta')
        ->leftJoin('provinces as prov','request_areas.provinsi','=','prov.id')
        ->get();
        $count_outside_jakarta=count($outside_jakarta);

        //Audit Log
        $username= auth()->user()->email; 
        $ipAddress=$_SERVER['REMOTE_ADDR'];
        $location='0';
        $access_from=Browser::browserName();
        $activity='View Home';

        //dd($location);
        $this->AuditLogs($username,$ipAddress,$location,$access_from,$activity);

        return view('home',compact('count_total','count_jakarta','count_outside_jakarta'));
    }
}
