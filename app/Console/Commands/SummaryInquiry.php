<?php

namespace App\Console\Commands;
use App\Models\ChartProvince;
use App\Models\RequestArea;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SummaryInquiry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'summary:inquiry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // get date hari ini
        $created_date=Carbon::now();

        // hitung jumlah request yang dibuat hari ini
        // $count_timestamp = ChartProvince::where('created_at','=',$created_date)->count();

        // convert date hari ini ke timestamp
        $chart_inquiry = DB::table('request_areas')
        ->whereDate('created_at','=',$created_date)
        ->select(DB::raw('COUNT(created_at) AS total_date'))
        // ->groupBy('2')
        ->get();

        $new_timestamp = str_pad(strtotime($created_date),13,"0");

        // dd($chart_inquiry);
        // SELECT COUNT(*), UNIX_TIMESTAMP(SUBSTR(created_at,1,13)) FROM `request_areas` WHERE DATE(`created_at`) = DATE(NOW()) GROUP BY 2 ;
        // covert date request area to format timestamp
        // $timestamp_chart=RequestArea::all();

        foreach ($chart_inquiry as $inquiry) {
            $table_chart_inquiry=ChartProvince::create([
                'timestamp_date' => $new_timestamp,
                'request_count' => $inquiry->total_date,
            ]);

            if($table_chart_inquiry){
                Log::info("function insert successfully");
            }
        }
    }
}
