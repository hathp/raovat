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
                <h3>Giỏ hàng</h3>
                <form method="POST" action="<?php echo e(route('front.cart.update')); ?>">
                    <?php echo csrf_field(); ?>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã tin</th>
                            <th>Tiêu đề</th>
                            <th>Số lượng</th>
                            <th>Giá tiền</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php for($i = 0; $i < count($carts); $i++): ?>
                            <tr>
                                <td><?php echo e($i + 1); ?></td>
                                <td><?php echo e($carts[$i]->code); ?></td>
                                <td><a href="<?php echo e(route('front.classified.show', $carts[$i]->slug)); ?>"><?php echo e($carts[$i]->name); ?></a> </td>
                                <td><input name="quantity[<?php echo e($carts[$i]->id); ?>]" style="width:40px; height: 25px" value="<?php echo e($quantity[$carts[$i]->id]); ?>"/></td>
                                <td><?php echo e(number_format($carts[$i]->getPrice($quantity[$carts[$i]->id]))); ?></td>
                                <td>
                                    <a href="<?php echo e(route('front.cart.remove', $carts[$i]->id)); ?>" class="btn btn-danger btn-xs" > Xóa</a>
                                </td>
                            </tr>
                        <?php endfor; ?>
                        <tr>
                            <td colspan="6"><p style="font-size: 1.2em; text-align: right; padding-right: 215px">Tổng tiền: <span style="font-weight: bold; color: red"><?php echo e(number_format($total_price)); ?></span></p></td>
                        </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="<?php echo e(route('front.cart.payment')); ?>" class="btn btn-primary submit-to" >Thanh toán</a>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>