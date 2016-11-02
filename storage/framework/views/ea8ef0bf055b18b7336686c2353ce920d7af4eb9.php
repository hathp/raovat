
<ul class="navbr">
	<li ><a href="<?php echo e(route('front.home')); ?>"><img src="<?php echo e($logo->getLink(config('layout-image.image_layout.thumbnail.path'))); ?>" width="150" alt="<?php echo e($logo->name); ?>" title="<?php echo e($logo->name); ?>" style="    margin: 15px;"></a></li>
	<li class="mtc"> <a href="<?php echo e(route('front.home')); ?>"> </a></li>
	<li class="mgt"> <a href="<?php echo e(route('front.page.about')); ?>"> </a></li>
	<li class="mcm"><a href="<?php echo e(route('front.parent.index')); ?>"> </a></li>
	<li class="mcb"><a href="<?php echo e(route('front.child.index')); ?>"> </a></li>
	<li class="mlh"><a href="<?php echo e(route('front.contact.index')); ?>"> </a></li>
	<li class="m-sun"><img src="<?php echo e(asset('assets/front/images/sun.gif')); ?>" width="150" alt="mầm non mặt trời" title="mầm non mặt trời"></li>
</ul>