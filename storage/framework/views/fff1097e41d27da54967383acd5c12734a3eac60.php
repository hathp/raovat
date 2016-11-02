<?php echo csrf_field(); ?>

<!-- Title -->
<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name">Tiêu đề</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo e(isset($classifieds) ? $classifieds->name : old('name')); ?>" required>
    <?php if($errors->has('name')): ?>
        <span class="help-block"><?php echo e($errors->first('name')); ?></span>
    <?php endif; ?>
</div>

<!-- Category -->
<div class="row">
    <div class="col-xs-6">
        <div class="form-group">
            <label for="content">Chuyên mục</label>
            <select class="form-control" name="classifieds_category_id" id="classifieds_category_id">
                <?php foreach($classified_categories as $classified_category): ?>
                    <optgroup label="<?php echo e($classified_category->name); ?>">
                        <?php if( count($classified_category->child()) ): ?>
                            <?php foreach($classified_category->child() as $child_categories ): ?>
                                <option value="<?php echo e($child_categories->id); ?>" <?php echo e(((isset($classifieds) ? $classifieds->content : old('content')) == $child_categories->id) ? 'selected' : ''); ?>><?php echo e($child_categories->name); ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </optgroup>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group <?php echo e($errors->has('price') ? 'has-error' : ''); ?>">
            <label for="price">Giá tiền</label>
            <input class="form-control" type="number" name="price" value="<?php echo e(isset($classifieds) ? $classifieds->price : old('price')); ?>" />
            <?php if($errors->has('price')): ?>
                <span class="help-block"><?php echo e($errors->first('price')); ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>


<!-- Content -->
<div class="form-group <?php echo e($errors->has('content') ? 'has-error' : ''); ?>">
    <label for="content">Nội dung đăng</label>
    <textarea class="form-control ckeditor" id="content" name="content"  required ><?php echo e(isset($classifieds) ? $classifieds->content : old('content')); ?></textarea>
    <?php if($errors->has('content')): ?>
        <span class="help-block"><?php echo e($errors->first('content')); ?></span>
    <?php endif; ?>
</div>
<div class="row">
    <div class="col-xs-4">
        <!-- Mobile -->
        <div class="form-group <?php echo e($errors->has('mobile') ? 'has-error' : ''); ?>">
            <label for="mobile">Điện thoại</label>
            <input class="form-control" type="tel" name="mobile" value="<?php echo e(isset($classifieds) ? $classifieds->mobile : ((isset($user) && empty(old('mobile'))) ? $user->phone : old('mobile'))); ?>" />
            <?php if($errors->has('mobile')): ?>
                <span class="help-block"><?php echo e($errors->first('mobile')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-xs-8">
        <!-- Email -->
        <div class="form-group">
            <label for="content <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo e(isset($classifieds) ? $classifieds->email : ((isset($user) && empty(old('email'))) ? $user->email : old('email'))); ?>" />
            <?php if($errors->has('email')): ?>
                <span class="help-block"><?php echo e($errors->first('email')); ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Address -->
<div class="row">
    <?php /*<div class="col-xs-4">*/ ?>
        <?php /*<div class="form-group">*/ ?>
            <?php /*<label for="content">Thành phố</label>*/ ?>
            <?php /*<select class="form-control" name="province_id" id="province_id">*/ ?>
                <?php /*<?php foreach($provinces as $province): ?>*/ ?>
                    <?php /*<option value="<?php echo e($province->id); ?>" <?php echo e((old('province_id') == $province->id) ? 'selected' : ''); ?>> <?php echo e($province->name); ?></option>*/ ?>
                <?php /*<?php endforeach; ?>*/ ?>
            <?php /*</select>*/ ?>
        <?php /*</div>*/ ?>
    <?php /*</div>*/ ?>
    <div class="col-xs-12">
        <div class="form-group <?php echo e($errors->has('address') ? 'has-error' : ''); ?>">
            <label for="content">Địa chỉ</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo e(isset($classifieds) ? $classifieds->address : old('address')); ?>"/>
            <?php if($errors->has('address')): ?>
                <span class="help-block"><?php echo e($errors->first('address')); ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Image -->
<div class="row">
    <div class="col-xs-4">
        <div class="kv-image" style="display: inline-block; padding-bottom: 10px;">
            <label for="photos">Hình ảnh:</label>
            <input id="image" name="image" type="file" class="file-loading">
        </div>
    </div>
    <?php if(Request::route()->getName() == 'front.classified.create'): ?>
        <div class="col-xs-4">
            <div class="form-group <?php echo e($errors->has('captcha') ? 'has-error' : ''); ?>">
                <label for="content">Mã bảo vệ</label>
                <input type="text" class="form-control" id="captcha" name="captcha" required/>
                <?php if($errors->has('captcha')): ?>
                    <span class="help-block"><?php echo e($errors->first('captcha')); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-xs-4" style="padding-top: 20px">
            <?php echo captcha_img(); ?>

        </div>
    <?php endif; ?>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary"><?php echo e(isset($button) ? $button : 'OK'); ?></button>
</div>

<?php $__env->startSection('script'); ?>
    <script src="/assets/front/plugins/bootstrap-fileinput/js/fileinput.min.js"></script>
    <script src="/assets/front/plugins/ckeditor/ckeditor.js"></script>
    <script>
        $("#image").fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="<?php echo e(isset($classifieds) ? $classifieds->getImage() : '/assets/front/images/default-user.png'); ?>" alt="Your Avatar" style="width:160px">',
            layoutTemplates: {main2: '{preview} {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
    </script>
<?php $__env->stopSection(); ?>