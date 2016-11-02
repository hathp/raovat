<?php $__env->startSection('content'); ?>
    <div class="content-bottom-right">
        <h3><?php echo e($page_title); ?></h3>
        <div class="section group">
            <?php foreach($list as $item): ?>
                <?php echo $__env->make('front::block.product-item', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endforeach; ?>
        </div>
        <?php echo $__env->make('front::block.pagination', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>