<!DOCTYPE HTML>
<head>
<title><?php echo isset($page_title) ? $page_title : $setting->getValueItem(1); ?></title>
<?php echo $__env->make('front::layout.partials.body.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('front::layout.partials.header.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('link'); ?>
</head>
<body>
  <!------------Header ------------>
  <?php echo $__env->make('front::layout.partials.body.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   <div class="main">
    	<?php echo $__env->yieldContent('content-bottom'); ?>
   </div>
   <?php echo $__env->make('front::layout.partials.body.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   <?php echo $__env->make('front::layout.partials.header.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   <?php echo $__env->yieldContent('script'); ?>
</body>
</html>

