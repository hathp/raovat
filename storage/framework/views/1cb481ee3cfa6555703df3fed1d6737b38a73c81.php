<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mam non Haỉ Phòng</title>
    <?php echo $__env->make('front::layout.partials.body.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('front::layout.partials.header.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body>
    <div class="main">
        <?php echo $__env->make('front::layout.partials.body.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="content">
            <div class="cont-left">
                <?php echo $__env->make('front::layout.partials.body.left-content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="cont-right">
				<?php echo $__env->yieldContent('content'); ?>
			</div>
           <div class="clearfix"> </div>
        </div>
         <div class="clearfix"> </div>
         <?php echo $__env->make('front::layout.partials.body.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div> 
    <?php echo $__env->make('front::layout.partials.header.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->yieldContent('script'); ?>
</body>
</html>