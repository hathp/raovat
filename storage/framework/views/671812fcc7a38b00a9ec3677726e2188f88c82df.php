<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <?php echo Form::model($page_category, ['method' => 'put', 'url' => $update_link, 'files']); ?>

                <?php echo $__env->make('page::category.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('page::partials.form-submit-button', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('page::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>