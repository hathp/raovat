<div class="row">
    <div class="col-xs-2">
        <div class="form-group form-md-line-input form-md-floating-label">
            <select class="form-control edited" id="form_control" name="attributes[<?php echo e($attribute->id); ?>][attributes_value_name][]">
                <option value=""></option>
                <?php foreach($attribute->attributeValues()->get() as $attributeValue ): ?>
                    <option value="<?php echo e($attributeValue->id); ?>" <?php if(isset($productAttribute)){ if($attributeValue->id == $productAttribute->value_id)  echo 'selected="selected"'; else  echo ''; }?> ><?php echo e($attributeValue->name); ?></option>
                <?php endforeach; ?>
            </select>
            <label for="form_control">Giá trị</label>
        </div>
    </div>
    <div class="col-xs-2">
        <div class="form-group form-md-line-input form-md-floating-label">
            <input type="text" name="attributes[<?php echo e($attribute->id); ?>][attributes_value_quantity][]" class="form-control edited"  value="<?php echo e((isset($productAttribute)) ? $productAttribute->quantity : ''); ?>">
            <label for="form_control">Số lượng</label>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="form-group form-md-line-input form-md-floating-label">
            <input type="text" name="attributes[<?php echo e($attribute->id); ?>][attributes_value_amount][]" class="form-control edited" value="<?php echo e((isset($productAttribute)) ? $productAttribute->amount : ''); ?>">
            <label for="form_control">giá chênh lệch</label>
        </div>
    </div>
    <div class="col-xs-1">
        <div><label for=""></label></div>
        <a href="javascript:;" class="btn btn-icon-only red delete" ><i class="fa fa-minus"></i>  </a>
    </div>
</div>