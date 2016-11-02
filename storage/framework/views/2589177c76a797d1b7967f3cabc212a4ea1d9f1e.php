<?php foreach($banners as $banner): ?>
	<div class="add-banner">
		<img src="<?php echo e($banner->getLink(config('layout-image.image_layout.thumbnail.path'))); ?>" alt="<?php echo e($banner->name); ?>" style="width: 106px;"/>
		<div class="banner-desc">
			<h4><?php echo e($banner->name); ?></h4>
			<a href="<?php echo e($banner->link); ?>">Xem thêm</a>
		</div>
		<div class="clear"></div>
	</div>
<?php endforeach; ?>