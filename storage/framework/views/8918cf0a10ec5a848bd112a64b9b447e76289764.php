<?php if(!empty($attributes->toArray())): ?>
    <?php foreach($attributes as $attribute): ?>
        <div class="attributes">
            <div class="form-group">
                <div class="note note-success col-md-3">
                    <?php echo e($attribute->name); ?>

                </div>
                <div class="col-md-9 attribute-list">
                    <div id='attributes_content_<?php echo e($attribute->id); ?>' class="attribute">
                        <?php if(count($attribute->productAttributes()->where('product_id',$product_id)->get())>0): ?>
                            <?php foreach($attribute->productAttributes()->where('product_id',$product_id)->get() as $productAttribute): ?>
                                <?php echo $__env->make('product::attribute.partials.attribute-value', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <?php echo $__env->make('product::attribute.partials.attribute-value', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 30px;">
                <div class="col-xs-12">
                    <a href="javascript:;" class="btn btn-icon-only  blue  plus" ><i class="fa fa-plus"></i>  </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <?php echo FormHelper::text('Số lượng', 'total', null, ['input' => ['style'=>'width:300px;','class'=>'mask-currency','required']]); ?>

<?php endif; ?>