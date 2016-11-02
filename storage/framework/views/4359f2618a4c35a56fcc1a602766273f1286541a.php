<div class="form-body edit">

    <?php /* Parent Category */ ?>
    <?php echo FormHelper::select('Loại sản phẩm', 'product_category_id', $category_list, null, ['input' => ['id'=>'product_categoies','required','class'=>'product_category','_optionId'=>$product_option->id]]); ?>


    <div id="product_options" class="form-group">

    </div>

    <?php /* Category name */ ?>
    <?php echo FormHelper::text('Tên thuộc tính', 'name', null, ['input' => ['required']]); ?>


    <?php /* language */ ?>
    <?php echo FormHelper::select('Ngôn ngữ', 'language_id', $lang_list, null, ['input' => ['required']]); ?>



    <?php /* Order */ ?>
    <?php echo FormHelper::text('Sắp xếp', 'order',null,['input' => ['class'=>'mask-numeric']]); ?>


    <?php /* Active */ ?>
    <?php echo FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0]]); ?>


    <hr />

</div>
