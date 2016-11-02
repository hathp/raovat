<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-6">
            <div class="portlet box green-meadow">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-gift"></i>Người mua hàng <?php echo e(empty($order->receiver_name) ? 'và mua hàng' : ''); ?></div>
                </div>
                <div class="portlet-body">
                    <p>Họ tên: <?php echo e($order->order_name); ?></p>
                    <p>Địa chỉ: <?php echo e($order->order_address); ?></p>
                    <p>SĐT: <?php echo e($order->order_mobile); ?></p>
                    <p>Email: <?php echo e($order->order_email); ?></p>
                </div>
            </div>
        </div>
        <?php if ( ! (empty($order->receiver_name))): ?>
        <div class="col-xs-6">
            <div class="portlet box green-meadow">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-gift"></i>Người nhận hàng </div>
                </div>
                <div class="portlet-body">
                    <p>Họ tên: <?php echo e($order->receiver_name); ?></p>
                    <p>Địa chỉ: <?php echo e($order->receiver_address); ?></p>
                    <p>SĐT: <?php echo e($order->receiver_mobile); ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet box green-meadow">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-gift"></i>Thông tin đơn hàng </div>
                </div>
                <div class="portlet-body">
                    <div>
                        <p>Thanh toán: <?php echo e($order->is_pay == 1 ? 'Đã thanh toán' : 'Chưa thanh toán'); ?></p>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Giá</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($order_details as $order_detail): ?>
                            <tr>
                                <td><?php echo e($order_detail->classifieds->name); ?></td>
                                <td><?php echo e($order_detail->quantity); ?></td>
                                <td><?php echo e(number_format($order_detail->price)); ?></td>
                                <td><?php echo e(number_format($order_detail->quantity * $order_detail->price)); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3"></td>
                            <td><p style="font-weight: bold;">Tổng tiền: <span style="color: red"><?php echo e(number_format($order->totalPrice())); ?></span></p></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>