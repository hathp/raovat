<?php $__env->startSection('modal-content'); ?>
    <div>

    </div>
    <?php echo FormHelper::checkbox('Xóa sản phẩm có trong mục này', 'delete_product', 1, false, ['input' => ['form' => 'page-categories-list']]); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('product::partials.confirmation-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>