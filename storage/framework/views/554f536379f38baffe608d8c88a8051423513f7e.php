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
            <form method="post" action="<?php echo e(route('front.cart.payment')); ?>">
                <?php echo csrf_field(); ?>

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <h4>Thông tin người đặt hàng</h4>
                    <table>
                        <tr>
                            <td>Họ tên:</td>
                            <td><input type="text" name="order_name" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ:</td>
                            <td><input type="text" name="order_address" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td>Điện thoại:</td>
                            <td><input type="text" name="order_mobile" class="form-control" `/></td>
                        </tr>
                    </table>

                    <h4>Thông tin người nhận hàng</h4>
                    <input type="checkbox" name="same_as_order" /> Như người đặt hàng
                    <table>
                        <tr>
                            <td>Họ tên:</td>
                            <td><input type="text" name="receiver_name" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ:</td>
                            <td><input type="text" name="receiver_address" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td>Điện thoại:</td>
                            <td><input type="text" name="receiver_mobile" class="form-control" `/></td>
                        </tr>
                    </table>

                    <button style="margin-top: 15px" type="submit" class="btn btn-primary">Gửi đơn hàng</button>
                </div>

            </form>

            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <h3>Giỏ hàng</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã tin</th>
                        <th>Tiêu đề</th>
                        <th>Số lượng</th>
                        <th>Giá tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php for($i = 0; $i < count($carts); $i++): ?>
                        <tr>
                            <td><?php echo e($i + 1); ?></td>
                            <td><?php echo e($carts[$i]->code); ?></td>
                            <td><a href="<?php echo e(route('front.classified.show', $carts[$i]->slug)); ?>"><?php echo e($carts[$i]->name); ?></a> </td>
                            <td><?php echo e($quantity[$carts[$i]->id]); ?></td>
                            <td><?php echo e(number_format($carts[$i]->getPrice($quantity[$carts[$i]->id]))); ?></td>
                        </tr>
                    <?php endfor; ?>
                    <tr>
                        <td colspan="6"><p style="font-size: 1.2em; text-align: right; padding-right: 215px">Tổng tiền: <span style="font-weight: bold; color: red"><?php echo e(number_format($total_price)); ?></span></p></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>