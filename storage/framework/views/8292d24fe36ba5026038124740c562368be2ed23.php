<?php echo csrf_field(); ?>

<div class="row">
    <div class="col-xs-12 col-sm-offset-1 col-sm-8">
        <!-- Title -->
        <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
            <label for="name">Họ tên</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo e(isset($user) ? $user->name : old('name')); ?>" required />
            <?php if($errors->has('name')): ?>
                <span class="help-block"><?php echo e($errors->first('name')); ?></span>
            <?php endif; ?>
        </div>

        <?php if(Request::route()->getName() == 'front.auth.register'): ?>
        <!-- Email -->
        <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo e(isset($user) ? $user->email : old('email')); ?>" required />
            <?php if($errors->has('email')): ?>
                <span class="help-block"><?php echo e($errors->first('email')); ?></span>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <!-- Gender -->
        <div class="form-group">
            <label for="gender">Giới tính</label>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" id="gender" value="1" <?php echo e((isset($user) && $user->gender == 1) ? 'checked' : ''); ?> <?php echo e(isset($user) ? '' : 'checked'); ?> />
                    Nam
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" id="gender" value="0" <?php echo e((isset($user) && $user->gender == 0) ? 'checked' : ''); ?> />
                    Nữ
                </label>
            </div>
        </div>

        <!-- Date of birth -->
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="form-group <?php echo e($errors->has('date_of_birth') ? 'has-error' : ''); ?>">
                    <label for="date_of_birth">Ngày sinh:</label>
                    <input type="text" class="form-control mask-date" name="date_of_birth" value="<?php echo e(isset($user) ? $user->getBirthday() : old('date_of_birth')); ?>" required/>
                    <?php if($errors->has('date_of_birth')): ?>
                        <span class="help-block"><?php echo e($errors->first('date_of_birth')); ?></span>
                    <?php endif; ?>
                    <span class="help-block">Định dạng: ngày/tháng/năm</span>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="form-group <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
                    <label for="date_of_birth">Số điện thoại:</label>
                    <input type="tel" class="form-control" name="phone" value="<?php echo e(isset($user) ? $user->phone : old('phone')); ?>"/>
                    <?php if($errors->has('phone')): ?>
                        <span class="help-block"><?php echo e($errors->first('phone')); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if(Request::route()->getName() == 'front.auth.register'): ?>
            <!-- Password -->
            <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                <label for="password">Mật khẩu</label>
                <input class="form-control" type="password" name="password" />
                <?php if($errors->has('password')): ?>
                    <span class="help-block"><?php echo e($errors->first('password')); ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group <?php echo e($errors->has('password_confirmation') ? 'has-error' : ''); ?>">
                <label for="password-confirmation">Xác nhận mật khẩu</label>
                <input class="form-control" type="password" name="password_confirmation" />
                <?php if($errors->has('password_confirmation')): ?>
                    <span class="help-block"><?php echo e($errors->first('password_confirmation')); ?></span>
                <?php endif; ?>
            </div>
            <div class="row">
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
            </div>
        <?php endif; ?>
    </div>
    <div class="col-xs-12 col-sm-2">
        <div class="kv-image" style="display: inline-block; padding-bottom: 10px;">
            <label for="avatar">Hình ảnh:</label>
            <input id="avatar" name="avatar" type="file" class="file-loading">
        </div>
    </div>
    <div class="col-xs-12 col-sm-offset-1">
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><?php echo e(isset($button) ? $button : ''); ?></button>
        </div>
    </div>
</div>

<?php $__env->startSection('script'); ?>
    <script src="/assets/front/plugins/bootstrap-fileinput/js/fileinput.min.js"></script>
    <script>
        $("#avatar").fileinput({
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
            defaultPreviewContent: '<img src="<?php echo e(isset($user) ? $user->getAvatarImage() : '/assets/front/images/default-user.png'); ?>" alt="Your Avatar" style="width:160px">',
            layoutTemplates: {main2: '{preview} {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
    </script>
<?php $__env->stopSection(); ?>