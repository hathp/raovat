<?php $__env->startSection('page-style'); ?>
    <style>
        p {
            margin: 0 !important;
            padding: 0 !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-3">
            <p>SĐT: <b><?php echo e($classifieds->mobile); ?></b></p>
        </div>
        <div class="col-xs-3">
            <p>Email: <b><?php echo e($classifieds->email); ?></b></p>
        </div>
        <div class="col-xs-6">
            <p>Đại chỉ: <b><?php echo e($classifieds->address); ?></b></p>
        </div>
        <div class="col-xs-3">
            <p>Mã tin: <b><?php echo e($classifieds->code); ?></b></p>
        </div>
        <div class="col-xs-3">
            <p>Thời gian: <b><?php echo with($classifieds->created_at)->format('d/m/Y H:i'); ?></b></p>
        </div>
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-3">
                    <img style="width: 100%;" src="<?php echo e($classifieds->getImage()); ?>" alt="">
                </div>
            </div>
        </div>


        <div class="col-xs-12">
            <h4>Nội dung</h4>
            <?php echo $classifieds->content; ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($package_name. '::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>