

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="/assets/front/plugins/bootstrap-fileinput/css/fileinput.min.css">
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
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-md-offset-3">
                        <div class="change-password">
                            <h3>Thay đổi mật khẩu</h3>
                            <form method="post" action="<?php echo e(route('front.user.password.update')); ?>" enctype="multipart/form-data">
                                <?php echo method_field('put'); ?>

                                <?php echo csrf_field(); ?>


                                <div class="form-group">
                                    <label for="password">Mật khẩu cũ</label>
                                    <input class="form-control" type="password" name="old_password" required/>
                                </div>

                                <div class="form-group">
                                    <label for="password">Mật khẩu</label>
                                    <input class="form-control" type="password" name="password" required />
                                </div>

                                <div class="form-group">
                                    <label for="password-confirmation">Xác nhận mật khẩu</label>
                                    <input class="form-control" type="password" name="password_confirmation" required/>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>