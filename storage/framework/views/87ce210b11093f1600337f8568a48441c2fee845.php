<?php $__env->startSection('extends'); ?>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#content" data-toggle="tab"> Nội dung </a>
        </li>
        <li>
            <a href="#option" data-toggle="tab"> Thuộc tính </a>
        </li>
        <li>
            <a href="#option_product" data-toggle="tab"> Tùy chọn</a>
        </li>
        <li>
            <a href="#gallery" data-toggle="tab"> Thư viện ảnh </a>
        </li>
        <li>
            <a href="#meta" data-toggle="tab"> Thẻ Meta </a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('product::partials.portlet-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>