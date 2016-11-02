<div class="form-body">
    <?php /* Category name */ ?>
    <?php echo FormHelper::text('Tên', 'name', null, ['input' => ['required', 'class' => 'to-slug', 'data-target' => '.slug']]); ?>


    <?php /* Slug */ ?>
    <?php echo FormHelper::text('Slug', 'slug', null, ['input' => ['required', 'class' => 'slug', ]]); ?>


    <?php /* Parent Category */ ?>
    <?php echo FormHelper::select('Nhóm cha', 'parent_id', $category_list, null, ['input' => ['required']]); ?>


    <?php /* language */ ?>
    <?php echo FormHelper::select('Ngôn ngữ', 'language_id', $lang_list, null, ['input' => ['required']]); ?>


    <?php /* Cover Image */ ?>
    <?php echo FormHelper::file('Ảnh cover', 'cover_image'); ?>


    <?php /* Active */ ?>
    <?php echo FormHelper::checkbox('Kích hoạt', 'active', 1, isset($page_category) ? null : true, ['input' => ['default' => 0]]); ?>


    <hr />
    
    <h5>Thẻ SEO</h5>
    <?php /* Meda title tag */ ?>
    <?php echo FormHelper::text('Thẻ tiêu đề', 'meta_title'); ?>


    <?php /* Meta keyword tag */ ?>
    <?php echo FormHelper::text('Thẻ từ khóa', 'meta_keyword', null, ['input' => ['data-role' => 'tagsinput']]); ?>


    <?php /* Meta description tag */ ?>
    <?php echo FormHelper::text('Thẻ miêu tả', 'meta_description'); ?>


</div>