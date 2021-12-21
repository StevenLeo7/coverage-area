<style>
    .highcharts-figure, .highcharts-data-table table {
        min-width: 320px; 
        max-width: 660px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #EBEBEB;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
        padding: 0.5em;
    }
    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
    .highcharts-credits {
        display: none;
    }

    #btnSubmitGraph {
        background-color: #151a48;
        color: white;
        font-weight: 700;
        margin-top: 23px;
        margin-left: 15px; 
        padding : 5px 15px;
        font-size: 15px;
    }
    #pie_chart {
        border: 5px solid #151a48;
        border-radius: 25px;
    }
    #pie_chart_x {
        border: 5px solid #151a48;
        border-radius: 25px;
    }
    #chartKota {
        text-align-last: center;
        border: 5px solid #151a48;
        border-radius: 25px;
    }
    #chartProvinsi {
        text-align-last: center;
        border: 5px solid #151a48;
        border-radius: 25px;
    }
    #member-daterangepicker {
        margin-top: 22px;
        border: 2px solid gainsboro;
        padding-left: 150px;
        padding-bottom: 6px;
        font-size: 15px;
    }
    .ion-calendar {
        margin-left: -140px;
        margin-right: 50px;
    }
    .ion-ios-arrow-down {
        margin-left: 50px;
    }
    .applyBtn {
        margin-top: 22px;
        margin-left: 7px;
    }
    .cancelBtn {
        margin-top: 22px;
        margin-left: 5px;
    }
    .daterangepicker_start_input{
        margin-left: 5px;
    }   

    @media (max-width: 765px) {
        .hidden-xs {
            display: block !important;
        }
        #provinsi {
           width: 80%;
        }

        #member-daterangepicker {
            margin-top: 22px;
            border: 2px solid gainsboro;
            padding-left: 70px;
            padding-bottom: 6px;
            font-size: 15px;
        }

        .ion-calendar {
            margin-left: -60px;
            margin-right: 5px;
        }
        .ion-ios-arrow-down {
            margin-left: 15px;
        }

       

    }

</style>


<?php $__env->startSection('content'); ?>
<div class="main-grid">
    <div class="agile-grids">	
        <div class="buttons-heading">
            <h2>Analytic Dashboard</h2>
        </div>

        <div class="col-lg-12">
            
            <?php if(session('status')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><?php echo e(session('status')); ?></strong>
            </div>
            <?php elseif($showChart == '0'): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Provinsi ini tidak memiliki inquiry</strong>
            </div>
            <?php endif; ?>
            
        </div>
        
        <form action="<?php echo e(url('/chart_request')); ?>" method="post" id="myform" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>   
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <div class="form-group"> 
                            <label>Provinsi</label> 
                            <select name="provinsi" id="provinsi" class="form-control">
                                <option value="">- Pilih Provinsi -</option>
                                <?php $__currentLoopData = $dropdowns['prov']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provinces): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($provinces->id); ?>"><?php echo e($provinces->provinces_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div id="member-daterangepicker" class="gymie-daterangepicker btn bg-grey-50 daterange-padding no-border color-grey-600 no-shadow">
                            <i class="ion-calendar margin-right-10"></i>
                                <span><?php echo e($drp_placeholder); ?></span>
                            <i class="ion-ios-arrow-down margin-left-5"></i>
                        </div>
                        <input type="hidden" class="form-control" id="drp_start" name="drp_start">
                        <input type="hidden" class="form-control" id="drp_end" name="drp_end">
                    </div>
                </div>
            </div>
            <div class="footer-button">
                <button type="submit" class="btn btn-primary btn-sm" id="btnSubmitGraph"><i class="fa fa-check"></i> Show</button>
            </div>
            <br>
                
            <div class="row">
                <?php if($showChart_1 == '1'): ?>
                <div class="col-lg-12">
                    <div id="testChart" class="col-lg-12" style="position: relative">
                        <div id="pie_chart"></div>
                    </div>
                    <div class="col-lg-10">
                        <hr class="barrier">
                    </div>
                </div>
                <?php else: ?>
                    <p id="chartProvinsi">No Data Found</p>
                <?php endif; ?>
            </div>
            <div class="row">
                <?php if($showChart == '1'): ?>
                    <div class="col-lg-12">
                        <div id="pie_chart_x" style="position: relative"></div>
                    </div>
                <?php else: ?>
                    <p id="chartKota">No Data Found</p>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    $(document).ready(function(){
        
        $('select[name="month"]').on('change',function(){
            $('select[name="year"]').removeAttr("disabled");
        });     
        
    });
       
    // Pie chart 1 menampilkan seluruh provinsi pada bulan berjalan 
    Highcharts.chart('pie_chart', {
        chart: {
            type: 'pie'
        },
        
        title: {
            text: 'Chart Inquiry Pronvinsi'
        },

        accessibility: {
            announceNewData: {
                enabled: true
            },
            point: {
                valueSuffix: '%'
            }
        },

        // tampilan data di samping2 pie chart
        // plotOptions: {
        //     series: {
        //         dataLabels: {
        //             enabled: true,
        //             format: '{point.name} : {point.y} inquiry'
        //         },
        //         pie: {
        //             size: 250
        //         }
        //     }
            
        // },

        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name} : {point.y}'
                }
            },
            pie: {
                size: 250
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
        },

        series: [
            {
                name: "Provinsi",
                colorByPoint: true,
                data: 
                [
                    <?php $__currentLoopData = $pie_charts_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pie_chart_1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    {
                        name: "<?php echo e($pie_chart_1->provinces_name); ?>",
                        y: <?php echo e($pie_chart_1->total); ?>,
                    },
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ]
            }
        ],

        exporting : {
            enabled : false
        }

    });// End of pie chart 1

    Highcharts.chart('pie_chart_x', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Chart Inquiry Kota'
        },

        accessibility: {
            announceNewData: {
                enabled: true
            },
            point: {
                valueSuffix: '%'
            }
        },

        // tampilan data di samping2 pie chart
        plotOptions: {
            series: {
            dataLabels: {
                enabled: true,
                format: '{point.name} : {point.y}'
            }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
        },

        series: [
            {
            name: "Kota",
            colorByPoint: true,
            data: [
                <?php $__currentLoopData = $pie_charts_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pie_chart_2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                {
                    name: "<?php echo e($pie_chart_2->regencies_name); ?>",
                    y: <?php echo e($pie_chart_2->total_city); ?>,
                },
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ]
            }
        ],

        exporting : {
            enabled : false
        }

    });// End of pie chart 1

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nap_coverage_area\resources\views/coverage_internal/chart_request.blade.php ENDPATH**/ ?>