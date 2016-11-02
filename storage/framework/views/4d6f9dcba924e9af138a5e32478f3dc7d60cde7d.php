<?php foreach($categories as $value): ?>
	<div class="categories">
	   <ul>
		      <h3><?php echo e($value->name); ?></h3>
		      <?php foreach($value->category as $category): ?>
			  	<li><a href="<?php echo e($category->getViewLink()); ?>"><?php echo e($category->name); ?></a></li>
			  <?php endforeach; ?>
		 </ul>
	</div>
<?php endforeach; ?>
