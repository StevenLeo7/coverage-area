<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Request Area | PT Nap Info Lintas Nusa</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Put logo matrix in tab -->
    <link rel="shortcut icon" href="<?php echo e(asset('admin/images/matrix-logo.png')); ?>" />
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/bootstrap.css')); ?>">

    <!-- Custom CSS -->
    <link href="<?php echo e(asset('admin/css/style.css')); ?>" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/jquery-ui.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css')); ?>" />

    <!-- Data Tables CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script src="<?php echo e(url('https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js')); ?>"></script>

    <!-- font CSS -->
    <link href='https://fonts.googleapis.com/css?family=Quicksand:400,500,700&subset=latin-ext' rel='stylesheet' type='text/css'>
    
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/font.css')); ?>" type="text/css"/>
    <link href="<?php echo e(asset('admin/css/font-awesome.css')); ?>" rel="stylesheet"> 

    <!-- //font-awesome icons -->
    <script src="<?php echo e(asset('admin/js/jquery-3.6.0.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('admin/js/jquery.cookie.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/screenfull.js')); ?>"></script>

    <script src="<?php echo e(url('http://code.jquery.com/ui/1.12.1/jquery-ui.js')); ?>" ></script>
    <script src="<?php echo e(url('https://code.jquery.com/ui/1.12.1/jquery-ui.min.js')); ?>"></script>
    
    <!-- Data Tables JS -->
    <script src="<?php echo e(url('https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(url('https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(url('https://cdn.datatables.net/fixedheader/3.1.9/js/dataTables.fixedHeader.min.js')); ?>"></script>
    <script src="<?php echo e(url('https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(url('https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js')); ?>"></script>


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <link href="<?php echo e(asset('admin/css/request.css')); ?>" rel='stylesheet' type='text/css' />

</head>

<body>
    <header>
        <a href="<?php echo e(url('/coverage_area')); ?>" class="logo"><img src="<?php echo e(url('/admin/images/matrix-logo.PNG')); ?>" alt=""></a>
        <div class="menu-toggle"></div>
        <nav>
            <ul>
                <li><a href="<?php echo e(url('/coverage_area')); ?>" class="inactive">Coverage</a></li>
                <li><a href="<?php echo e(url('/request_area/create')); ?>" class="active">Request</a></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>

    <div class="panel panel-default" id="panelBasic">
        <div class="panel-body">
            <div class="row">
                <h2>Request Coverage Area</h2>
                <hr>
                <!--alert success -->
                <div class="col-lg-12">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong><?php echo e(session('status')); ?></strong>
                    </div> 
                    <?php endif; ?>
                </div>
                <!--alert success -->
                <!-- start validation -->
                <div class="col-lg-12">
                    <?php if(count($errors)>0): ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <ul>
                                <li><strong>Saved Data Failed !</strong></li>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <li><strong><?php echo e($error); ?></strong></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>   
                    <?php endif; ?>
                </div>
                <!--end validasi form-->
                <form action="<?php echo e(url('/request_area/create')); ?>" method="post" id="myform" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="col-lg-12">
                        <div class="form-body">
                            <div class="form-group"> 
                                <label>Nama Lengkap</label> 
                                <input type="text" class="form-control" name='nama_lengkap' id='nama_lengkap' value="<?php echo e(old('nama_lengkap')); ?>" placeholder="Nama Lengkap" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-body">
                            <div class="form-group"> 
                                <label>Email</label> 
                                <input type="text" class="form-control" name='email' id='email' value="<?php echo e(old('email')); ?>" placeholder="matxxxx@gmail.com" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32 || event.charCode == 64 || event.charCode ==  46">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-body">
                            <div class="form-group"> 
                                <label>Nomor Telepon</label> 
                                <input type="text" class="form-control" name='nomor_telepon' id='nomor_telepon' value="<?php echo e(old('nomor_telepon')); ?>" placeholder="08xxxxxxxxx" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 43">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-body">
                            <div class="form-group"> 
                                <label>Provinces</label> 
                                <select name="provinsi" id="provinsi" class="form-control">
                                    <option value="">- Pilih Provinsi -</option>
                                    <?php $__currentLoopData = $dropdowns['prov']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provinces): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($provinces->id); ?>"><?php echo e($provinces->provinces_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-body">
                            <div class="form-group"> 
                                <label>Kota</label> 
                                <select name="kota" id="kota" class="form-control"></select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-body">
                            <div class="form-group"> 
                                <label>Kecamatan</label> 
                                <select name="kecamatan" id="kecamatan" class="form-control"></select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-body">
                            <div class="form-group"> 
                                <label>Kelurahan</label> 
                                <select name="kelurahan" id="kelurahan" class="form-control"></select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-body">
                            <div class="form-group"> 
                                <label>Nama Jalan</label> 
                                <textarea type="text" name="nama_jalan" class="form-control" id="nama_jalan" cols="30" rows="3" value="" placeholder="Alamat lengkap" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 32 && event.charCode <= 47) || (event.charCode >= 91 && event.charCode <=  96) || (event.charCode >= 123 && event.charCode <=  126) || event.charCode == 58 || event.charCode == 59 || event.charCode == 61 || event.charCode == 63 || event.charCode == 64 || event.charCode == 13"><?php echo e(old('nama_jalan')); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-body">
                            <div class="form-group"> 
                                <label>Kode Pos</label> 
                                <input type="text" class="form-control" name='kode_pos' id='kode_pos' placeholder="Kode Pos" value="<?php echo e(old('kode_pos')); ?>" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-body">
                            <div class="form-group"> 
                                <label>Catatan</label> 
                                <textarea type="text" name="catatan" class="form-control" id="catatan" cols="30" rows="3" value="" placeholder="Detail Area Sekitar Rumah" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 32 && event.charCode <= 47) || (event.charCode >= 91 && event.charCode <=  96) || (event.charCode >= 123 && event.charCode <=  126) || event.charCode == 58 || event.charCode == 59 || event.charCode == 61 || event.charCode == 63 || event.charCode == 64 || event.charCode == 13" maxlength="50"><?php echo e(old('catatan')); ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-lg" id="btnResetRequestArea"><i class="fa fa-refresh"></i> Reset</button>
                    <button type="submit" class="btn btn-primary btn-lg" id="btnSubmitRequestArea"><i class="fa fa-check"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>

    <br><br>
    <div class="footer">
        <p>© 2021 PT NAP Info Lintas Nusa</p>
		<p>Version 1.0</p>
    </div>
