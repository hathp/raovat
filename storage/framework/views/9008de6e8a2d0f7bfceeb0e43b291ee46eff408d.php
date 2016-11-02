<div class="product">
    <div class="product-micro">
        <div class="row product-micro-row">
            <div class="col col-xs-5">
                <div class="product-image">
                    <div class="image">
                        <a href="<?php echo e($item->getCoverImageSmall()); ?>" data-lightbox="image-1" data-title="Nunc ullamcors">
                            <img data-echo="<?php echo e($item->getCoverImageSmall()); ?>" src="<?php echo e($item->getCoverImageSmall()); ?>" alt="<?php echo e($item->title); ?>">
                            <div class="zoom-overlay"></div>
                        </a>
                    </div><!-- /.image -->
                    <div class="tag tag-micro new">
                        <span>new</span>
                    </div>
                </div><!-- /.product-image -->
            </div><!-- /.col -->
            <div class="col col-xs-7">
                <div class="product-info">
                    <h3 class="name"><a href="<?php echo e($item->getViewLink()); ?>"><?php echo e($item->title); ?></a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="product-price">
				        <span class="price"><?php echo e(number_format($item->price_new)); ?></span>
                    </div><!-- /.product-price -->
                </div>
            </div><!-- /.col -->
        </div><!-- /.product-micro-row -->
    </div><!-- /.product-micro -->
</div>