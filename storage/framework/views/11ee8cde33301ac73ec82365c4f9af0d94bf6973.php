<?php $__env->startSection('extends'); ?>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#content" data-toggle="tab"> Thông tin </a>
        </li>
        <li>
            <a href="#meta" data-toggle="tab"> Thẻ Meta </a>
        </li>

    </ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('member::partials.portlet-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>