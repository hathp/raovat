<?php $__env->startSection('block'); ?>
	<?php echo $__env->make('front::layout.partials.body.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('front::layout.partials.body.main-boxes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<aside  class="span4 ">
	
    		<div class="box-style-1 ribbon borders">
            
            <div class="feat">
              <i class="icon-group icon-3x"></i>
       		  <h3>Giáo viên chuyên gia</h3>
              <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei. </p>
            </div>
            
            <hr class="double">
            
            <div class="feat">
              <i class="icon-film icon-3x"></i>
       		  <h3>Các khóa học video</h3>
              <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei. </p>
            </div>
            
            <hr class="double">
            
            <div class="feat">
              <i class="icon-book icon-3x"></i>
       		  <h3>Thư viện</h3>
              <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei. </p>
            </div>
            
            <hr class="double">
            
            <div class="feat last">
              <i class="icon-laptop icon-3x"></i>
       		  <h3>Các khóa học trực tuyến</h3>
              <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei. </p>
            </div>
            
            </div>
            <p><a  href="all-courses.html" title="All courses"><img src="<?php echo e(asset('assets/front/img/banner.jpg')); ?>" alt="Banner" class="img-rounded" ></a></p>
    </aside>

	<section class="span8">
		<div class="col-right">
			<h2>Khóa học mới</h2>
			<p>Những khóa học của chúng tôi đảm bảo cho bạn rằng, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei. Saepe tantas ocurreret duo ea, has facilisi vulputate an. Priaeque iuvaret nominati et, ad mea clita numquam. Maluisset dissentiunt et per, dico liber erroribus vis te. Dolor consul graecis nec ut, scripta eruditi scriptorem et nam.</p>
			<hr>
			<?php echo $__env->make('front::block.courses', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<p class="text-center"><a href="<?php echo e(route('front.courses.index')); ?>" class="button_large">Xem tất cả các khóa học </a></p>
			
		</div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>