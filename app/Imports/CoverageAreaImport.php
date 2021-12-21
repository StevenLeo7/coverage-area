<?php

namespace App\Imports;

use App\Models\Homepass;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class CoverageAreaImport implements ToModel, WithHeadingRow, WithValidation
{
    
    public function model(array $row)
    {
        return new Homepass([

            // 'area_name'                 => $row['Area_Name'],
            // 'type_hid'                  => $row['Type HID'], 
            // 'homepassed_id'             => $row['Homepassed ID'], 
            // 'project_id'                => $row['Project ID'], 
            // 'region'                    => $row['Region'],
            // 'sub_region'                => $row['Sub Region'], 
            // 'province'                  => $row['Province'],
            // 'branch'                    => $row['Branch'],
            // 'city'                      => $row['City'],
            // 'district'                  => $row['District'], 
            // 'sub_district'              => $row['Sub District'],
            // 'postal_code'               => $row['Postal Code'], 
            // 'home_passed_coordinate'    => $row['Home passed coordinate'],
            // 'residence_type'            => $row['Residence Type'], 
            // 'residence_name'            => $row['Residence name'], 
            // 'street_name'               => $row['Street Name'], 
            // 'number'                    => $row['Number'], 
            // 'unit'                      => $row['Unit'], 
            // 'pop_id'                    => $row['Pop ID'], 
            // 'splitter_id'               => $row['Splitter ID'], 
            // 'splitter_distribution_coordinate'=> $row['Spliter distribution coordinate'], 
            // 'remark'                    => $row['remark'], 
            // 'remark_2'                  => $row['Remark_2'], 
            // 'rfs_year'                  => $row['RFS year'], 
            // 'rfs_status'                => $row['RFS status'], 
            // 'submission_date'           => $row['Submission date'], 
            // 'last_date'                 => $row['Last Update'], 
            // 'project_name'              => $row['Project Name'], 

            'area_name'                 => $row['area_name'],
            'type_hid'                  => $row['type_hid'], 
            'homepassed_id'             => $row['homepassed_id'], 
            'project_id'                => $row['project_id'], 
            'region'                    => $row['region'],
            'sub_region'                => $row['sub_region'], 
            'province'                  => $row['province'],
            'branch'                    => $row['branch'],
            'city'                      => $row['city'],
            'district'                  => $row['district'], 
            'sub_district'              => $row['sub_district'],
            'postal_code'               => $row['postal_code'], 
            'home_passed_coordinate'    => $row['home_passed_coordinate'],
            'residence_type'            => $row['residence_type'], 
            'residence_name'            => $row['residence_name'], 
            'street_name'               => $row['street_name'], 
            'number'                    => $row['number'], 
            'unit'                      => $row['unit'], 
            'pop_id'                    => $row['pop_id'], 
            'splitter_id'               => $row['splitter_id'], 
            'splitter_distribution_coordinate' => $row['splitter_distribution_coordinate'], 
            'remark'                    => $row['remark'], 
            'remark_2'                  => $row['remark_2'], 
            'rfs_year'                  => $row['rfs_year'], 
            'rfs_status'                => $row['rfs_status'], 
            'submission_date'           => $row['submission_date'], 
            'last_date'                 => $row['last_date'], 
            'project_name'              => $row['project_name'], 
        ]);
    }

    public function rules(): array
    {
        return [
            'area_name' => 'required|string',
            // 'type_hid' => 'required|string',
            // 'homepassed_id' => 'required|string',
            // 'project_id' => 'required|string',
            // 'region' => 'required|string',
            // 'sub_region' => 'required|string',
            // 'province' => 'required|string',
            // 'branch' => 'required|string',
            // 'city' => 'required|string',
            // 'district' => 'required|string',
            // 'sub_district' => 'required|string',
            // '11' => 'required|string',
            // '12' => 'required|string',
            // '13' => 'required|string',
            // '14' => 'required|string',
            // '15' => 'required|string',
            // '16' => 'required|string',
            // '17' => 'required|string',
            // '18' => 'required|string',
            // '19' => 'required|string',
            // '20' => 'required|string',
            // '21' => 'required|string',
            // '22' => 'required|string',
            // '23' => 'required|string',
            // '24' => 'required|string',
            // '25' => 'required|date_format:YYYY-MM-DD',
            // '26' => 'required|date_format:YYYY-MM-DD HH:MM:SS',
            // '27' => 'required|string',
        ];
    }
}
