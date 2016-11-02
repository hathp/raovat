<div class="form-body">
    <div class="row">
        <div class="col-xs-9">
            <?php /* Category name */ ?>
            <?php echo FormHelper::text('Tên', 'name', null, ['input' => ['required']]); ?>


        </div>
        <div class="col-xs-3">

            <?php /* Order */ ?>
            <?php echo FormHelper::text('Sắp xếp', 'order', null, ['input' => ['class'=>'mask-currency']]); ?>

            <?php /* language */ ?>
<?php /*            <?php echo FormHelper::select('Ngôn ngữ', 'language_id', $lang_list, null, ['input' => ['required']]); ?>*/ ?>
            <?php /* Active */ ?>
            <?php echo FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0,'checked'=>'checked']]); ?>

        </div>
    </div>


</div>

<div class="form-actions">
    <?php echo $__env->make('admin.partials.form-submit-button', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>