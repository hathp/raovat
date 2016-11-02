<div class="content_top">
	<div class="wrap">
	   <h3>Sản phẩm nổi bật</h3>
	</div>
	<div class="line"> </div>
	<div class="wrap">
	 <div class="ocarousel_slider">  
		<div class="ocarousel example_photos" data-ocarousel-perscroll="3">
			<div class="ocarousel_window">
				<?php foreach($product_prominents as $product_pro): ?>
			   		<a href="<?php echo e($product_pro->getViewLink()); ?>" title="<?php echo e($product_pro->title); ?>"> <img src="<?php echo e($product_pro->getCoverImage()); ?>" alt="<?php echo e($product_pro->title); ?>" /><p><?php echo e($product_pro->title); ?></p></a>
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