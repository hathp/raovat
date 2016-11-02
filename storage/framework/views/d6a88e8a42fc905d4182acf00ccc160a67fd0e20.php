

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="/assets/front/plugins/bootstrap-fileinput/css/fileinput.min.css">
    <link type="text/css" rel="stylesheet" href="/assets/front/plugins/plupload-2/js/jquery.ui.plupload/css/jquery.ui.plupload.css" media="screen">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--  -->
    <div class="container-fluid" id="tit-leftbar">
        <div class="container">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <h2>lựa chọn chuyên mục</h2>
            </div>
        </div>
    </div>

    <!--  -->
    <div class="container-fluid" id="leftbar-slideshow">
        <div class="container">
            <!-- /navbar -->
            <?php echo $__env->make('front::partials.category', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- slide -->
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <div class="upload-classified">
                    <h3>Đăng tin rao vặt</h3>
                    <form method="post" action="<?php echo e(route('front.classified.store')); ?>" enctype="multipart/form-data">
                        <?php if(count($errors) > 0): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach($errors->all() as $error): ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php echo $__env->make('front::classified.partials.form', ['button' => 'Tạo mới'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make($package_name .'::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>