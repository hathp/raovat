<?php $__env->startSection('content-bottom'); ?>
	<div class="content">
		<?php echo $__env->yieldContent('content-top'); ?>
		<div class="content_bottom">
			<div class="wrap">
				<div class="content-bottom-left">
					<?php echo $__env->make('front::layout.partials.body.category', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo $__env->make('front::layout.partials.body.buters-guide', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo $__env->make('front::layout.partials.body.add-banner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>
				<?php echo $__env->yieldContent('content'); ?>
				<div class="clear"></div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('front::layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>