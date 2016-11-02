<?php $__env->startSection('extends'); ?>
    <ul class="nav nav-tabs">
        <?php for($i = 0; $i < count($setting_groups); $i++): ?>
            <li <?php if($i == 0): ?> class="active" <?php endif; ?>>
                <a href="#<?php echo e($setting_groups[$i]->slug); ?>" data-toggle="tab"> <?php echo e($setting_groups[$i]->name); ?> </a>
            </li>
        <?php endfor; ?>
    </ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.partials.portlet-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>