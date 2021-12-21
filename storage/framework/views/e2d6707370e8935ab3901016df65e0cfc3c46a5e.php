<!DOCTYPE html>
<head>
<title>Coverage Area | PT NAP Info Lintas Nusa</title>
<link rel="shortcut icon" href="<?php echo e(asset('admin/images/matrix-logo.png')); ?>" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="stylesheet" href="<?php echo e(asset('admin/css/bootstrap.css')); ?>">
<link href="<?php echo e(asset('admin/css/style.css')); ?>" rel='stylesheet' type='text/css' />
<link href='<?php echo e(url('//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic')); ?>' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo e(asset('admin/css/font.css')); ?>" type="text/css"/>
<link href="<?php echo e(asset('admin/css/font-awesome.css')); ?>" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="<?php echo e(url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')); ?>">
<script src="<?php echo e(url('http://code.jquery.com/ui/1.12.1/jquery-ui.js')); ?>" ></script>
<script src="<?php echo e(url('https://code.jquery.com/ui/1.12.1/jquery-ui.min.js')); ?>"></script>

</head>
<body class="signup-body">
		<div class="agile-signup">	
			
			<div class="content2">
				<div class="grids-heading gallery-heading signup-heading">
                    <img src="<?php echo e(asset('admin/images/matrix-logo.png')); ?>" alt="" />
				</div>
                <?php if(session('statusLogin')): ?>
                    <div class="alert alert-danger" role="alert">
                        <strong><?php echo e(session('statusLogin')); ?></strong>
                    </div> 
				<?php elseif(session('statusLogout')): ?>
				<div class="alert alert-success" role="alert">
					<strong><?php echo e(session('statusLogout')); ?></strong>
				</div> 
                <?php endif; ?>
				<form action="<?php echo e(url('/postlogin')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
					<input type="text" name="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
					<input type="password" name="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
					<input type="submit" class="register" value="Login">
				</form>
		
				<div class="copyright">
					<p>© 2021 PT NAP Info Lintas Nusa</p>
					<p>Version 1.0</p>
				</div>
			</div>
			
		</div>
	<script src="<?php echo e(asset('admin/js/proton.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\nap_coverage_area\resources\views/auth/login.blade.php ENDPATH**/ ?>