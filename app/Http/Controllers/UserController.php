<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Department;
use App\Models\Employee;
use App\Traits\AuditLogsTraits;
use Browser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // ini extends trait pake use sedangkan kalo extends controller dia extends Controller
    use AuditLogsTraits;
    public function index()
    {
        $users=User::select('users.id','employee.int_emp_pref_name','department.department_name','email','status_active','login_counter','last_login')
        ->leftjoin('department','users.id_department','=','department.department_id')
        ->leftjoin('employee','users.email','=','employee.int_emp_email')
        ->orderBy('users.created_at','desc')
        ->get();

        $dropdowns['departments']=DB::table('department')
        ->orderBy('department_name','asc')
        ->get();

        //Audit Log
        $username= auth()->user()->email; 
        $ipAddress=$_SERVER['REMOTE_ADDR'];
        $location='0';
        $access_from=Browser::browserName();
        $activity='View User';

        $this->AuditLogs($username,$ipAddress,$location,$access_from,$activity);


        return view('configuration.user',compact('users','dropdowns'));
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
        $request->validate([
            'email' => 'required',
            'status' => 'required'
        ]);

        // Email yang didaftarkan ada di table employee
        $employee=Employee::where('int_emp_email_nap',$request->email)
        ->first();

        $users=User::create([
            'id_employee' => $employee->int_emp_id,
            'id_department' => $employee->int_emp_department,
            'name' => $employee->int_emp_name,
            'prefix_name' => $employee->int_emp_pref_name,
            'email' => $request->email,
            'password' => Hash::make('-'),
            'status_active' => $request->status,
            'login_counter' => '0'
        ]);

        // jika user ada atau berhasil dibuat maka redirect ke page /user dan menampilkan status success add user
        if($users)
        {
            //Audit Log
            $username= auth()->user()->email; 
            $ipAddress=$_SERVER['REMOTE_ADDR'];
            $location='0';
            $access_from=Browser::browserName();
            $activity='Add User';

            $this->AuditLogs($username,$ipAddress,$location,$access_from,$activity);

            return redirect('/user')->with('status','Success Add User');
        }
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
    public function edit(User $user)
    {
        // oper data dari coloumn terus tarik ke halaman baru
        $users=DB::table('users')
        ->where('users.id','=',$user->id)
        ->get();

        $dropdowns['departments']=DB::table('department')
        ->orderBy('department_name','asc')
        ->get();

        return view('configuration.edit',compact('users','dropdowns'));
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
        $request->validate([
            'status' => 'required'
        ]);

        // data yang di update sesuai id user nya
        $update_status=User::where('users.id','=',$id)
        ->update([
            'status_active' => $request->status
        ]);

        if($update_status)
        {
              //Audit Log
            $username= auth()->user()->email; 
            $ipAddress=$_SERVER['REMOTE_ADDR'];
            $location='0';
            $access_from=Browser::browserName();
            $activity='Edit User';

            $this->AuditLogs($username,$ipAddress,$location,$access_from,$activity);
            
            return redirect('/user')->with('status','User Status Updated');
        }
        else 
        {
            return redirect('/user/'.$id.'/edit')->with('status','User Status Fail Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        //Audit Log
        $username= auth()->user()->email; 
        $ipAddress=$_SERVER['REMOTE_ADDR'];
        $location='0';
        $access_from=Browser::browserName();
        $activity='Delete User';

        $this->AuditLogs($username,$ipAddress,$location,$access_from,$activity);
        
        return redirect('/user')->with('status','Access Removed !');
    }
}
