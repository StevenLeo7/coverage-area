<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Browser;
use App\Traits\AuditLogsTraits;
use App\Models\Rule;

class AuthController extends Controller
{
    use AuditLogsTraits;
    public function login()
    {
        return redirect('http://localhost:8000/'); //-> kalau pakai SSO
        // return view('auth.login');
    }

    public function postlogin($q)//->kalau pakai SSO
    // public function postlogin(Request $request)
    {
        //kalau pakai SSO
        $email =base64_decode($q);
        $password='-';
        // $email=$request->email;
        // $password=$request->password;
        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        $cekuser_status=User::where('email',$email)->first();

        $dologin=Auth::attempt($credentials);
        if($dologin){
            // kalo emailnya match dengan yang diinput dan 
            // dd(($cekuser_status->status_active == 'Admin' || $cekuser_status->status_active == 'Guest'));
            // if($cekuser_status->email == $request->email && $cekuser_status->id_department != NULL ){
            if($cekuser_status->email == $email && $cekuser_status->id_department != NULL ){
                
                $update_lastlogin=User:: where('email',$email)
                ->update([
                    // kalo ga pake cekuser_status dia ga tau bagian mana yang harus di +1 
                    // ga mungkin $login_encounter + 1 karena dia bingung user mana yang perlu di update
                    'login_counter' => $cekuser_status->login_counter+1,
                    'last_login' => now(),
                ]);

                if($update_lastlogin){
                    
                    //Audit Log
                    $username= auth()->user()->email; 
                    $ipAddress=$_SERVER['REMOTE_ADDR'];
                    $location='0';
                    $access_from=Browser::browserName();
                    $activity='Login';

                    $this->auditLogs($username,$ipAddress,$location,$access_from,$activity);

                    return redirect('/home');
                }

                return redirect('/home');
            }
            else{
                // return redirect('/')->with('statusLogin','Give Access First to User');
                return redirect('http://localhost:8000/signout'); //kalau pakai sso
            }
        }
        else{
            // return redirect('/')->with('statusLogin','Wrong Email or Password');
            return redirect('http://localhost:8000/signout'); //kalau pakai sso
        }

    }

    public function logout(Request $request)
    {
        //   Audit Log
        $username= auth()->user()->email; 
        $ipAddress=$_SERVER['REMOTE_ADDR'];
        $location='0';
        $access_from=Browser::browserName();
        $activity='Logout';

        $this->AuditLogs($username,$ipAddress,$location,$access_from,$activity);

        // Auth::logout();

        $user_email=Auth::user()->email;
        return redirect('http://localhost:8000/portal/'.$user_email);

        // return redirect('/')->with('statusLogout','Success Logout');

    }
}
