<style>
    .row > div > div {
        border-radius: 25px;
    }
    .row > div > div:hover {
        animation: bounce; 
        animation-duration: 1.5s; 
    }
</style>


<?php $__env->startSection('content'); ?>
    <div class="main-grid">
        <div class="agile-grids">	
            <div class="buttons-heading">
                <h2>Summary</h2>
            </div>
            
            <!-- Summary -->
            <div class="panel variations-panel">
                <div class="panel-body mtn">
                    <div class="col-adjust-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="bg-system pv20 text-white fw600 text-center">
                                    <div>
                                        <i class="fa fa-clock-o fa-2x"></i>
                                    </div>
                                    Total Request Area<h2><?php echo e($count_total); ?></h2>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="bg-primary pv20 text-white fw600 text-center">
                                    <div>
                                        <i class="fa fa-ticket fa-2x"></i>
                                    </div>
                                    Request Area Jakarta <h2><?php echo e($count_jakarta); ?></h2>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="bg-success pv20 text-white fw600 text-center">
                                    <div>
                                        <i class="fa fa-refresh fa-2x"></i>
                                    </div>
                                    Request Area Outside Jakarta <h2><?php echo e($count_outside_jakarta); ?></h2>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- End Summary -->
            
        </div>
    </div>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nap_coverage_area\resources\views/home.blade.php ENDPATH**/ ?>