<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Coverage Area | PT Nap Info Lintas Nusa</title>
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

    <link href="<?php echo e(asset('admin/css/coverage.css')); ?>" rel='stylesheet' type='text/css' />
</head>

<body>
    <header>
        <a href="<?php echo e(url('/coverage_area')); ?>" class="logo"><img src="<?php echo e(url('/admin/images/matrix-logo.PNG')); ?>" alt=""></a>
        <div class="menu-toggle"></div>
        <nav>
            <ul>
                <li><a href="<?php echo e(url('/coverage_area')); ?>" class="coverage active">Coverage</a></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>

    <div class="panel panel-widget top-grids">
        <div class="chute chute-center">
            <div class="row mb40">
                <div class="col-md-10">
                    <div class="demo-grid">
                        <h2>Check Coverage Area</h2>
                        <hr id="lineBorder">
                        <div class="form-body">
                            <div class="form-group"> 
                                <label>Ketik kata kunci alamat untuk mencari lokasi</label> 
                                <select class="autosearch form-control" name="autosearch" id="autosearch" data-size="5" data-dropup-auto="false" onchange="myFunction()" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div><!-- form-body-->
                        <a href="https://nap.net.id/broadband.html"><u><p id="demo" align="center"></p></u></a><br>
                    </div>
                </div>
            </div><!-- row mb40-->
        </div>
    </div><!-- panel widget-->


      <br><br>
    <div class="footer">
        <p>© 2021 PT NAP Info Lintas Nusa</p>
        <p>Version 1.0</p>
    </div>
</body>

<script type="text/javascript">
    $('.menu-toggle').click(function(){
        $('.menu-toggle').toggleClass('active');
        $('nav').toggleClass('active');
    });

    $('.autosearch').select2({
        width: 'resolve',
        allowClear: true,
        placeholder: 'Nama Jalan / Nomor / Apartemen / Komplek / Kelurahan / Kode Pos / Kota',
        minimumInputLength: 3,
        language: {
            noResults: function() {
                return "No Results Found <a href='<?php echo e(url('request_area/create')); ?>' class='btn btn-primary' style='background-color:#151A48; color:white'>Click here to request area</a>";
            },
        },
        escapeMarkup: function(markup) {
            return markup;
        },
        ajax: {
            url: "<?php echo e(route('search')); ?>",
            dataType: 'json',
            delay: 220,
            processResults: function (data) {
                return {
                    results: $.map(data, function (data) {
                        return {
                            text: data.street_name + ' NO.' + data.number + ' ' + data.residence_name + ' ' + data.unit + ' ' + data.district + ' ' + data.city + ' ' + data.postal_code, 
                            id: data.id                        
                        }
                    })
                };
            },
            cache: true
        }
    });

    function myFunction() {
        var homepass_id = document.getElementById("autosearch").value;
        document.getElementById("demo").innerHTML = "This area is already covered. Click here for subscribe";
    }

   
</script>
</html><?php /**PATH C:\xampp\htdocs\search_coverage\resources\views/welcome.blade.php ENDPATH**/ ?>