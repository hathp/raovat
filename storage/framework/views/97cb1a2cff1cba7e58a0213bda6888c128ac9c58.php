<?php $__env->startSection('extends'); ?>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#content" data-toggle="tab"> Nội dung </a>
        </li>
        <li>
            <a href="#meta" data-toggle="tab"> Thẻ Meta </a>
        </li>
        <li>
            <a href="#gallery" data-toggle="tab"> Thư viện ảnh </a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('page::partials.portlet-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>