<!DOCTYPE html>
<html lang="en">
<head>
	<title>Unicase</title>
	<!-- Meta -->
	<?php echo $__env->make('front::layout.partials.body.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('front::layout.partials.header.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<!-- ============================================== TOP MENU ============================================== -->
<!-- ============================================== top-bar ============================================== -->
<!-- ============================================== TOP MENU : END ============================================== -->
<?php echo $__env->make('front::layout.partials.body.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!-- ============================================== NAVBAR ============================================== -->
<?php echo $__env->make('front::layout.partials.body.narbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- ============================================== NAVBAR : END ============================================== -->
</header>
<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
		<div class="row">
		<!-- ============================================== SIDEBAR ============================================== -->	
			<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
				<?php echo $__env->yieldContent('sidebar'); ?>
			</div><!-- /.sidemenu-holder -->
			<!-- ============================================== SIDEBAR : END ============================================== -->
			<!-- ============================================== CONTENT ============================================== -->
			<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
				<!-- ========================================== SECTION – HERO ========================================= -->
				<?php echo $__env->yieldContent('content'); ?>
			</div><!-- /.homebanner-holder -->
			<!-- ============================================== CONTENT : END ============================================== -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->

<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<?php echo $__env->make('front::layout.partials.body.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('front::layout.partials.header.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->yieldContent('script'); ?>
</body>
</html>