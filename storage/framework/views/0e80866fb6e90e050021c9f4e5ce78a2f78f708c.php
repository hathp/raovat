   <!------------start Header ------------>
	<div class="header">
  	  		<div class="wrap">
				<div class="header_top">
					<div class="logo">
						<a href="/"><img src="<?php echo e($logo->getLink(config('layout-image.image_layout.thumbnail.path'))); ?>" alt="<?php echo e($logo->name); ?>" style="width: 130px;"/></a>
					</div>
						<div class="header_top_right">
							  <div class="search_box">
								  <form action="<?php echo e(route('front.product.search')); ?>">
					     				<input type="text" value="" placeholder="Tìm kiếm" name="s"><input type="submit" value="">
								  </form>
					     		<div class="clear"></div>
					     	</div>
					</div>
			     <div class="clear"></div>
  		    </div>     
  		    <div class="navigation">
  		    	<a class="toggleMenu" href="#">Menu</a>
					<ul class="nav">
						<li>
							<a href="<?php echo e(route('front.home')); ?>">Trang chủ</a>
						</li>
						<li  class="test">
							<a href="<?php echo e(route('front.page.about')); ?>">Giới thiệu</a>
						</li>
						<li>
							<a href="<?php echo e(route('front.product.index')); ?>">Sản phẩm</a>
							<?php echo $menuProduct; ?>

						</li>
						<li>
							<a href="<?php echo e(route('front.service.index')); ?>">Dịch vụ</a>
							<?php echo $menuService; ?>

						</li>
						<li>
							<a href="<?php echo e(route('front.article.index')); ?>">Tin Tức</a>
							<?php echo $menuArticle; ?>

						</li>
						<li>
							<a href="<?php echo e(route('front.contact.index')); ?>">Liên hệ</a>
						</li>
					</ul>
  		    </div>




			<?php if(isset($slides)): ?>
			<div class="ocarousel ocarousel-slider" data-ocarousel-perscroll="1" data-ocarousel-period="6000">
                <div class="ocarousel_window">

					<?php foreach($slides as $slide): ?>
						<a href="<?php echo e($slide->link); ?>" title="<?php echo e($slide->name); ?>">
							<img width="100%" src="<?php echo e($slide->getLink(config('layout-image.image_layout.default.path'))); ?>" alt="<?php echo e($slide->name); ?>" />
							<div class="slider-text">
								<h2><?php echo e($slide->name); ?></h2>
							</div>
						</a>
					<?php endforeach; ?>

                </div>
               	<span>
                	<a href="#" data-ocarousel-link="left" style="float: left;" class="prev"> </a>
                	<a href="#" data-ocarousel-link="right" style="float: right;" class="next"> </a>
               	</span>
		   	</div>
			<?php endif; ?>

   		</div>

   </div>
   <!------------End Header ------------>