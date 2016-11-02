<div class="tab-content">
    <div class="tab-pane active" id="content">
        <div>
            <div class="row">
                <div class="col-xs-9">
                    <?php /* product attribute */ ?>
                    <?php echo FormHelper::text('Tên thuộc tính', 'name', null, ['input' => ['required']]); ?>


                    <div class="form-group last">
                        <label class="control-label col-md-3">Danh mục sản phẩm</label>
                        <div class="col-md-9">
                            <?php (isset($attribute)) ? $arrayCategories = $attribute->categories()->lists('name','id')->toArray() : $arrayCategories='' ;?>
                            <select multiple="multiple" class="multi-select" id="my_multi_select2" name="product_category_id[]">
                                <?php foreach($category_lists as $categoty_id=>$category_name): ?>
                                    <option value="<?php echo e($categoty_id); ?>" <?php echo e(( isset($arrayCategories[$categoty_id]) ) ? 'selected' : ''); ?>><?php echo e($category_name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 240px;">
                        <label class="control-label col-md-3">Giá trị thuộc tính</label>
                        <div class="col-md-9">
                            <div class="prescription">
                                <?php if(isset($attribute)): ?>
                                    <?php foreach($attribute->attributeValues()->get() as $attribute_value): ?>
                                        <?php echo $__env->make('product::attribute.partials.options-product', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <?php echo $__env->make('product::attribute.partials.options-product', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 30px;">
                        <div class="col-xs-12">
                            <a href="javascript:;" class="btn btn-icon-only  blue  duplicate" class="duplicate" ><i class="fa fa-plus"></i>  </a>
                        </div>
                    </div>



                </div>
                <div class="col-xs-3">

                    <?php /* product title */ ?>
                    <?php echo FormHelper::text('Sắp xếp', 'order', null, ['input' => ['class'=>'mask-currency']]); ?>

                    <?php /* language */ ?>
<?php /*                    <?php echo FormHelper::select('Ngôn ngữ', 'language_id', $lang_list, null, ['input' => ['required']]); ?>*/ ?>
                    <?php /* Publish */ ?>
                    <?php echo FormHelper::checkbox('Kích hoạt', 'active', 1, isset($attribute) ? null : true, ['input' => ['default' => 0]]); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">

                </div>
            </div>
        </div>
    </div>



</div>
<div class="form-actions">
    <button type="submit" class="btn blue"> OK </button>
</div>