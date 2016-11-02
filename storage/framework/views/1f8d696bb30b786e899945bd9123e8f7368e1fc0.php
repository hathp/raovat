<?php $__env->startSection('content-top'); ?>
	<?php echo $__env->make('front::layout.partials.body.content-top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<div class="content-bottom-right">
		<?php echo $__env->make('front::block.product-list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<div class="product-articles">
			<h3>Tin tức trong ngành</h3>
			<?php echo $__env->make('front::block.article-list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>