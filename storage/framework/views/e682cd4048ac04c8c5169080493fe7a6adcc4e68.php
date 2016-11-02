<div class="rightsidebar span_3_of_1 sidebar">
    <h3>Sản phẩm nổi bật</h3>
    <ul class="popular-products">
        <?php foreach($popularProduct as $product): ?>
            <li>
                <h4><a href="<?php echo e($product->getViewLink()); ?>"><?php echo e($product->title); ?></a></h4>
                <a href="<?php echo e($product->getViewLink()); ?>"><img src="<?php echo e($product->getCoverImage()); ?>" alt="<?php echo e($product->title); ?>" /></a>
                <div class="price-details">
                    <div class="price-number">
                        <p>
                            <?php if($product->price_old > 0 ): ?>
                                <span class="rupees line-through"><?php echo e(number_format($product->price_old)); ?>Đ </span> &nbsp;
                            <?php endif; ?>
                            <span class="rupees">
                                <?php if($product->price_new != 0 ): ?>
                                    <?php echo e(number_format($product->price_new)); ?> vnđ
                                <?php else: ?>
                                    Liên hệ
                                <?php endif; ?>
                            </span>
                        </p>
                        <div class="add-cart">
                    </div>
                        <h4><a href="<?php echo e($product->getViewLink()); ?>">Xem ngay</a></h4>
                    </div>
                    <div class="clear"></div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>