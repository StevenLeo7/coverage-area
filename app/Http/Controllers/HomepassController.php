<?php

namespace App\Http\Controllers;

use App\Models\Homepass;
use App\Models\HomepassSearchLog;
use Illuminate\Http\Request;

class HomepassController extends Controller
{
    public function viewSearch()
    {
    	return view('search_coverage');
    }

    public function getAddress(Request $req)
    {
    	$address = [];

        if($req->has('q')){
            $search = $req->q;
            $address = Homepass::select('id', 'street_name','number','residence_name','unit','district','postal_code','city')
                    ->where('street_name', 'LIKE', '%' . $search . '%')
                    ->orwhere('number', 'LIKE', '%' . $search . '%')
                    ->orwhere('residence_name', 'LIKE', '%' . $search . '%')
                    ->orwhere('unit', 'LIKE', '%' . $search . '%')
                    ->orwhere('district', 'LIKE', '%' . $search . '%')
                    ->orwhere('postal_code', 'LIKE', '%' . $search . '%')
                    ->orwhere('city', 'LIKE', '%' . $search . '%')
                    ->get();
        }
        return response()->json($address);
    }

}
