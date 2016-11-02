<div class="tab-content">
    <div class="tab-pane active" id="content">
        <div>
            <div class="row">
                <div class="col-xs-9">
                    <?php /* Category name */ ?>
                    <?php echo FormHelper::text('Tên', 'name', null, ['input' => ['required', 'class' => 'to-slug', 'data-target' => '.slug']]); ?>


                    <?php /* Slug */ ?>
                    <?php echo FormHelper::text('Slug', 'slug', null, ['input' => ['required', 'class' => 'slug', ]]); ?>


                    <?php /* Parent Category */ ?>
                    <?php echo FormHelper::select('Nhóm cha', 'parent_id', $category_list, null, ['input' => []]); ?>


                    <?php /* description */ ?>
                    <?php echo FormHelper::textarea('Mô tả', 'description',null,['style'=>'height:55px']); ?>

                </div>
                <div class="col-xs-3">
                    <?php /* Cover Image */ ?>
<?php /*                    <?php echo FormHelper::imageInput('Ảnh danh mục', 'cover_image', $product_category->getLinkImage()); ?>*/ ?>
                    <?php echo FormHelper::imageInput('Ảnh danh mục', 'cover_image', isset($product_category) ? $product_category->getCoverImage() : null); ?>


                    <?php /* Order */ ?>
                    <?php echo FormHelper::text('Sắp xếp', 'order', null, ['input' => ['class'=>'mask-currency']]); ?>

                    <?php /* language */ ?>
                    <?php echo FormHelper::select('Ngôn ngữ', 'language_id', $lang_list, null, ['input' => ['required']]); ?>

                    <?php /* Active */ ?>
                    <?php echo FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0]]); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="meta">
        <div>
            <?php /* Meta tile */ ?>
            <?php echo FormHelper::text('Thẻ tiêu đề: ', 'meta_title', null); ?>


            <?php /* Meta keyword */ ?>
            <?php echo FormHelper::text('Thẻ từ khóa: ', 'meta_keyword', null, ['input' => ['data-role' => 'tagsinput'], 'label' => ['style' => 'display: block']]); ?>


            <?php /* Meta description */ ?>
            <?php echo FormHelper::textarea('Thẻ miêu tả', 'meta_description', null); ?>

        </div>
    </div>
</div>
