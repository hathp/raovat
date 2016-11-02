<div class="content_top">
    <div class="wrap">
        <h3>Sản phẩm mới nhất</h3>
    </div>
    <div class="line"> </div>
    <div class="wrap">
        <div class="ocarousel_slider">
            <div class="ocarousel example_photos" data-ocarousel-perscroll="3">
                <div class="ocarousel_window">
                    <?php foreach($newProduct as $product): ?>
                    <a href="<?php echo e($product->getViewLink()); ?>" title="<?php echo e($product->title); ?>"> <img src="<?php echo e($product->getCoverImage()); ?>" alt="" /><p><?php echo e($product->title); ?></p></a>
                    <?php endforeach; ?>
                </div>
                   <span>
                    <a href="#" data-ocarousel-link="left" style="float: left;" class="prev"> </a>
                    <a href="#" data-ocarousel-link="right" style="float: right;" class="next"> </a>
                   </span>
            </div>
        </div>
    </div>
</div>