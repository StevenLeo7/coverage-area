<style>
    /* make words split when to long in notes/remarks */
    .notes_remarks {
        word-break: break-all;
    }
    /*give effect shadow to table and give color to border table*/
    #request_area {
        border: 4px solid gray;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    /*give coloumn header back-color */
    thead > tr > th {
        background-color: #151A48;
        color: white;
    }
    /*give color when row in table hovered*/
    table > tbody > tr:hover > td {
        background-color: lightblue;
        color: black;
    }
    /*give button export back-color*/
    #btnExportExcel {
        background-color: #151A48;
        color: white;
        font-weight: 600;
        border: 2px solid white;
    }
    /*give button export back-color when hovered*/
    #btnExportExcel:hover {
        background-color: white;
        color: #151A48;
        font-weight: 700;
        border: 2px solid #151A48;
        outline: none;
    }
    /*give button export back-color when focus and hovered*/
    #btnExportExcel:focus:hover {
        background-color: white;
        color: #151A48;
        font-weight: 700;
        border: 2px solid #151A48;
        outline: none;
    }

    .panel-default {
        border: 3px solid #151A48;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    #panelHeader {
        background-color: #151A48;
        color: white;
        padding: 20px;
    }

    .panel-default > #panelHeader > h3 {
        font-size: 20px;
    }

    /* add color red in symbol*/
    .importantSymbols {
        color: red;
    }
    /* add color perfectly in modal header */
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
    /* add back-color to button reset and submit*/
    .modal-footer > button {
        background-color: #151A48;
        color: white;
        font-weight: 600;
        border: 2px solid white;
    }
    /* add back-color to button reset and submit when hovered*/
    .modal-footer > button:hover {
        background-color: white;
        color: #151A48;
        font-weight: 600;
        border: 2px solid #151A48;
    }
    /*add border color in input form when active / used */
    .form-group > .form-control:focus {
        border: 2px solid #151A48;
    }

    #btnSearchFilter {
        background-color: #151A48;
        color: white;
    }
    #btnResetFilter {
        background-color: #151A48;
        color: white;
    }

    div.dt-buttons > button.buttons-excel {
        color: white;
        background-color: #151A48;
        border-radius: 5px;
        border: none;
    }
    div.dt-buttons > button.buttons-excel:hover {
        color: white;
        background-color: #151A48;
        border-radius: 5px;
        border: none;
    }
    div.dt-buttons > button.buttons-excel > span {
        font-size: 15px;
        line-height: 1.5;
        text-transform: uppercase;
    }
    div.dt-buttons > button.buttons-excel > span::before {
        content : '\f15b';
        font-family: fontAwesome;
        margin-right: 5px;
    }

    div.dt-buttons > button.buttons-colvis {
        color: white;
        background-color: #151A48;
        border-radius: 5px;
        border: none;
        resize: none;
    }
    div.dt-buttons > button.buttons-colvis:hover {
        color: white;
        background-color: #151A48;
        transform: none;
    }
    div.dt-buttons > button.buttons-colvis > span {
        font-size: 15px;
        line-height: 1.5;
    }
    div.dt-buttons > button.buttons-colvis > span::before {
        content : '\f0db';
        font-family: fontAwesome;
        margin-right: 5px;
    }

    div.dt-buttons > button.buttons-page-length {
        color: white;
        background-color: #151A48;
        border-radius: 5px;
        border: none;
    }
    div.dt-buttons > button.buttons-page-length:hover {
        color: white;
        background-color: #151A48;
        border-radius: 5px;
        border: none;
    }
    div.dt-buttons > button.buttons-page-length > span {
        font-size: 15px;
        line-height: 1.5;
    }

    #request_area_length > label > select {
        height: 35px;
        width: 98px;
        border-radius: 5px;
        padding-left: 35px;
    }
</style>


