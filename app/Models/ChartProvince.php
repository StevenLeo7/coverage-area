<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartProvince extends Model
{
    use HasFactory;
    protected $fillable=[
        'timestamp_date',
        'request_count',
        'provinces_name',
    ];
}
