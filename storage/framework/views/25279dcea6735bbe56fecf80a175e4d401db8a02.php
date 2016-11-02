<?php $__env->startSection('content'); ?>
    <div class="content-bottom-right">
        <?php echo $__env->make('front::block.product-list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>