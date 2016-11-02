<div class="l-1a">
	<iframe width="88%" height="195" style="   position: absolute;    top: -47px;    margin-left: 6%;"src="https://www.youtube.com/embed/bGya88djT_U" frameborder="0" allowfullscreen></iframe>
</div>

<div class="l-1b"></div>

<?php /*<div class="l-2a"></div>*/ ?>

<?php /*<div class="l-2b">*/ ?>
	<?php /*<ul>*/ ?>
		<?php /*<li>*/ ?>
			<?php /*<a href="#"><img src="images/Chart.png"> Bi?u d? tang tru?ng</a>*/ ?>
		<?php /*</li>*/ ?>
		<?php /*<li>*/ ?>
			<?php /*<a href="#"><img src="images/Camera_Small.png"> Xem camera</a></li>*/ ?>
		<?php /*<li>*/ ?>
			<?php /*<a href="#"><img src="images/infochil.png"> Thông tin c?a bé</a>*/ ?>
		<?php /*</li>*/ ?>
		<?php /*<li>*/ ?>
			<?php /*<a href="#"><img src="images/Icon_Login.png"> Ðang nh?p</a>*/ ?>
		<?php /*</li>*/ ?>
	<?php /*</ul>*/ ?>
<?php /*</div>*/ ?>

<div class="l-3a"></div>

<div class="l-3b">
	<ul>
		<?php foreach($menu_categories as $menu): ?>
			<li>
				<a href="<?php echo e($menu->getViewLink()); ?>"><img src="<?php echo e(asset('assets/front/images/icon_news_1.png')); ?>"> <?php echo e($menu->name); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>

<?php echo $__env->make('front::block.child-about', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php /*<a href="video.html"> <img src="images/haiphuong_entertaiment.jpg" width="250px" style="margin-bottom: 10px;"></a>*/ ?>
<?php /*<a href="video.html"> <img src="images/haiphuong_picture.jpg" width="250px" style="margin-bottom: 10px;"></a>*/ ?>
<?php /*<a href="video.html"> <img src="images/haiphuong_video.jpg" width="250px" style="margin-bottom: 10px;"></a>*/ ?>

<div class="l-5a"></div>

<div class="l-5b">
	<ul>
		<li>Khách đang online: <label>936</label></li>
		<li>Tổng số truy cập: <label>10717744</label></li>
	</ul>
</div>