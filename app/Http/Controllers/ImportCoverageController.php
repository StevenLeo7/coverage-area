<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\CoverageAreaImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\AuditLogsExport;
use App\Traits\AuditLogsTraits;
use Browser;
class ImportCoverageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use AuditLogsTraits;
    public function index(Request $request)
    {
        //Audit Log
        $username= auth()->user()->email; 
        $ipAddress=$_SERVER['REMOTE_ADDR'];
        $location='0';
        $access_from=Browser::browserName();
        $activity='View Import Coverage';

        $this->AuditLogs($username,$ipAddress,$location,$access_from,$activity);

        return view('coverage_internal.import_coverage');
    }

    public function import() 
    {
        
        Excel::import(new CoverageAreaImport,request()->file('doc1'));

         //Audit Log
         $username= auth()->user()->email; 
         $ipAddress=$_SERVER['REMOTE_ADDR'];
         $location='0';
         $access_from=Browser::browserName();
         $activity='Import Data Coverage';
 
         $this->AuditLogs($username,$ipAddress,$location,$access_from,$activity);
             
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
