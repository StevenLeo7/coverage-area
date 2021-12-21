<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RequestArea extends Model
{
    use HasFactory;
    protected $fillable=[
        'full_name',
        'email',
        'phone_number',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'street_name',
        'postal_code',
        'remarks',
    ];

}
