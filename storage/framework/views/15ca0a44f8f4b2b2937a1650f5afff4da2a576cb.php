<div id="hero">
	<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
		<?php foreach($slideMains->images()->get() as $slide): ?>
			<div class="item" style="background-image: url(<?php echo e($slide->getCoverImage()); ?>);">
				<div class="container-fluid">
					<div class="caption bg-color vertical-center text-left">
						<div class="big-text fadeInDown-1">
							<?php echo e($slide->name); ?>

						</div>
						<div class="excerpt fadeInDown-2 hidden-xs">
						<?php /*<span>21.5-Inch Now Starting At $1099 </span>*/ ?>
						<?php /*<span>27-Inch Starting At $1799</span>*/ ?>
						</div>
						<div class="button-holder fadeInDown-3">
							<a href="<?php echo e($slide->link); ?>" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
						</div>
					</div><!-- /.caption -->
				</div><!-- /.container-fluid -->
			</div><!-- /.item -->
		<?php endforeach; ?>
	</div><!-- /.owl-carousel -->
</div>