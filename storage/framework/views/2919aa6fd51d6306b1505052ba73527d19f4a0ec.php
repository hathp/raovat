<?php $__env->startSection('sidebar'); ?>
	<!-- ================================== TOP NAVIGATION ================================== -->
	<?php echo $__env->make('front::block.side-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!-- ================================== TOP NAVIGATION : END ================================== -->
	<!-- ============================================== SPECIAL OFFER ============================================== -->
	<?php echo $__env->make('front::block.special-offer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!-- ============================================== SPECIAL OFFER : END ============================================== -->
	<!-- ============================================== PRODUCT TAGS ============================================== -->
	<?php echo $__env->make('front::block.product-tag', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!-- ============================================== PRODUCT TAGS : END ============================================== -->
	<!-- ============================================== SPECIAL DEALS ============================================== -->
	<?php echo $__env->make('front::block.special-deals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!-- ============================================== SPECIAL DEALS : END ============================================== -->
	<!-- ============================================== NEWSLETTER ============================================== -->
	<?php echo $__env->make('front::block.newsletter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!-- ============================================== NEWSLETTER: END ============================================== -->
	<!-- ============================================== HOT DEALS ============================================== -->
	<?php echo $__env->make('front::block.hot-deals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!-- ============================================== HOT DEALS: END ============================================== -->
	<!-- ============================================== COLOR============================================== -->
	<?php echo $__env->make('front::block.advertisement', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!-- ============================================== COLOR: END ============================================== -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('front::home.partials.slide-main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>			
<!-- ========================================= SECTION â€“ HERO : END ========================================= -->	

<!-- ============================================== INFO BOXES ============================================== -->
<div class="info-boxes wow fadeInUp">
	<div class="info-boxes-inner">
		<div class="row">
			<div class="col-md-6 col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						<div class="col-xs-2">
						     <i class="icon fa fa-dollar"></i>
						</div>
						<div class="col-xs-10">
							<h4 class="info-box-heading green">money back</h4>
						</div>
					</div>	
					<h6 class="text">30 Day Money Back Guarantee.</h6>
				</div>
			</div><!-- .col -->

			<div class="hidden-md col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						<div class="col-xs-2">
							<i class="icon fa fa-truck"></i>
						</div>
						<div class="col-xs-10">
							<h4 class="info-box-heading orange">free shipping</h4>
						</div>
					</div>
					<h6 class="text">free ship-on oder over $600.00</h6>	
				</div>
			</div><!-- .col -->

			<div class="col-md-6 col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						<div class="col-xs-2">
							<i class="icon fa fa-gift"></i>
						</div>
						<div class="col-xs-10">
							<h4 class="info-box-heading red">Special Sale</h4>
						</div>
					</div>
					<h6 class="text">All items-sale up to 20% off </h6>	
				</div>
			</div><!-- .col -->
		</div><!-- /.row -->
	</div><!-- /.info-boxes-inner -->
	
</div><!-- /.info-boxes -->
<!-- ============================================== INFO BOXES : END ============================================== -->
			<!-- ============================================== SCROLL TABS ============================================== -->
<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">

	<div class="more-info-tab clearfix ">
	   <h3 class="new-product-title pull-left">SẢN PHẨM MỚI NHẤT</h3>
		<ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
			<li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
			<?php foreach($productCategoryNews as $productCategoryNew): ?>
			<li><a data-transition-type="backSlide" href="#<?php echo e($productCategoryNew->slug); ?>" data-toggle="tab"><?php echo e($productCategoryNew->name); ?></a></li>
			<?php endforeach; ?>
		</ul><!-- /.nav-tabs -->
	</div>

	<div class="tab-content outer-top-xs">

		<div class="tab-pane in active" id="all">			
			<div class="product-slider">
				<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
					<?php foreach($productNews as $item): ?>
						<?php echo $__env->make('front::product.partials.item-product', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php endforeach; ?>
				</div><!-- /.home-owl-carousel -->
			</div><!-- /.product-slider -->
		</div><!-- /.tab-pane -->

		<?php foreach($productCategoryNews as $productCategoryNew): ?>
			<div class="tab-pane" id="<?php echo e($productCategoryNew->slug); ?>">
				<div class="product-slider">
					<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
						 <?php foreach($productCategoryNew->listProduct as $item): ?>
								<?php echo $__env->make('front::product.partials.item-product', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						 <?php endforeach; ?>
					 </div><!-- /.home-owl-carousel -->
				</div><!-- /.product-slider -->
			</div><!-- /.tab-pane -->
		<?php endforeach; ?>

	</div><!-- /.tab-content -->
</div><!-- /.scroll-tabs -->
<!-- ============================================== SCROLL TABS : END ============================================== -->
			<!-- ============================================== WIDE PRODUCTS ============================================== -->
<div class="wide-banners wow fadeInUp outer-bottom-vs">
	<div class="row">

		<div class="col-md-7">
			<div class="wide-banner cnt-strip">
				<div class="image">
					<img class="img-responsive" data-echo="<?php echo e(asset('assets/front/assets/images/banners/1.jpg')); ?>" src="<?php echo e(asset('assets/front/assets/images/blank.gif')); ?>" alt="">
				</div>	
				<div class="strip">
					<div class="strip-inner">
						<h3 class="hidden-xs">samsung</h3>
						<h2>galaxy</h2>
					</div>	
				</div>
			</div><!-- /.wide-banner -->
		</div><!-- /.col -->

		<div class="col-md-5">
			<div class="wide-banner cnt-strip">
				<div class="image">
					<img class="img-responsive" data-echo="<?php echo e(asset('assets/front/assets/images/banners/2.jpg')); ?>" src="<?php echo e(asset('assets/front/assets/images/blank.gif')); ?>" alt="">
				</div>	
				<div class="strip">
					<div class="strip-inner">
						<h3 class="hidden-xs">new trend</h3>
						<h2>watch phone</h2>
					</div>	
				</div>
			</div><!-- /.wide-banner -->
		</div><!-- /.col -->

	</div><!-- /.row -->
</div><!-- /.wide-banners -->

<!-- ============================================== WIDE PRODUCTS : END ============================================== -->
			<!-- ============================================== FEATURED PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">Featured products</h3>
	<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
		<?php foreach($productFeatured as $item): ?>
			<?php echo $__env->make('front::product.partials.item-product', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php endforeach; ?>
	</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
			<!-- ============================================== WIDE PRODUCTS ============================================== -->
<div class="wide-banners wow fadeInUp outer-bottom-vs">
	<div class="row">

		<div class="col-md-12">
			<div class="wide-banner cnt-strip">
				<div class="image">
					<img class="img-responsive" data-echo="<?php echo e(asset('assets/front/assets/images/banners/3.jpg')); ?>" src="<?php echo e(asset('assets/front/assets/images/blank.gif')); ?>" alt="">
				</div>	
				<div class="strip strip-text">
					<div class="strip-inner">
						<h2 class="text-right">one stop place for<br>
						<span class="shopping-needs">all your shopping needs</span></h2>
					</div>	
				</div>
				<div class="new-label">
				    <div class="text">NEW</div>
				</div><!-- /.new-label -->
			</div><!-- /.wide-banner -->
		</div><!-- /.col -->

	</div><!-- /.row -->
</div><!-- /.wide-banners -->
<!-- ============================================== WIDE PRODUCTS : END ============================================== -->
			<!-- ============================================== BEST SELLER ============================================== -->

<div class="sidebar-widget wow fadeInUp outer-bottom-vs">
	<h3 class="section-title">Best seller</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
			<?php foreach($productFeatured as $item): ?>
				<div class="item">
					<div class="products best-product">
						<?php echo $__env->make('front::product.partials.item-product-small', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</div>
				</div>
			<?php endforeach; ?>	
	    </div>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== BEST SELLER : END ============================================== -->	

			<!-- ============================================== BLOG SLIDER ============================================== -->
<section class="section outer-bottom-vs wow fadeInUp">
	<h3 class="section-title">latest form blog</h3>
	<div class="blog-slider-container outer-top-xs">
		<div class="owl-carousel blog-slider custom-carousel">
				<?php foreach($blogs as $item): ?>
					<?php echo $__env->make('front::page.partials.item-page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; ?>
		</div><!-- /.owl-carousel -->
	</div><!-- /.blog-slider-container -->
</section><!-- /.section -->
<!-- ============================================== BLOG SLIDER : END ============================================== -->	

			<!-- ============================================== FEATURED PRODUCTS ============================================== -->
<section class="section wow fadeInUp">
	<h3 class="section-title">New Arrivals</h3>
	<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
		<?php foreach($productArrivals as $item): ?>
			<?php echo $__env->make('front::product.partials.item-product', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php endforeach; ?>
	</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>