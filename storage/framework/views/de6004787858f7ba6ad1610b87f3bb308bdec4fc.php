<?php foreach($category as $value): ?>
    <h3><?php echo e($value->name); ?></h3>
    <div class="section group">
        <?php foreach($value->products as $item): ?>
            <?php echo $__env->make('front::block.product-item', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>

