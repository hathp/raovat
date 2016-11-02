<?php $__env->startSection('content'); ?>
    <div class="content-bottom-right">
        <div class="product-articles">
            <?php if(isset($page_title)): ?>
                <h3><?php echo e($page_title); ?></h3>
            <?php else: ?>
                <h3>Tin tức và dịch vụ</h3>
            <?php endif; ?>
            <?php echo $__env->make('front::block.article-list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('front::block.pagination', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>