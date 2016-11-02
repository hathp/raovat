<div class="row">
    <div class="col-xs-4">
        <div class="form-group form-md-line-input form-md-floating-label">
            <input type="text" name="attributes_value[]" class="form-control" value="<?php echo e((isset($attribute_value)) ? $attribute_value->name : ''); ?>">
            <label for="form_control">Giá trị</label>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group form-md-line-input form-md-floating-label">
            <input type="text" name="attributes_order[]" class="form-control" value="<?php echo e(isset($attribute_value) ? $attribute_value->order : ''); ?>">
            <label for="form_control">Thứ tự</label>
        </div>
    </div>
    <div class="col-xs-1">
        <div><label for=""></label></div>
        <a href="javascript:;" class="btn btn-icon-only red delete" class="delete" ><i class="fa fa-minus"></i>  </a>
    </div>
</div>