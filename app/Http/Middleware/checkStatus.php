<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkStatus
{
    
    public function handle(Request $request, Closure $next)
    {
        //jika akun yang login sesuai dengan role 
        //maka silahkan akses
        //jika tidak sesuai akan diarahkan ke home
        // Fungsi array_slice(func_get_args(), 2) buat receive multiple parameter
        $status_actives = array_slice(func_get_args(), 2);
        foreach ($status_actives as $status_active) {
            // get user department 
            $user_status = Auth::user()->status_active;
            
            // kalo user status yang diinput == status yang dikasih di web.php cekStatus : Admin,Guest maka masuk
            if( $user_status == $status_active){
                return $next($request);
            }
        }
        
        return redirect('/')->with('statusLogin','You Not Have Permission, Please Login First');
    }
}
