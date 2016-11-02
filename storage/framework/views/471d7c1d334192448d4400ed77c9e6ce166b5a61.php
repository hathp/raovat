<?php $__env->startSection('extends'); ?>

    <div class="actions">
        <div class="actions">
            <?php echo ViewHelper::button('Xóa', null, null, ['color' => 'red', 'button' => 'circle', 'class' => 'delete-items', 'data-target' => '.page-list']); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('page::partials.portlet-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>