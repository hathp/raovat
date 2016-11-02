<div>
	<div id="option_content" >
		<div class="row ">
			<div class="col-md-12">
				<div class="portlet-body">
					<?php foreach($product_option as $option): ?>
						<h4><?php echo e($option->name); ?></h4>
						<div class="form-horizontal">
							<?php foreach($option->option as $value): ?>
								<?php $_param = 'option_'.$value->id; ?>
								<div class="form-group">
									<label  class="col-md-2 control-label"><?php echo e($value->name); ?></label>
									<div class="col-md-4">
										<input type="text" class="form-control"  name="<?php echo e($_param); ?>" value="<?php echo e((isset($value->value)) ? $value->value : ''); ?>"> </div>
								</div>
							<?php endforeach; ?>
						</div>
						<hr>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>