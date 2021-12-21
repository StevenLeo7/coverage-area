<style>
    #category {
        border: 4px solid gray; 
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    table > tbody > tr:hover > td {
        background-color: lightblue;
        color: black;
    }

    table > thead > tr > th {
        background-color:#151A48; 
        color:white;
    }
    #btnExportExcel {
        background-color: #151A48;
        color: white;
        font-weight: 600;
        border: 2px solid white;
    }
    #btnExportExcel:hover {
        background-color: white;
        color: #151A48;
        font-weight: 700;
        border: 2px solid #151A48;
        outline: none;
    }
    #btnExportExcel:focus:hover {
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
    .form-group > .form-control:focus {
        border: 2px solid #151A48;
    }
    .modal-footer > button {
        background-color: #151A48;
        color: white;
        font-weight: 600;
        border: 2px solid white;
        outline: none;
    }
    .modal-footer > button:hover {
        background-color: white;
        color: #151A48;
        font-weight: 600;
        border: 2px solid #151A48;
        outline: none;
    }
    .modal-footer > button:focus {
        background-color: #151A48;
        color: white;
        font-weight: 600;
        border: 2px solid white;
        outline: none;
    }
    .modal-footer > button:focus:hover {
        background-color: white;
        color: #151A48;
        font-weight: 700;
        border: 2px solid #151A48;
        outline: none;
    }
</style>



<?php $__env->startSection('content'); ?>
<div class="main-grid">
    <div class="agile-grids">
        <div class="buttons-heading">
            <h2>Audit Log</h2>
        </div>
        
        <!--validasi form-->
        <?php if(count($errors)>0): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <ul>
                <li><strong>Export Data Failed !</strong></li>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><strong><?php echo e($error); ?></strong></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>   
        <?php endif; ?>
        <!--end validasi form-->
        
        <!-- Button trigger modal-->
        <div class="bs-component mb20">
            <button type="button" class="btn btn-primary" id="btnExportExcel" data-toggle="modal" data-target="#myModalExport" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-table" aria-hidden="true"></i>
                <span class="nav-text">
                    Export Logs to Excel
                </span>
            </button>
        </div>
        <!-- Button trigger modal-->

        <!-- table-->
            <table id="audit_log" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>IP Address</th>
                        
                        <th>Access From</th>
                        <th>Activity</th>
                        <th>Date/Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $audit_logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($data->id); ?></td>
                            <td><?php echo e($data->username); ?></td>
                            <td><?php echo e($data->ip_address); ?></td>
                            
                            <td><?php echo e($data->access_from); ?></td>
                            <td><?php echo e($data->activity); ?></td>
                            <td><?php echo e($data->created_at); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <!-- table-->
    </div>
</div>

<!-- Modal Export-->
<div class="modal fade" id="myModalExport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel"><b>Export to Excel</b>
                <button type="button" class="close" data-dismiss="modal" onclick="resetExport()" aria-label="Close" style=" margin-top : 1px;">
                    <span aria-hidden="true" style="color:white"><i class="fa fa-times"></i></span>
                </button>
            </h4>
        </div>
        <div class="modal-body">
            
            <form action="<?php echo e(url('/Log/audit-log/export')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-body">
                    <div class="form-group">
                        <label>From</label>
                        <input type="date" id="date_start" name="date_start" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Until</label>
                        <input type="date" id="date_finish" name="date_finish" class="form-control">
                    </div>
                </div>
        </div>
            <div class="modal-footer">
                <button type="button" id="btnResetModalExport" class="btn btn-primary"><i class="fa fa-refresh"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-file-text"></i> Export Now</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- Modal Export-->

<script>
    $(document).ready(function() {
        var table = $('#audit_log').DataTable( {
            
            buttons: [
                'excel'
            ],
            "order": [],
            responsive: true
        } );
    } );

    $('#btnResetModalExport').off('click').on('click',resetExport);

    function resetExport() 
    {
        $('#type').val('all');
        $('#date_start').val('');
        $('#date_finish').val('');
        $('#report_type').val('');
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nap_coverage_area\resources\views/log/index.blade.php ENDPATH**/ ?>