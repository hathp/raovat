<div class="sidebar-widget outer-bottom-small wow fadeInUp">
	<h3 class="section-title">Special Offer</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
			<?php $productSpecialOffer1 = $productSpecialOffer->splice(3) ?>
			<div class="item">
				<div class="products special-product">
					<?php foreach($productSpecialOffer as $item): ?>
						<?php echo $__env->make('front::product.partials.item-product-small', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php endforeach; ?>
				</div>
			</div>
			<?php if(isset($productSpecialOffer1)): ?>
				<div class="item">
					<div class="products special-product">
						<?php foreach($productSpecialOffer1 as $item): ?>
							<?php echo $__env->make('front::product.partials.item-product-small', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->