<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<html lang="en">
<!--<![endif]--><head>

<!-- Basic Page Needs -->
<meta charset="utf-8">
<title>Đại lộ Tiếng Anh</title>
<?php echo $__env->make('front::layout.partials.body.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('front::layout.partials.header.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>

<body>
<!--[if !IE]><!--><script>if(/*@cc_on!@*/false){document.documentElement.className+=' ie10';}</script><!--<![endif]--> <!-- Border radius fixed IE10-->
<?php echo $__env->make('front::layout.partials.body.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('front::layout.partials.body.narbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->yieldContent('block'); ?>
<div class="container">
	<div class="row">
		<?php echo $__env->yieldContent('content'); ?>
	</div>
</div><!-- end container-->
<?php echo $__env->make('front::layout.partials.body.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div id="toTop">Back to Top</div>
<?php echo $__env->make('front::layout.partials.header.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->yieldContent('script'); ?>
</body>
</html>