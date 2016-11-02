<div class="form-body edit">
		<div class="col-xs-6">
			<?php /* Category name */ ?>
			<?php echo FormHelper::text('Tên ngôn ngữ', 'name', null, ['input' => ['required']]); ?>

			<?php /* Category name */ ?>
			<?php echo FormHelper::text('Mã', 'code', null, ['input' => ['required']]); ?>

			<?php if($currency->id == $currency->getDefault()->id): ?>
				<?php echo FormHelper::text('Tỉ giá', 'value', null, ['input' => ['required','class'=>'mask-numeric','readonly']]); ?>

			<?php else: ?>
				<?php /* Category name */ ?>
				<?php echo FormHelper::text('Tỉ giá', 'value', null, ['input' => ['required','class'=>'mask-numeric']]); ?>

			<?php endif; ?>
			<?php /* Category name */ ?>
			<?php echo FormHelper::text('Thập phân', 'decimal', null, ['input' => ['required','class'=>'mask-numeric']]); ?>

		</div>
		<div class="col-xs-6">
			<?php /* Category name */ ?>
			<?php echo FormHelper::text('Kí tự trái', 'symbol_left'); ?>

			<?php /* Category name */ ?>
			<?php echo FormHelper::text('Kí tự phải', 'symbol_right'); ?>

			<?php /* Order */ ?>
			<?php echo FormHelper::text('Sắp xếp', 'order',null,['input' => ['class'=>'mask-numeric']]); ?>

			<?php /* Active */ ?>
			<?php echo FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0]]); ?>

		</div>
    <hr />
<hr />
</div>
