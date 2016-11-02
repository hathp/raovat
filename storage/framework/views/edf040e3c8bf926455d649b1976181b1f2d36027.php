<?php $__env->startSection('extends'); ?>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#content" data-toggle="tab"> Nội dung </a>
        </li>

    </ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('product::partials.portlet-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>