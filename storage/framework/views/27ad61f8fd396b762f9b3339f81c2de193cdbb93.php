<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Coverage Area | PT NAP Info Lintas Nusa</title>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<link rel="shortcut icon" href="<?php echo e(asset('admin/images/matrix-logo.png')); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="<?php echo e(asset('admin/css/bootstrap.css')); ?>">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?php echo e(asset('admin/css/style.css')); ?>" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/jquery-ui.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(url('https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css')); ?>" />

<!-- Data Tables CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo e(url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(url('https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(url('https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.bootstrap.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(url('https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css')); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/1.0.0/css/dataTables.responsive.css">

<!-- font CSS -->
<link href='<?php echo e(url('//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic')); ?>' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?php echo e(asset('admin/css/font.css')); ?>" type="text/css"/>
<link href="<?php echo e(asset('admin/css/font-awesome.css')); ?>" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="<?php echo e(asset('admin/js/jquery-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/modernizr.js')); ?>"></script>
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

<script src="<?php echo e(url('https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(url('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js')); ?>"></script>
<script src="<?php echo e(url('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(url('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(url('https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(url('https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(url('https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js	')); ?>"></script>

<script>
	$(function () {
		$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

		if (!screenfull.enabled) {
			return false;
		}

		$('#toggle').click(function () {
			screenfull.toggle($('#container')[0]);
		});	
	});
</script>
<!-- tables -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/table-style.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/basictable.css')); ?>" />
<script type="text/javascript" src="<?php echo e(asset('admin/js/jquery.basictable.min.js')); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
	  
    });
</script>
<!-- //tables -->

<!-- charts -->
<script src="<?php echo e(asset('admin/js/raphael-min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/morris.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(asset('admin/css/morris.css')); ?>">
<!-- //charts -->
<!--skycons-icons-->
<script src="<?php echo e(asset('admin/js/skycons.js')); ?>"></script>
<!--//skycons-icons-->

<style>
	@import  url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
	* {
        font-family: 'Poppins', sans-serif;
    }
</style>

</head>
<body class="dashboard-page">
	<script>
	        var theme = $.cookie('protonTheme') || 'default';
	        $('body').removeClass (function (index, css) {
	            return (css.match (/\btheme-\S+/g) || []).join(' ');
	        });
	        if (theme !== 'default') $('body').addClass(theme);
        </script>
	<!--navbar-->
	<?php echo $__env->make('layout.includes._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<!--end navbar-->
	<section class="wrapper scrollable">
		<nav class="user-menu">
			<a href="javascript:;" class="main-menu-access">
			<i class="icon-proton-logo"></i>
			<i class="icon-reorder"></i>
			</a>
		</nav>
		<!--titlebar-->
		<?php echo $__env->make('layout.includes._titlebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!--end titlebar-->

		<!--content-->
		<?php echo $__env->yieldContent('content'); ?>
		<!--end content-->
		<!-- footer -->
		<div class="footer" style="position:relative; bottom:-100px">
			<p>© 2021 PT NAP Info Lintas Nusa</p>
			<p>Version 1.0</p>
		</div>
		<!-- //footer -->
	</section>
	<script src="<?php echo e(asset('admin/js/bootstrap.js')); ?>"></script>
	<script src="<?php echo e(asset('admin/js/proton.js')); ?>"></script>

	<link href="<?php echo e(URL::asset('assets/plugins/ionicons/css/ionicons.min.css')); ?>" rel="stylesheet"/>
	<link href="<?php echo e(URL::asset('assets/plugins/datepicker/css/bootstrap-datepicker.css')); ?>" rel="stylesheet"/>
	
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/plugins.css')); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css')); ?>" />
	<!-- datepicker -->
	<script src="<?php echo e(URL::asset('admin/plugins/bootstrap-daterangepicker/moment.min.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(URL::asset('admin/plugins/bootstrap-daterangepicker/daterangepicker.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(URL::asset('assets/plugins/jquery-countTo/jquery.countTo.js')); ?>" type="text/javascript"></script>
	<!-- datepicker -->
	<script src="<?php echo e(URL::asset('admin/plugins/datepicker/js/bootstrap-datepicker.min.js')); ?>" type="text/javascript"></script>
	
	<!-- gymie -->
	<script src="<?php echo e(URL::asset('admin/js/gymie.js')); ?>" type="text/javascript"></script>

	<script type="text/javascript">

		$(document).ready(function () {
			gymie.loadcounter();
			gymie.loadprogress();
			gymie.loaddatepicker();
			gymie.loaddaterangepicker();
			gymie.loadbsselect();
		});
	
	</script>
	
</body>
</html>
<?php /**PATH C:\xampp\htdocs\nap_coverage_area\resources\views/layout/master.blade.php ENDPATH**/ ?>