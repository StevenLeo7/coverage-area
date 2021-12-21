<?php

namespace App\Http\Controllers;

use App\Models\ChartProvince;
use Illuminate\Support\Collection;
use App\Models\Provinces;
use App\Models\Regencies;
use App\Models\RequestArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\AuditLog;
use App\Traits\AuditLogsTraits;
use Browser;
class ChartProvinceController extends Controller
{
    use AuditLogsTraits;
    public function index(Request $request)
    {
        $dropdowns['prov']=DB::table('provinces')
        ->orderBy('provinces_name','asc')
        ->get();

        $drp_placeholder = $this->drpPlaceholder($request);

        // get current month
        $created_date=Carbon::now();

        $get_month = Carbon::now()->month;
        
        //get current year
        $current_year = Carbon::now()->year;
        // cuman isi provinsi doang yang diisi maka dia hanya menampilkan data dari bulan dan tahun berjalan
        if($request->provinsi != NULL && $request->drp_start == NULL && $request->drp_end == NULL)
        {
            $pie_charts_1 = RequestArea::select('provinces.provinces_name',DB::raw('COUNT(*) as total'))
            ->where('provinces.id','=',$request->provinsi)
            ->whereYear('request_areas.created_at','=',$created_date)
            ->whereMonth('request_areas.created_at','=',$created_date)
            ->leftJoin('provinces','request_areas.provinsi','=','provinces.id')
            ->groupBy('provinces.provinces_name')
            ->orderBy('provinces.provinces_name','asc')
            ->get();

            $pie_charts_2 = RequestArea::where('provinces.id','=',$request->provinsi)
            ->whereYear('request_areas.created_at','=',$created_date)
            ->whereMonth('request_areas.created_at','=',$created_date)
            ->select('regencies.regencies_name',DB::raw('COUNT(*) as total_city'))
            ->leftJoin('provinces','request_areas.provinsi','=','provinces.id')
            ->leftJoin('regencies','request_areas.kota','=','regencies.id')
            ->groupBy('regencies.regencies_name')
            ->orderBy('regencies.regencies_name','asc')
            ->get();

            $check_count_pie_1 = count($pie_charts_1);
            $check_count_pie_2 = count($pie_charts_2);

            if($check_count_pie_1 < 1 )
            {
                $showChart_1 = 0;
            }
            else {
                $showChart_1 = 1;
            }

            if($check_count_pie_2 < 1 )
            {
                $showChart = 0;
            }
            else {
                $showChart = 1;
            }

            //Audit Log
            $username= auth()->user()->email; 
            $ipAddress=$_SERVER['REMOTE_ADDR'];
            $location='0';
            $access_from=Browser::browserName();
            $activity='Search Chart';

            $this->AuditLogs($username,$ipAddress,$location,$access_from,$activity);

            return view('coverage_internal.chart_request', compact('pie_charts_1','pie_charts_2','showChart','showChart_1','dropdowns','drp_placeholder'));

        }
        // ALL INPUT DIISI
        else if($request->provinsi != NULL && $request->drp_start != NULL && $request->drp_end != NULL)
        {
            $pie_charts_1 = RequestArea::select('provinces.provinces_name',DB::raw('COUNT(*) as total'))
            ->where('provinces.id','=',$request->provinsi)
            ->whereBetween(DB::raw("(STR_TO_DATE(request_areas.created_at,'%Y-%m-%d'))"), [$request->drp_start, $request->drp_end])
            ->leftJoin('provinces','request_areas.provinsi','=','provinces.id')
            ->groupBy('provinces.provinces_name')
            ->orderBy('provinces.provinces_name','asc')
            ->get();

            $pie_charts_2 = RequestArea::where('provinces.id','=',$request->provinsi)
            ->whereBetween(DB::raw("(STR_TO_DATE(request_areas.created_at,'%Y-%m-%d'))"), [$request->drp_start, $request->drp_end])
            ->select('regencies.regencies_name',DB::raw('COUNT(*) as total_city'))
            ->leftJoin('provinces','request_areas.provinsi','=','provinces.id')
            ->leftJoin('regencies','request_areas.kota','=','regencies.id')
            ->groupBy('regencies.regencies_name')
            ->orderBy('regencies.regencies_name','asc')
            ->get();

            $check_count_pie_1 = count($pie_charts_1);
            $check_count_pie_2 = count($pie_charts_2);

            if($check_count_pie_1 < 1 )
            {
                $showChart_1 = 0;
            }
            else {
                $showChart_1 = 1;
            }

            if($check_count_pie_2 < 1 )
            {
                $showChart = 0;
            }
            else {
                $showChart = 1;
            }

            //Audit Log
            $username= auth()->user()->email; 
            $ipAddress=$_SERVER['REMOTE_ADDR'];
            $location='0';
            $access_from=Browser::browserName();
            $activity='Search Chart';

            $this->AuditLogs($username,$ipAddress,$location,$access_from,$activity);

            return view('coverage_internal.chart_request', compact('pie_charts_1','pie_charts_2','showChart','showChart_1','dropdowns','drp_placeholder'));
        }
        // jika hanya provinsi dan date start yang diisi 
        else if($request->provinsi != NULL && $request->drp_start != NULL && $request->drp_end == NULL)
        {
            //Audit Log
            $username= auth()->user()->email; 
            $ipAddress=$_SERVER['REMOTE_ADDR'];
            $location='0';
            $access_from=Browser::browserName();
            $activity='Search Chart';

            $this->AuditLogs($username,$ipAddress,$location,$access_from,$activity);
            return redirect('/chart_request')->with([
                'status'=>'Please fill both coloum input date',
            ]);
        }
        // apabila hanya date start yang diisi 
        else if($request->provinsi == NULL && $request->drp_start != NULL && $request->drp_end == NULL)
        {
            //Audit Log
            $username= auth()->user()->email; 
            $ipAddress=$_SERVER['REMOTE_ADDR'];
            $location='0';
            $access_from=Browser::browserName();
            $activity='Search Chart';

            $this->AuditLogs($username,$ipAddress,$location,$access_from,$activity);

            return redirect('/chart_request')->with([
                'status'=>'Please fill both coloum input provinces and date',
            ]);

        }
        else if($request->provinsi == NULL && $request->drp_start != NULL && $request->drp_end != NULL)
        {
            //Audit Log
            $username= auth()->user()->email; 
            $ipAddress=$_SERVER['REMOTE_ADDR'];
            $location='0';
            $access_from=Browser::browserName();
            $activity='Search Chart';

            $this->AuditLogs($username,$ipAddress,$location,$access_from,$activity);

            return redirect('/chart_request')->with([
                'status'=>'Please fill coloum input provinces',
            ]);

        }
        else 
        {
            $pie_charts_1 = RequestArea::select('provinces.provinces_name',DB::raw('COUNT(*) as total'))
            ->where('provinces.id','=','31')
            ->whereYear('request_areas.created_at','=',$created_date)
            ->whereMonth('request_areas.created_at','=',$created_date)
            ->leftJoin('provinces','request_areas.provinsi','=','provinces.id')
            ->groupBy('provinces.provinces_name')
            ->orderBy('provinces.provinces_name','asc')
            ->get();
            
            $pie_charts_2 = RequestArea::where('provinces.id','=','31')
            ->whereYear('request_areas.created_at','=',$created_date)
            ->whereMonth('request_areas.created_at','=',$created_date)
            ->select('regencies.regencies_name',DB::raw('COUNT(*) as total_city'))
            ->leftJoin('provinces','request_areas.provinsi','=','provinces.id')
            ->leftJoin('regencies','request_areas.kota','=','regencies.id')
            ->groupBy('regencies.regencies_name')
            ->orderBy('regencies.regencies_name','asc')
            ->get();

            
            $check_count_pie_1 = count($pie_charts_1);
            $check_count_pie_2 = count($pie_charts_2);

            if($check_count_pie_1 < 1 )
            {
                $showChart_1 = 0;
            }
            else {
                $showChart_1 = 1;
            }

            if($check_count_pie_2 < 1 )
            {
                $showChart = 0;
            }
            else {
                $showChart = 1;
            }

            //Audit Log
            $username= auth()->user()->email; 
            $ipAddress=$_SERVER['REMOTE_ADDR'];
            $location='0';
            $access_from=Browser::browserName();
            $activity='View Chart';

            $this->AuditLogs($username,$ipAddress,$location,$access_from,$activity);
            
            return view('coverage_internal.chart_request', compact('pie_charts_1','pie_charts_2','showChart','showChart_1','dropdowns','drp_placeholder'));
        }

    }

    private function drpPlaceholder(Request $request)
    {
        if ($request->has('drp_start') and $request->has('drp_end')) {
            return $request->drp_start.' - '.$request->drp_end;
        }

        return 'Select daterange filter';
    }
}
