<?php $__env->startSection('js-page-plugin'); ?>
    <?php echo $__env->make('product::manufacture.partials.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                <?php echo $__env->make('product::category.partials.portlet-tab-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="portlet-body">
                    <?php echo Form::model($manufacture, ['method' => 'patch', 'route' => ['admin.product-manufacture.update', $manufacture->id], 'files']); ?>

                        <?php echo $__env->make('product::manufacture.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('product::partials.form-submit-button', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('page::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>