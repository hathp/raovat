<div class="row">
    <div class="col-xs-2">
        <div class="form-group form-md-line-input form-md-floating-label">
            <input type="text" name="option_name[]" class="form-control" value="{{ (isset($option_name)) ? $option_name : '' }}">
            <label for="form_control">Tên tùy chọn</label>
        </div>
    </div>
    <div class="col-xs-2">
        <div class="form-group form-md-line-input form-md-floating-label">
            <input type="text" name="option_value[]" class="form-control" value="{{ isset($option_value) ? $option_value : '' }}">
            <label for="form_control">Giá trị</label>
        </div>
    </div>
    <div class="col-xs-1">
        <div><label for=""></label></div>
        <a href="javascript:;" class="btn btn-icon-only red delete" class="delete" ><i class="fa fa-minus"></i>  </a>
    </div>
</div>