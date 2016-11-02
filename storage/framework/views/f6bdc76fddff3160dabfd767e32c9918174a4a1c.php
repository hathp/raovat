<div class="footer">
  <div class="wrap">	
		 <div class="copy_right">
		 	<h2> <?php echo e($setting->getValueItem(3)); ?></h2>
		 	<p>Adress: <?php echo e($setting->getValueItem(6)); ?></p>
		 	<p>Hotline:  <?php echo e($setting->getValueItem(8)); ?> - email:  <?php echo e($setting->getValueItem(9)); ?></p>
	   </div>	
	   <div class="footer-nav">
		<ul>
			<li><a href="<?php echo e(route('front.page.about')); ?>">Giới thiệu công ty</a> : </li>
			<li><a href="">Chính sách bảo mật</a> : </li>
			<li><a href="<?php echo e(route('front.contact.index')); ?>">Liên hệ</a></li>
		</ul>
		<ul>
			<li><a>Copy rights (c). All rights Reseverd | 2016</a></li> 
		</ul>
		<ul>
			<li><a href="http://hoster.vn/" target="_blank">Support by Hoster.vn</a></li>
		</ul>
	   </div>		
	</div>
</div>