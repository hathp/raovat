<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                <?php echo $__env->make('admin.user.partials.portlet-button-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="portlet-body">
                    <?php echo $__env->make('admin.partials.portlet-toolbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable"  data-delete-link="<?php echo e(route('admin.cart.order.destroy')); ?>" data-toggle-link="<?php echo e(route('admin.cart.order.toggle')); ?>">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                                <th>Họ tên</th>
                                <th>SĐT</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Thanh toán</th>
                                <th>Thời gian</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($order as $order ): ?>
                            <tr class="odd gradeX">
                                <td><input type="checkbox" name="id[]" class="checkboxes" value="<?php echo e($order->id); ?>" /> </td>
                                <td><a href="<?php echo e(route('admin.cart.order.show', $order->id)); ?>"><?php echo e($order->order_name); ?></a></td>
                                <td><?php echo e($order->order_mobile); ?></td>
                                <td><?php echo e($order->order_email); ?></td>
                                <td><?php echo e($order->order_address); ?></td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="is_pay" ><i class="fa <?php echo e($order->is_pay == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
                                <td><?php echo with($order->created_at)->format('d/m/Y H:i'); ?></td>
                                <td align="center">
<?php /*                                    <?php echo ViewHelper::button('Sửa ', route('admin.cart.order.edit', $order->id), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']); ?>*/ ?>
                                    <?php echo ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']); ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>