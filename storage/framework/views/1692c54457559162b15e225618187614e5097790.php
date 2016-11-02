<?php $__env->startSection('content'); ?>
	<div class="r-1">
		<?php $notify_first = $notifys->shift(); ?>
		<img src="<?php echo e($notify_first->getCoverImage()); ?>" class="img-r1">
		<div class="title-r1">
			<a href="<?php echo e($notify_first->getViewLink()); ?>"><?php echo e($notify_first->title); ?></a><br>
			 <span>
            	<?php echo e($notify_first->brief); ?>

        	 </span>
		</div>

		<div class="clearfix"></div>
		<div class="list_item_news">
			<ul>
				<?php if(!empty($notifys)): ?>
					<?php foreach($notifys as $notify): ?>
					<li><a href="<?php echo e($notify->getViewLink()); ?>"><?php echo e($notify->title); ?></a></li>
					<?php endforeach; ?>
				<?php endif; ?>
			</ul>
		<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>
	</div> 

	<div class="r-2a"></div>

	<div class="r-2b">
		<div class="tab-content">
			<ul>
				<?php foreach($birthdays as $item): ?>
					<?php echo $__env->make('front::block.item-article', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; ?>
			</ul>
		  </div>
			<div class="clearfix"></div>
	</div>
	<!--  -->
	<div class="r-3">

	<!-- Nav tabs -->
	<ul class="nav " role="tablist">
	<li role="presentation"  class="active"><a href="#home" aria-controls="home" role="tab" style=" position: relative;  z-index: 99;" data-toggle="tab">Dành cho cha mẹ</a></li>
	<li role="presentation" ><a href="#profile" aria-controls="profile" role="tab" style="position: relative;  z-index: 9; margin-left:-38px" data-toggle="tab">Dành cho bé</a></li>

	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="home">
			<ul>
				<?php foreach($parents as $item): ?>
					<?php echo $__env->make('front::block.item-article', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; ?>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div role="tabpanel" class="tab-pane" id="profile">
			 <ul>
			  <?php foreach($articles as $item): ?>
				  <?php echo $__env->make('front::block.item-article', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			  <?php endforeach; ?>
			</ul>
			<div class="clearfix"></div>
		</div>
	</div>

	</div>

	<!--  -->

	<div class="r-5a"> 
	</div>

	<div class="r-5b">
	<ul>
		<?php foreach($questions as $item): ?>
			<?php echo $__env->make('front::block.item-news', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php endforeach; ?>
	</ul>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>