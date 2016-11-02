

<?php $__env->startSection('extends'); ?>

    <div class="actions">
        <?php echo ViewHelper::button('Xóa', '#confirmation-modal', null, ['color' => 'red', 'button' => 'circle', 'class' => 'delete-items', 'data-toggle' => 'modal', 'data-form-target' => '#product-categories-list', 'data-form-method' => 'delete', 'data-form-action' => route('admin.contact.destroy')]); ?>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('contact::partials.portlet-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>