<div class="form-body">
    {{-- Name input field--}}
    {!! FormHelper::text('Họ tên', 'name', null, ['input' => ['required']]) !!}

    {{-- Email input field--}}
    {!! FormHelper::email('Email', 'email', null, ['input' => ['required']]) !!}

    {{-- Date of birth input field--}}
    {!! FormHelper::text('Ngày sinh', 'date_of_birth', isset($user) ? $user->date_of_birth->format('d/m/Y') : null, ['input' => ['required', 'class' => 'mask-date']]) !!}

    {{-- Mobile input fiel --}}
    {!! FormHelper::text('SĐT', 'phone', null) !!}

    {{-- Gender input --}}
    {!! FormHelper::radioList('Giới tính', null, function($form) {
        $form->add('Nam', 'gender', 1, true);
        $form->add('Nữ', 'gender', 0);

    }, ['input' => ['required']]) !!}

    {{-- Avatar --}}
    {!! FormHelper::imageInput('Hình đại diện', 'avatar', isset($user) ? $user->getAvatarImage() : null) !!}

    {{-- Roles input --}}
    {!! FormHelper::checkboxesList('Nhóm', isset($user) ? $user_roles : null, function($form) use($roles) {
        for($i = 0; $i < count($roles); $i++)
            $form->add($roles[$i]->name, "roles[]", $roles[$i]->id);
    }, ['input' => ['required']]) !!}

    {{-- Not show password fiel when edit user --}}
    @unless(Request::is('*edit'))
        {{-- Password input field --}}
        {!! FormHelper::password('Mật khẩu', 'password', null, ['input' => ['required']]) !!}

        {{-- Password confirmation input field --}}
        {!! FormHelper::password('Xác nhận mật khẩu', 'password_confirmation', null, ['input' => ['required']]) !!}
    @endunless

    {{-- Active input --}}
    {!! FormHelper::radioList('Kích hoạt', null, function($form) {
        $form->add('Có', 'active', 1, true);
        $form->add('không', 'active', 0);
    }, ['input' => ['required']]) !!}

</div>

<div class="form-actions">
    @include('admin.partials.form-submit-button')
</div>