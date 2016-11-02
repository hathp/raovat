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

            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <h3>Tin rao vặt của bạn</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>STT</td>
                        <th>Mã tin</th>
                        <th>Tiêu đề</th>
                        <th>Thời gian</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php for($i = 0; $i < count($classifieds); $i++): ?>
                        <tr>
                            <td><?php echo e($i + 1); ?></td>
                            <td><?php echo e($classifieds[$i]->code); ?></td>
                            <td><a href="<?php echo e(route('front.classified.show', $classifieds[$i]->slug)); ?>"><?php echo e($classifieds[$i]->name); ?></a> </td>
                            <td><?php echo with($classifieds[$i]->created_at)->format('d/m/Y H:i'); ?></td>
                            <td>
                                <a href="<?php echo e(route('front.user.classified.edit', $classifieds[$i]->slug)); ?>" class="btn btn-primary btn-xs" >Sửa</a>
                                <a href="javascript:;" class="btn btn-danger btn-xs delete" data-toggle="confirmation" data-title="Bạn có muốn xóa ?" data-url="<?php echo e(route('front.user.classified.destroy', $classifieds[$i]->id)); ?>">Xóa</a>
                            </td>
                        </tr>
                    <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>