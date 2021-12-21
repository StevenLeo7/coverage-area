<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villages extends Model
{
    use HasFactory;
    protected $table = "villages";
    protected $fillable=[
        'id',
        'districts_id',
        'villages_name',
    ];
}
