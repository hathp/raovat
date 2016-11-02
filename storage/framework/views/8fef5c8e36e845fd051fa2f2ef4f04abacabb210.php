<?php $__env->startSection('content-bottom'); ?>
    <div class="wrap">
        <div class="preview-page">
            <div class="section group">
                <div class="cont-desc span_1_of_2">
                    <?php echo $__env->make('front::block.backlink', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="product-details">
                        <div class="grid images_3_of_2">
                            <ul id="etalage">
                                <li>
                                    <img class="etalage_source_image" src="<?php echo e($page->getCoverImageLarge()); ?>" title="<?php echo e($page->title); ?>" />
                                </li>
                            </ul>
                        </div>
                        <div class="desc span_3_of_2">
                            <h2><?php echo e($page->title); ?></h2>
                            <p><?php echo e($page->brief); ?></p>
                            <p><?php echo $page->content; ?></p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <?php echo $__env->make('front::block.popular-product', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
    <?php echo $__env->make('front::block.new-product', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>