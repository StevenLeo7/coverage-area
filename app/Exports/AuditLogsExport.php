<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\AuditLog;
use Illuminate\Support\Facades\DB;

class AuditLogsExport implements FromCollection, WithHeadings
{
    protected $date_start;
    protected $date_finish;
    function __construct($date_start,$date_finish) {
        $this->date_start = $date_start;
        $this->date_finish = $date_finish;
    }

    public function collection()
    {
        $query=auditLog::whereBetween(DB::raw("(STR_TO_DATE(created_at,'%Y-%m-%d'))"), [$this->date_start, $this->date_finish])
        ->select('id','username','ip_address','access_from','activity',DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d %H:%i:%s")'))
        ->orderBy('id','asc')
        ->get();

        return $query;
    }

    public function headings(): array
    {
        return [
            'ID Log', 
            'Username',
            'IP Address',
            'Access From',
            'Activity',
            'Created At'
        ];
    }
}