<?php $__env->startSection('content'); ?>
<div class="main-grid">
    <div class="agile-grids">
        <div class="buttons-heading">
            <h2>Request Area Tracking</h2>
        </div>

        <!--validasi form-->
        <?php if(count($errors)>0): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <ul>
                <li><strong>Process Data Failed !</strong></li>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><strong><?php echo e($error); ?></strong></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>   
        <?php endif; ?>
        <!--end validasi form-->

        <!-- alert error export -->
        <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><?php echo e(session('error')); ?></strong>
            </div> 
        <?php endif; ?>
        <!--end error alert export-->

        <!--alert success -->
        <?php if(session('status')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><?php echo e(session('status')); ?></strong>
            </div> 
        <?php endif; ?>
         <!--end alert success -->

        <div class="panel panel-default">
            <div class="panel-heading" id="panelHeader">
              <h3 class="panel-title">Data Request Area</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo e(url('/request_area')); ?>" method="post" id="myform" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group"> 
                                <label>Email</label> 
                                <input type="text" class="form-control" name='filter_email' id='filter_email' value="<?php echo e(old('filter_email')); ?>" placeholder="Email" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32 || event.charCode == 64 || event.charCode ==  46">
                            </div>
                        </div> 
                        <div class="col-sm-4">
                            <div class="form-group"> 
                                <label>Nomor Telepon</label> 
                                <input type="text" class="form-control" name='filter_phone_number' id='filter_phone_number' value="<?php echo e(old('filter_phone_number')); ?>" placeholder="Nomor Telepon" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32 || event.charCode == 64 || event.charCode ==  46">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group"> 
                                <label>Provinsi</label> 
                                <select name="provinces" id="provinces" class="form-control">
                                    <option value="">- Pilih Provinsi -</option>
                                    <?php $__currentLoopData = $dropdowns['prov']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provinces): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($provinces->id); ?>"><?php echo e($provinces->provinces_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group"> 
                                <label>Kota</label> 
                                <select name="regencies" id="regencies" class="form-control" disabled>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group"> 
                                <label>Kecamatan</label> 
                                <select name="districts" id="districts" class="form-control" disabled>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group"> 
                                <label>Kelurahan</label> 
                                <select name="villages" id="villages" class="form-control" disabled> 
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <input type="date" id="filter_date_start" name="filter_date_start" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <input type="date" id="filter_date_finish" name="filter_date_finish" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <br>
                            
                            <button type="button" class="btn btn-md" id="btnResetFilter">
                                <i class="fa fa-refresh" aria-hidden="true"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-md" id="btnSearchFilter">
                                <i class="fa fa-search" aria-hidden="true"></i> Search
                            </button>
                            
                        </div>
                    </div>
                </form>
                <!-- table -->
                <table id="request_area" class="display" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Lokasi</th>
                            <th>Alamat</th>
                            <th>Tanggal Submit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $request_areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request_area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <span><?php echo e($request_area->full_name); ?></span>
                            </td>
                            <td>
                                <span><?php echo e($request_area->email); ?></span>
                            </td>
                            <td>
                                <span><?php echo e($request_area->phone_number); ?></span>
                            </td>
                            <td>
                                <span><b>Provinsi : </b><?php echo e($request_area->provinsi); ?>,</span><br>
                                <span><b>Kota : </b><?php echo e($request_area->kota); ?>,</span><br>
                                <span><b>Kecamatan : </b><?php echo e($request_area->kecamatan); ?>,</span><br>
                                <span><b>Kelurahan : </b><?php echo e($request_area->kelurahan); ?>.</span><br>
                            </td>
                            <td>
                                <span><b>Nama Jalan : </b><?php echo e($request_area->street_name); ?></span><br>
                                <span><b>Kode Pos : </b><?php echo e($request_area->postal_code); ?></span><br>
                                <span class="notes_remarks"><b>Notes : </b><?php echo e($request_area->remarks); ?></span>
                            </td>
                            <td>
                                <span><?php echo e(date('d-M-Y H:i:s', strtotime($request_area->request_create))); ?></span>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                    </tbody>
                </table>

            </div><!-- panel body-->
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
       
        var table = $('#request_area').DataTable( {
            // B -> button 
            // l -> languange
            // f -> filtering search
            // i -> info 
            // r -> processing display 
            // t -> table
            // p -> pagination
            dom: "<'row'<'col-sm-12 col-md-6'Bl><'col-sm-12 col-md-6'f>>" + "rtip",
            // dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'fl>>" + "rtip",
            
            "language": {
                "lengthMenu": "_MENU_",
            },
            lengthMenu : [
                [ 20, 50, 100], 
                ['20','50','100'],
            ],
            // "dom": '<"top"i>rt<"top"flp>',
            buttons: [
                'excel',
                // 'colvis'
            ],
            // order dipakai untuk mengurutkan data table
            "order": [],
            responsive: true,
        } );

        // reset input when button clicked*/
        $('#btnResetModalExport').off('click').on('click',resetExport);
        // reset input when modal closed
        $('#closeModalExport').off('click').on('click',resetExport);
        // reset input when open modal, case happen when page refresh and open modal
        $('#btnExportExcel').off('click').on('click',resetExport);

        function resetExport() 
        {
            $('#provinces').val('all');
            $('#date_start').val('');
            $('#date_finish').val('');
        }

        $('#btnResetFilter').off('click').on('click',resetFilter);

        function resetFilter() 
        {
            $('#filter_email').val('');
            $('#filter_phone_number').val('');
            $('#provinces').val('');
            $('#regencies').val('');
            $('#districts').val('');
            $('#villages').val('');
            $('#filter_postal_code').val('');
            $('#filter_date_start').val('');
            $('#filter_date_finish').val('');
        }

        $('select[name="provinces"]').on('change', function() {
            var provinces_id = $(this).val();
            var url = '<?php echo e(route("regencies", ":id")); ?>';
            url = url.replace(':id', provinces_id);
            if(provinces_id) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        // console.log(data);
                        $('select[name="regencies"]').empty();
                        $('select[name="regencies"]').removeAttr("disabled");
                        $('select[name="regencies"]').append(
                                '<option value="">- Pilih Kota -</option>'
                        );
                        $.each(data, function(regencies, value) {
                            $('select[name="regencies"]').append(
                                '<option value="'+ value.id_regencies +'">'+ value.regencies_name +'</option>'
                            );
                        });

                    }
                });
            }
            else
            {
                $('select[name="regencies"]').empty();
            }
        });

        $('select[name="regencies"]').on('change', function() {
            var regencies_id = $(this).val();
            var url = '<?php echo e(route("districts", ":id")); ?>';
            url = url.replace(':id', regencies_id);
            if(regencies_id) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="districts"]').empty();
                        $('select[name="districts"]').removeAttr("disabled");
                        $('select[name="districts"]').append(
                                '<option value="">- Pilih Kecamatan -</option>'
                        );
                        $.each(data, function(districts, value) {
                            $('select[name="districts"]').append(
                                '<option value="'+ value.id_districts +'">'+ value.districts_name +'</option>'
                            );
                        });

                    }
                });
            }
            else
            {
                $('select[name="districts"]').empty();
            }
        });

        $('select[name="districts"]').on('change', function() {
            var districts_id = $(this).val();
            var url = '<?php echo e(route("villages", ":id")); ?>';
            url = url.replace(':id', districts_id);
            if(districts_id) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="villages"]').empty();
                        $('select[name="villages"]').removeAttr("disabled");
                        $('select[name="villages"]').append(
                                '<option value="">- Pilih Kelurahan -</option>'
                        );
                        $.each(data, function(villages, value) {
                            $('select[name="villages"]').append(
                                '<option value="'+ value.id_villages +'">'+ value.villages_name +'</option>'
                            );
                        });

                    }
                });
            }
            else
            {
                $('select[name="kelurahan"]').empty();
            }
        });

    } );
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\backupcoveragearea\resources\views/coverage_internal/dashboard_request.blade.php ENDPATH**/ ?>