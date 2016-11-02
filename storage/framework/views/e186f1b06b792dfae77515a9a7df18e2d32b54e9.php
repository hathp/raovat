<div class="tab-content">
    <div class="tab-pane active" id="content">
        <div>
            <div class="row">
                <div class="col-xs-9">
                    <?php /* product title */ ?>
                    <?php echo FormHelper::text('Tên thành viên', 'name', null, ['input' => ['required']]); ?>

                    <?php /* product category id */ ?>
                    <?php echo FormHelper::select('Nhóm thành viên', 'member_group_id', $member_groups,'', ['input' => ['required']]); ?>

                    <?php /* product title */ ?>
                    <?php echo FormHelper::text('Email', 'email', null, ['input' => ['required']]); ?>

                    <?php /* product title */ ?>
                    <?php echo FormHelper::text('Số điện thoại', 'phone'); ?>

                    <?php /* product title */ ?>
                    <?php echo FormHelper::text('Địa chỉ', 'address'); ?>


                    <?php /* Not show password fiel when edit user */ ?>
                    <?php if ( ! (Request::is('*edit'))): ?>
                        <?php /* Password input field */ ?>
                        <?php echo FormHelper::password('Mật khẩu', 'password', null, ['input' => ['required']]); ?>


                        <?php /* Password confirmation input field */ ?>
                        <?php echo FormHelper::password('Xác nhận mật khẩu', 'password_confirmation', null, ['input' => ['required']]); ?>

                    <?php endif; ?>

                </div>
                <div class="col-xs-3">
                    <?php /* Cover Image */ ?>
                    <?php echo FormHelper::imageInput('Ảnh thành viên', 'cover_image', isset($product) ? $product->getCoverImage() : null, isset($product) ? null : ['input' => ['required']]); ?>

                    <?php /* Gender input */ ?>
                    <?php echo FormHelper::radioList('Giới tính', null, function($form) {
                        $form->add('Nam', 'gender', 1, true);
                        $form->add('Nữ', 'gender', 0);

                    }, ['input' => ['required']]); ?>

                    <?php /* product title */ ?>
                    <?php echo FormHelper::text('Sắp xếp', 'order', null, ['input' => ['class'=>'mask-currency']]); ?>

                    <?php /* language */ ?>
                    <?php echo FormHelper::select('Ngôn ngữ', 'language_id', $lang_list, null, ['input' => ['required']]); ?>

                    <?php /* Publish */ ?>
                    <?php echo FormHelper::checkbox('Kích hoạt', 'active', 1, isset($member) ? null : true, ['input' => ['default' => 0, 'checked'=>'checked']]); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <?php /* Content */ ?>
                    <?php echo FormHelper::textarea('Mô tả', 'content', null, ['input' => ['class' => 'ckeditor', 'rows' => '10']]); ?>

                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane" id="meta">
        <div>
            <?php /* Meta tile */ ?>
            <?php echo FormHelper::text('Thẻ tiêu đề: ', 'meta_title', null); ?>


            <?php /* Meta keyword */ ?>
            <?php echo FormHelper::text('Thẻ từ khóa: ', 'meta_keyword', null, ['input' => ['data-role' => 'tagsinput'], 'label' => ['style' => 'display: block']]); ?>


            <?php /* Meta description */ ?>
            <?php echo FormHelper::textarea('Thẻ miêu tả', 'meta_description', null); ?>

        </div>
    </div>

    </div>
</div>
<div class="form-actions">
    <button type="submit" class="btn blue"> OK </button>
</div>