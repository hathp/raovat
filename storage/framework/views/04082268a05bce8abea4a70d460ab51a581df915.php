<div class="tab-content">
    <div class="tab-pane active" id="content">
        <div>
            <div class="row">
                <div class="col-xs-9">
                    <?php /* Category name */ ?>
                    <?php echo FormHelper::text('Tên', 'name', null, ['input' => ['required', 'class' => 'to-slug', 'data-target' => '.slug']]); ?>


                    <?php /* Slug */ ?>
                    <?php echo FormHelper::text('Slug', 'slug', null, ['input' => ['required', 'class' => 'slug', ]]); ?>


                    <?php /*category*/ ?>
                    <div class="form-group last">
                        <label class="control-label col-md-3">Danh mục sản phẩm</label>
                        <div class="col-md-9">
                            <?php (isset($manufacture)) ? $arrayCategories = $manufacture->categories()->lists('name','id')->toArray() : $arrayCategories='' ;?>
                            <select multiple="multiple" class="multi-select" id="my_multi_select2" name="product_category_id[]">
                                <?php foreach($category_list as $categoty_id=>$category_name): ?>
                                    <option value="<?php echo e($categoty_id); ?>" <?php echo e(( isset($arrayCategories[$categoty_id]) ) ? 'selected' : ''); ?>><?php echo e($category_name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <?php /* description */ ?>
                    <?php echo FormHelper::textarea('Mô tả', 'description',null,['input' => ['style'=>'height:60px']]); ?>

                </div>
                <div class="col-xs-3">
                    <?php /* Cover Image */ ?>
                    <?php echo FormHelper::imageInput('Ảnh hãng sản xuất', 'cover_image', isset($manufacture) ? $manufacture->getCoverImage() : null, isset($manufacture) ? null : ['input' => ['required']]); ?>


                    <?php /* Order */ ?>
                    <?php echo FormHelper::text('Sắp xếp', 'order', null, ['input' => ['class'=>'mask-currency']]); ?>


                    <?php /* Active */ ?>
                    <?php echo FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0,'checked'=>'checked']]); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="meta">
        <?php /* Meta tile */ ?>
        <?php echo FormHelper::text('Thẻ tiêu đề: ', 'meta_title', null); ?>


        <?php /* Meta keyword */ ?>
        <?php echo FormHelper::text('Thẻ từ khóa: ', 'meta_keyword', null, ['input' => ['data-role' => 'tagsinput'], 'label' => ['style' => 'display: block']]); ?>


        <?php /* Meta description */ ?>
        <?php echo FormHelper::textarea('Thẻ miêu tả', 'meta_description', null); ?>


    </div>
</div>
