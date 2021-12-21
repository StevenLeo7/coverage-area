<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;
    protected $fillable =[
        'username',
        'ip_address',
        'location',
        'access_from',
        'activity'
    ];

}
