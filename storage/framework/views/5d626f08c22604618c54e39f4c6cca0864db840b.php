<div class="grid_1_of_4 images_1_of_4">
    <h4><a href="<?php echo e($item->getViewLink()); ?>"><?php echo e($item->title); ?> </a></h4>
    <a href="<?php echo e($item->getViewLink()); ?>"><img src="<?php echo e($item->getCoverImage()); ?>" alt="<?php echo e($item->title); ?>" /></a>
    <div class="price-details">
        <div class="price-number">
            <p><span class="rupees">
                    <?php if($item->price_new != 0 ): ?>
                        <?php echo e(number_format($item->price_new)); ?> vnđ
                    <?php else: ?>
                        Liên hệ
                    <?php endif; ?>
                </span>
            </p>
        </div>
        <div class="add-cart">
            <h4><a href="<?php echo e($item->getViewLink()); ?>"> View Detail </a></h4>
        </div>
        <div class="clear"></div>
    </div>
</div>