<?php

namespace App\Http\Controllers;

use App\Models\RequestArea;
use App\Models\Provinces;
use App\Models\Regencies;
use App\Models\District;
use App\Models\Villages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\AuditLog;
use App\Traits\AuditLogsTraits;
use Browser;

class RequestAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use AuditLogsTraits;
    public function index(Request $request)
    {
        $provinces=DB::table("provinces")
        ->select('id as id_provinces')
        ->get();
        $regencies=DB::table("regencies")
        ->select('id as id_regencies')
        ->get();
        $districts=DB::table("districts")
        ->select('id as id_districts')
        ->get();
        $villages=DB::table("villages")
        ->select('id as id_villages')
        ->get();
        

        $request_areas = DB::table('request_areas')
        // ->select('*','request_areas.id as id_request_areas')
        ->select('request_areas.full_name',
        'request_areas.email',
        'request_areas.phone_number',
        'prov.provinces_name as provinsi',
        'reg.regencies_name as kota',
        'dis.districts_name as kecamatan',
        'vill.villages_name as kelurahan',
        'request_areas.street_name',
        'request_areas.postal_code',
        'request_areas.remarks',
        'request_areas.created_at as request_create',
        'request_areas.id as id_request_areas'
        )
        ->leftJoin('provinces as prov','request_areas.provinsi','=','prov.id')
        ->leftJoin('regencies as reg','request_areas.kota','=','reg.id')
        ->leftJoin('districts as dis','request_areas.kecamatan','=','dis.id')
        ->leftJoin('villages as vill','request_areas.kelurahan','=','vill.id')
        ->orderBy('request_areas.created_at','desc')
        ->orderBy('request_areas.id','desc')
        ->get();

        //Audit Log
        $username= auth()->user()->email; 
        $ipAddress=$_SERVER['REMOTE_ADDR'];
        $location='0';
        $access_from=Browser::browserName();
        $activity='View Request Area Tracking';

        $this->AuditLogs($username,$ipAddress,$location,$access_from,$activity);
        
        $dropdowns['prov']=DB::table('provinces')
        ->orderBy('provinces_name','asc')
        ->get();

        $dropdowns['reg']=DB::table('regencies')
        ->orderBy('regencies_name','asc')
        ->get();

        $dropdowns['dis']=DB::table('districts')
        ->orderBy('districts_name','asc')
        ->get();

        $dropdowns['vill']=DB::table('villages')
        ->orderBy('villages_name','asc')
        ->get();

        $request->validate([
            'filter_email' => 'nullable',
            'filter_phone_number' => 'nullable',
            'provinces' => 'nullable',
            'regencies' => 'nullable',
            'districts' => 'nullable',
            'villages' => 'nullable',
            // 'filter_postal_code' => 'nullable',
            'filter_date_start' => 'nullable|date',
            'filter_date_finish' => 'nullable|date|after_or_equal:filter_date_start',
        ]);

        // dd($request);

        $request_areas = DB::table('request_areas')
        // ->select('*','request_areas.id as id_request_areas')
        ->select('request_areas.full_name',
        'request_areas.email',
        'request_areas.phone_number',
        'prov.provinces_name as provinsi',
        'reg.regencies_name as kota',
        'dis.districts_name as kecamatan',
        'vill.villages_name as kelurahan',
        'request_areas.street_name',
        'request_areas.postal_code',
        'request_areas.remarks',
        'request_areas.created_at as request_create',
        'request_areas.id as id_request_areas'
        )
        ->leftJoin('provinces as prov','request_areas.provinsi','=','prov.id')
        ->leftJoin('regencies as reg','request_areas.kota','=','reg.id')
        ->leftJoin('districts as dis','request_areas.kecamatan','=','dis.id')
        ->leftJoin('villages as vill','request_areas.kelurahan','=','vill.id')
        ->orderBy('request_areas.created_at','desc');

        if($request->filter_email){
            $request_areas=$request_areas->where('request_areas.email','like', '%'.$request->filter_email.'%');
        }
        if($request->filter_phone_number != NULL){
            $request_areas=$request_areas->where('phone_number','like', '%'.$request->filter_phone_number.'%');
        }
        if($request->provinces != NULL){
            $request_areas=$request_areas->where('provinsi','=',$request->provinces);
        }
        if($request->regencies != NULL){
            $request_areas=$request_areas->where('kota','=',$request->regencies);
        }
        if($request->districts != NULL){
            $request_areas=$request_areas->where('kecamatan','=',$request->districts);
        }
        if($request->villages != NULL){
            $request_areas=$request_areas->where('kelurahan','=',$request->villages);
        }
        // if($request->filter_postal_code != NULL){
        //     $request_areas=$request_areas->where('postal_code','like', '%'.$request->filter_postal_code.'%');
        // }
        if($request->filter_date_start != NULL && $request->filter_date_finish !=NULL){
            $request_areas=$request_areas->whereBetween(DB::raw("(STR_TO_DATE(request_areas.created_at,'%Y-%m-%d'))"), [$request->filter_date_start, $request->filter_date_finish]);
        }
        if($request->filter_date_start != NULL && $request->filter_date_finish ==NULL){
            $request->filter_date_finish = Carbon::now();
            $request_areas=$request_areas->whereBetween(DB::raw("(STR_TO_DATE(request_areas.created_at,'%Y-%m-%d'))"), [$request->filter_date_start, $request->filter_date_finish]);
        }
        if($request->filter_date_start == NULL && $request->filter_date_finish !=NULL){
            $request->filter_date_start = Carbon::now()->subDays(30);
            $request_areas=$request_areas->whereBetween(DB::raw("(STR_TO_DATE(request_areas.created_at,'%Y-%m-%d'))"), [$request->filter_date_start, $request->filter_date_finish]);
        }

        $request_areas = $request_areas->paginate(10000);
        $request_areas = $request_areas->appends($request->all());

        if($request->filter_email !=NULL || $request->filter_phone_number != NULL || $request->provinces != NULL || $request->filter_date_start != NULL || $request->filter_date_finish !=NULL)
        {
            //Audit Log
            $username= auth()->user()->email; 
            $ipAddress=$_SERVER['REMOTE_ADDR'];
            $location='0';
            $access_from=Browser::browserName();
            $activity='Search Request Area Tracking';

            $this->AuditLogs($username,$ipAddress,$location,$access_from,$activity);
        }

        // dd($request_areas);
        return view('coverage_internal.dashboard_request',compact('request_areas','dropdowns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dropdowns = array();

        $dropdowns['prov']=DB::table('provinces')
        ->orderBy('provinces_name','asc')
        ->get();

        $dropdowns['request']=DB::table('regencies')
        ->orderBy('regencies_name','asc')
        ->get();

        return view('request_area',compact('dropdowns'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'email'  => 'required:rfc,dns',
            'nomor_telepon' => 'required',
            'provinsi' => 'required|string|min:2',
            'kota' => 'required|string|min:2',
            'kecamatan' => 'required|min:2',
            'kelurahan' => 'required|min:2',
            'nama_jalan' => 'required|min:2',
            'kode_pos' => 'required|min:2',
            'catatan' => 'nullable',
        ]);

        // dd($request->catatan);
        $created_date=Carbon::now();

        $request_areas_create=RequestArea::create([
            'full_name' => $request->nama_lengkap,
            'email' => $request->email,
            'phone_number' => $request->nomor_telepon,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'street_name' => $request->nama_jalan,
            'postal_code' => $request->kode_pos,
            'remarks' => $request->catatan,
            // 'remarks' => $request->catatan,
            'created_date' => $created_date,
        ]);

        // dd($request_areas_create);

        if($request_areas_create) {
            return redirect('/request_area/create')->with('status','Thank you for submit, we will contact you as soon as possible when your area already covered !');
        }
        else {
            return redirect('/request_area/create')->with('status','Please fill all the coloumn !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestArea  $requestArea
     * @return \Illuminate\Http\Response
     */
    public function show(RequestArea $requestArea)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestArea  $requestArea
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestArea $requestArea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestArea  $requestArea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestArea $requestArea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestArea  $requestArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestArea $requestArea)
    {
        //
    }
}
