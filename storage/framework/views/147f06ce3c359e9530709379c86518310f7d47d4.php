<div class="sidebar-widget hot-deals wow fadeInUp">
	<h3 class="section-title">hot deals</h3>
	<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">
		<?php foreach( $productHots as $item ): ?>
			<div class="item">
				<div class="products">
					<div class="hot-deal-wrapper">
						<div class="image">
							<img src="<?php echo e($item->getCoverImageMedium()); ?>" alt="<?php echo e($item->title); ?>">
						</div>
						<?php if($item->price_old > $item->price_new): ?>
							<div class="sale-offer-tag"><span><?php echo e($item->off); ?>%<br>off</span></div>
						<?php endif; ?>
					</div><!-- /.hot-deal-wrapper -->
					<div class="product-info text-left m-t-20">
						<h3 class="name"><a href="<?php echo e($item->getViewLink()); ?>"><?php echo e($item->title); ?></a></h3>
						<div class="rating rateit-small"></div>
						<div class="product-price">
							<span class="price">
								<?php echo e(number_format($item->price_new)); ?>

							</span>
							<?php if($item->price_old > $item->price_new): ?>
								<span class="price-before-discount"><?php echo e(number_format($item->price_old)); ?></span>
							<?php endif; ?>
						</div><!-- /.product-price -->
					</div><!-- /.product-info -->
				</div>
			</div>
		<?php endforeach; ?>
    </div><!-- /.sidebar-widget -->
</div>