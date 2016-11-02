<?php $__env->startSection('extends'); ?>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#user-info" data-toggle="tab">Thông tin tài khoản</a>
        </li>
        <?php if(isset($user)): ?>
        <li>
            <a href="#change-password" data-toggle="tab">Thay đổi mật khẩu</a>
        </li>
        <?php endif; ?>
    </ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.partials.portlet-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>