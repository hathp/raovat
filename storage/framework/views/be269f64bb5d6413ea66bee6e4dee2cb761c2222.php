


<?php $__env->startSection('js-page-plugin'); ?>
    <script src="<?php echo e(asset('assets/admin/plugins/global/ckeditor/ckeditor.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <?php echo Form::model($classifieds, ['method' => 'put', 'url' => route('admin.classified.update', $classifieds->id), 'files']); ?>

            <?php echo $__env->make($package_name. '::classified.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('admin.partials.form-submit-button', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($package_name. '::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>