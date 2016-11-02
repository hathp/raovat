<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach($errors->all() as $error): ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>


<div class="form-body">
    <?php /* Name input field*/ ?>
    <?php echo FormHelper::text('Tiêu đề', 'name', null, ['input' => ['required']]); ?>


    <?php /* Category */ ?>
    <div class="form-group">
        <label for="content">Chuyên mục</label>
        <select class="form-control" name="classifieds_category_id" id="classifieds_category_id">
            <?php foreach($classified_categories as $classified_category): ?>
                <optgroup label="<?php echo e($classified_category->name); ?>">
                    <?php if( count($classified_category->child()) ): ?>
                        <?php foreach($classified_category->child() as $child_categories ): ?>
                            <option value="<?php echo e($child_categories->id); ?>"><?php echo e($child_categories->name); ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </optgroup>
            <?php endforeach; ?>
        </select>
    </div>

    <?php /* Price */ ?>
    <?php echo FormHelper::text('Giá tiền', 'price', null); ?>


    <?php /* Content */ ?>
    <?php echo FormHelper::textarea('Nội dung', 'content', null, ['input' => ['required', 'class' => 'ckeditor']]); ?>


    <?php /* Mobile */ ?>
    <?php echo FormHelper::text('Điện thoại', 'mobile', null); ?>


    <?php /* Address */ ?>
    <?php echo FormHelper::text('Địa chỉ', 'address', null, ['input' => ['required']]); ?>


    <?php /* Avatar */ ?>
    <?php echo FormHelper::imageInput('Hình ảnh', 'image', isset($classifieds) ? $classifieds->getImage() : null); ?>

</div>