</div>
</body>

<script type="text/javascript">
    $(document).ready(function(){
        // navbar toogle versi mobile
        $('.menu-toggle').click(function(){
            $('.menu-toggle').toggleClass('active');
            $('nav').toggleClass('active');
        });

        $('#btnResetRequestArea').off('click').on('click',resetRequestArea);

        // reset form request
        function resetRequestArea() 
        {
            $('#nama_lengkap').val('');
            $('#email').val('');
            $('#nomor_telepon').val('');
            $('#provinsi').val('');
            $('select[name="kota"]').empty();
            $('select[name="kecamatan"]').empty();
            $('select[name="kelurahan"]').empty();
            $('#nama_jalan').val('');
            $('#kode_pos').val('');
            $('#catatan').val('');
        }

        $('#myform').submit(function(){
            $("#btnSubmitRequestArea", this).html("Please Wait...").attr('disabled', 'disabled');
            return true;
        });

        // show select kota after select provincies
        $('select[name="provinsi"]').on('change', function() {
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
                        console.log(data);
                        $('select[name="kota"]').empty();
                        $('select[name="kota"]').append(
                                '<option value="">- Pilih Kota -</option>'
                        );
                        $.each(data, function(regencies, value) {
                            $('select[name="kota"]').append(
                                '<option value="'+ value.id_regencies +'">'+ value.regencies_name +'</option>'
                            );
                        });

                    }
                });
            }
            else
            {
                $('select[name="kota"]').empty();
            }
        });

        // show select kota after select provincies
        $('select[name="kota"]').on('change', function() {
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
                        $('select[name="kecamatan"]').empty();
                        $('select[name="kecamatan"]').append(
                                '<option value="">- Pilih Kecamatan -</option>'
                        );
                        $.each(data, function(districts, value) {
                            $('select[name="kecamatan"]').append(
                                '<option value="'+ value.id_districts +'">'+ value.districts_name +'</option>'
                            );
                        });

                    }
                });
            }
            else
            {
                $('select[name="kecamatan"]').empty();
            }
        });

        // show select kecamatan after select kelurahan
        $('select[name="kecamatan"]').on('change', function() {
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
                        $('select[name="kelurahan"]').empty();
                        $('select[name="kelurahan"]').append(
                                '<option value="">- Pilih Kelurahan -</option>'
                        );
                        $.each(data, function(villages, value) {
                            $('select[name="kelurahan"]').append(
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

    });
   
</script>
</html><?php /**PATH C:\xampp\htdocs\backupcoveragearea\resources\views/request_area.blade.php ENDPATH**/ ?>