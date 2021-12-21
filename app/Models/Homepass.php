<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homepass extends Model
{
    use HasFactory;
    protected $fillable=[
        'area_name',
        'type_hid',
        'homepassed_id',
        'project_id',
        'region',
        'sub_region',
        'province',
        'branch',
        'city',
        'district',
        'sub_district',
        'postal_code',
        'home_passed_coordinate',
        'residence_type',
        'residence_name',
        'street_name',
        'number',
        'unit',
        'pop_id',
        'splitter_id',
        'splitter_distribution_coordinate',
        'remark',
        'remark_2',
        'rfs_year',
        'rfs_status',
        'submission_date',
        'last_date',
        'project_name'
    ];
}
