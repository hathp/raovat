<div class="tab-content">
    <div class="tab-pane active" id="content">
        <div>
            <div class="row">
                <div class="col-xs-9">
                    {{-- product title --}}
                    {!! FormHelper::text('Tên thành viên', 'name', null, ['input' => ['required']]) !!}
                    {{-- product category id --}}
                    {!! FormHelper::select('Nhóm thành viên', 'member_group_id', $member_groups,'', ['input' => ['required']]) !!}
                    {{-- product title --}}
                    {!! FormHelper::text('Email', 'email', null, ['input' => ['required']]) !!}
                    {{-- product title --}}
                    {!! FormHelper::text('Số điện thoại', 'phone') !!}
                    {{-- product title --}}
                    {!! FormHelper::text('Địa chỉ', 'address') !!}

                    {{-- Not show password fiel when edit user --}}
                    @unless(Request::is('*edit'))
                        {{-- Password input field --}}
                        {!! FormHelper::password('Mật khẩu', 'password', null, ['input' => ['required']]) !!}

                        {{-- Password confirmation input field --}}
                        {!! FormHelper::password('Xác nhận mật khẩu', 'password_confirmation', null, ['input' => ['required']]) !!}
                    @endunless

                </div>
                <div class="col-xs-3">
                    {{-- Cover Image --}}
                    {!! FormHelper::imageInput('Ảnh thành viên', 'cover_image', isset($product) ? $product->getCoverImage() : null, isset($product) ? null : ['input' => ['required']]) !!}
                    {{-- Gender input --}}
                    {!! FormHelper::radioList('Giới tính', null, function($form) {
                        $form->add('Nam', 'gender', 1, true);
                        $form->add('Nữ', 'gender', 0);

                    }, ['input' => ['required']]) !!}
                    {{-- product title --}}
                    {!! FormHelper::text('Sắp xếp', 'order', null, ['input' => ['class'=>'mask-currency']]) !!}
                    {{-- language --}}
                    {!! FormHelper::select('Ngôn ngữ', 'language_id', $lang_list, null, ['input' => ['required']]) !!}
                    {{-- Publish --}}
                    {!! FormHelper::checkbox('Kích hoạt', 'active', 1, isset($member) ? null : true, ['input' => ['default' => 0, 'checked'=>'checked']]) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    {{-- Content --}}
                    {!! FormHelper::textarea('Mô tả', 'content', null, ['input' => ['class' => 'ckeditor', 'rows' => '10']]) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane" id="meta">
        <div>
            {{-- Meta tile --}}
            {!! FormHelper::text('Thẻ tiêu đề: ', 'meta_title', null) !!}

            {{-- Meta keyword --}}
            {!! FormHelper::text('Thẻ từ khóa: ', 'meta_keyword', null, ['input' => ['data-role' => 'tagsinput'], 'label' => ['style' => 'display: block']]) !!}

            {{-- Meta description --}}
            {!! FormHelper::textarea('Thẻ miêu tả', 'meta_description', null) !!}
        </div>
    </div>

    </div>
</div>
<div class="form-actions">
    <button type="submit" class="btn blue"> OK </button>
</div>