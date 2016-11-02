<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-3"><p>Tên nhóm: <b><?php echo e($product_category->name); ?></b></p></div>
        <div class="col-xs-3"><p>Slug: <b><?php echo e($product_category->slug); ?></b></p></div>
        <div class="col-xs-3"><p>Trạng thái: <b><?php echo e($product_category->active); ?></b></p></div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('product::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>