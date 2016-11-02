

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
                <div class="upload-classified">
                    <h3>Đăng ký thành viên</h3>
                    <form method="post" action="<?php echo e(route('front.auth.register')); ?>" enctype="multipart/form-data">
                        <?php echo $__env->make('front::auth.partials.form', ['button' => 'Đăng ký'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="/assets/front/plugins/bootstrap-fileinput/js/fileinput.min.js"></script>
    <script>
        $("#avatar").fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="/assets/front/images/default-user.png" alt="Your Avatar" style="width:160px">',
            layoutTemplates: {main2: '{preview} {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>