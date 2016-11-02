<div class="form-body">
    <?php /* Name input field*/ ?>
    <?php echo FormHelper::text('Họ tên', 'name', null, ['input' => ['required']]); ?>


    <?php /* Email input field*/ ?>
    <?php echo FormHelper::email('Email', 'email', null, ['input' => ['required']]); ?>


    <?php /* Date of birth input field*/ ?>
    <?php echo FormHelper::text('Ngày sinh', 'date_of_birth', isset($user) ? $user->date_of_birth->format('d/m/Y') : null, ['input' => ['required', 'class' => 'mask-date']]); ?>


    <?php /* Mobile input fiel */ ?>
    <?php echo FormHelper::text('SĐT', 'phone', null); ?>


    <?php /* Gender input */ ?>
    <?php echo FormHelper::radioList('Giới tính', null, function($form) {
        $form->add('Nam', 'gender', 1, true);
        $form->add('Nữ', 'gender', 0);

    }, ['input' => ['required']]); ?>


    <?php /* Avatar */ ?>
    <?php echo FormHelper::imageInput('Hình đại diện', 'avatar', isset($user) ? $user->getAvatarImage() : null); ?>


    <?php /* Roles input */ ?>
    <?php echo FormHelper::checkboxesList('Nhóm', isset($user) ? $user_roles : null, function($form) use($roles) {
        for($i = 0; $i < count($roles); $i++)
            $form->add($roles[$i]->name, "roles[]", $roles[$i]->id);
    }, ['input' => ['required']]); ?>


    <?php /* Not show password fiel when edit user */ ?>
    <?php if ( ! (Request::is('*edit'))): ?>
        <?php /* Password input field */ ?>
        <?php echo FormHelper::password('Mật khẩu', 'password', null, ['input' => ['required']]); ?>


        <?php /* Password confirmation input field */ ?>
        <?php echo FormHelper::password('Xác nhận mật khẩu', 'password_confirmation', null, ['input' => ['required']]); ?>

    <?php endif; ?>

    <?php /* Active input */ ?>
    <?php echo FormHelper::radioList('Kích hoạt', null, function($form) {
        $form->add('Có', 'active', 1, true);
        $form->add('không', 'active', 0);
    }, ['input' => ['required']]); ?>


</div>

<div class="form-actions">
    <?php echo $__env->make('admin.partials.form-submit-button', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>