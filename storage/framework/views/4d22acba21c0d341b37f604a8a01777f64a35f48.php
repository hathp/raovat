<?php if($action_method_name == 'show'): ?>
    <a href="<?php echo e(route($prefix_route_name . 'edit')); ?>" type="button" class="btn default">Chỉnh sửa</a>
<?php else: ?>
    <button type="submit" class="btn blue">OK</button>
<?php endif; ?>

<a href="<?php echo e(route($prefix_route_name . 'index')); ?>" type="button" class="btn default">Hủy bỏ</a>