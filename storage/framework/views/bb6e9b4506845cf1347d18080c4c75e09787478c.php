<?php $__env->startSection('content'); ?>
    <div class="r-1">
        <?php $i = 1; ?>
        <?php foreach($categories as $category): ?>
            <div class="title-dt" <?php echo ($i == 1) ? '' : 'style="position: relative;border-bottom: 2px dotted;top: 0;"'; ?>>
                <img src="<?php echo e(asset('assets/front/images/icon_news_1.png')); ?>">  <?php echo e($category->name); ?>

                <a href="<?php echo e($category->getViewLink()); ?>" class="read-more">xem tất cả...</a>
            </div>
            <div class="dt-cont">
                <ul>
                    <?php foreach($category->pages as $item): ?>
                        <?php echo $__env->make('front::block.item-article', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; ?>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <?php $i ++ ; ?>
        <?php endforeach; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>