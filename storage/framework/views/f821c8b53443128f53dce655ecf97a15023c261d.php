<div class="form-body edit">

    <?php /* Category name */ ?>
    <?php echo FormHelper::text('Tên ngôn ngữ', 'name', null, ['input' => ['required']]); ?>

	<?php /* Category name */ ?>
    <?php echo FormHelper::text('Tên định dạng ngôn ngữ', 'code', null, ['input' => ['required']]); ?>

    <?php /* Order */ ?>
    <?php echo FormHelper::text('Sắp xếp', 'order',null,['input' => ['class'=>'mask-numeric']]); ?>

    <?php /* Active */ ?>
    <?php echo FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0]]); ?>


    <hr />

</div>
