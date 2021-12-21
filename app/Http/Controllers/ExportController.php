<?php

namespace App\Http\Controllers;

use App\Models\Provinces;
use App\Models\Regencies;
use App\Models\Districts;
use App\Models\Villages;
use App\Models\Homepass;
use App\Models\RequestArea;
use App\Models\AuditLog;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RequestAreaExport;
use App\Exports\RequestAllAreaExport;
use App\Exports\AuditLogsExport;
use App\Traits\AuditLogsTraits;
use Browser;


class ExportController extends Controller
{  
    use AuditLogsTraits;

    public function exportAuditLog(Request $request)
    {
        $request->validate([
            'date_start' => 'required|date',
            'date_finish' => 'required|date|after_or_equal:date_start'
        ]);

        //Audit Log
        $username= auth()->user()->email; 
        $ipAddress=$_SERVER['REMOTE_ADDR'];
        $location='0';
        $access_from=Browser::browserName();
        $activity='Export Audit Log';

        $this->AuditLogs($username,$ipAddress,$location,$access_from,$activity);

        return Excel::download(new AuditLogsExport($request->date_start,$request->date_finish),'Audit Logs.xlsx');
    }

    public function export(Request $request){

        $request->validate([
            'date_start' => 'nullable|date',
            'date_finish' => 'nullable|date|after_or_equal:date_start',
        ]);

        // kalo date from and to diinput
        if($request->date_start != NULL && $request->date_finish != NULL) 
        {
            return Excel::download(new RequestAreaExport($request->date_start,$request->date_finish,$request->provinces),'Request Area Report.xlsx');
        }
        // kalo date from and to tidak diinput
        else if($request->date_start == NULL && $request->date_finish == NULL && $request->provinces !=NULL) 
        {
            
            return Excel::download(new RequestAllAreaExport($request->provinces),'Request All Area Report.xlsx');
        }
        // kalo date hanya diinput hanya 1
        else 
        {
            return redirect('/request_area')->with('error','Please fill both date or let date empty !');
        }    
    }


}
