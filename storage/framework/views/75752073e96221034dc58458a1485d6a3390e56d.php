<?php $__env->startSection('extends'); ?>

    <div class="actions">
        <?php echo ViewHelper::button('Xóa', null, null, ['color' => 'red', 'button' => 'circle', 'class' => 'delete-items', 'data-target' => '.classified-list']); ?>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.partials.portlet-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>