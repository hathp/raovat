<?php $__env->startSection('content'); ?>
    <div class="r-1">
        <div class="title-dt">
            <img src="<?php echo e(asset('assets/front/images/icon_news_1.png')); ?>"> <?php echo e($page->title); ?>

        </div>
        <div class="dt-cont">
            <strong class="text-center">
                <h4> <?php echo e($page->title); ?> </h4>
            </strong>
            <p>
                <?php echo e($page->brief); ?>

            </p>
            <?php if(!empty($page->link)): ?>
                <iframe width="100%" height="450" src="https://www.youtube.com/embed/<?php echo e($page->link); ?>" frameborder="0" allowfullscreen></iframe>
            <?php else: ?>
                <img alt="<?php echo e($page->title); ?>" src="<?php echo e($page->getCoverImageLarge()); ?>" style="width: 575px;">
            <?php endif; ?>


            <p>
                <?php echo $page->content; ?>

            </p>
        </div>
        <div class="clearfix"></div>
        <div class="news-related">
            <h5 class="title">CÁC TIN TỨC KHÁC</h5>
        </div>
        <div class="dt-cont video-cont">
            <ul>
                <?php foreach($list_page as $item): ?>
                    <?php echo $__env->make('front::block.item-page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endforeach; ?>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>