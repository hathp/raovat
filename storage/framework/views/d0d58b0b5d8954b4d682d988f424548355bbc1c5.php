<div class="item item-carousel">
    <div class="products">
        <div class="product">
            <div class="product-image">
                <div class="image">
                    <a href="<?php echo e($item->getViewLink()); ?>"><img  src="<?php echo e($item->getCoverImage()); ?>" data-echo="<?php echo e($item->getCoverImage()); ?>" alt=""></a>
                </div><!-- /.image -->
                <div class="tag new"><span>new</span></div>
            </div><!-- /.product-image -->
            <div class="product-info text-left">
                <h3 class="name"><a href="<?php echo e($item->getViewLink()); ?>"><?php echo e($item->title); ?></a></h3>
                <div class="rating rateit-small"></div>
                <div class="description"></div>
                <div class="product-price">
                    <span class="price"><?php echo e(number_format($item->price_new)); ?> vnđ</span>
                    <?php if( $item->price_old > 0 ): ?>
                        <span class="price-before-discount"><?php echo e(number_format($item->price_old)); ?> vnđ</span>
                    <?php endif; ?>
                </div><!-- /.product-price -->
            </div><!-- /.product-info -->
        </div><!-- /.product -->
    </div><!-- /.products -->
</div><!-- /.item -->