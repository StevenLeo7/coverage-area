<style>
    #btnUploadExcel {
        background-color: #151A48;
        color: white;
        font-weight: 600;
        border: 2px solid white;
    }
    #btnUploadExcel:hover {
        background-color: white;
        color: #151A48;
        font-weight: 700;
        border: 2px solid #151A48;
        outline: none;
    }
    #btnUploadExcel:focus:hover {
        background-color: white;
        color: #151A48;
        font-weight: 700;
        border: 2px solid #151A48;
        outline: none;
    }
    .modal-header {
        border-bottom:1px solid #eee;
        background-color: #151A48;
        color: white;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        margin-left: -1px;
        margin-top: -5px;
        width: auto;
    }
    .modal-footer > button {
        background-color: #151A48;
        color: white;
        font-weight: 600;
        border: 2px solid white;
    }
    .modal-footer > button:hover {
        background-color: white;
        color: #151A48;
        font-weight: 600;
        border: 2px solid #151A48;
    }
</style>


<?php $__env->startSection('content'); ?>
<div class="main-grid">
    <div class="agile-grids">
        <div class="buttons-heading">
            
            <h2>Add Coverage Area By Excel</h2>
        </div>
        
        <div class="bs-component mb20" align="center">
            <button type="button" class="btn btn-primary" id="btnUploadExcel" data-toggle="modal" data-target="#myModalExcel">
                <i class="fa fa-upload" aria-hidden="true"></i> Upload Excel
            </button>
        </div> 

        <div></div>

        <div class="modal fade" id="myModalExcel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><b>Import to Excel</b>
                        <button type="button" class="close" data-dismiss="modal" id="closeModalImport" aria-label="Close" style=" margin-top : 1px;">
                            <span aria-hidden="true" style="color:white"><i class="fa fa-times"></i></span>
                        </button>
                    </h4>
                </div>
                <form action="<?php echo e(url('/import_coverage/insert')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-body">
                            <span style="color: red">* file must : xlsx</span>
                            <div class="form-group">
                                <input type="file" name="doc1" id="doc1" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-file-text"></i> Import</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var table = $('#request_area').DataTable( {
            // order dipakai untuk mengurutkan data table
            "order": [],
            responsive: true,
        } );

       

    } );
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nap_coverage_area\resources\views/coverage_internal/import_coverage.blade.php ENDPATH**/ ?>