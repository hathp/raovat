<div class="form-body">
    {{-- Category name --}}
    {!! FormHelper::text('Tên', 'name', null, ['input' => ['required', 'class' => 'to-slug', 'data-target' => '.slug']]) !!}

    {{-- Slug --}}
    {!! FormHelper::text('Slug', 'slug', null, ['input' => ['required', 'class' => 'slug', ]]) !!}

    {{-- Parent Category --}}
    {!! FormHelper::select('Nhóm cha', 'parent_id', $category_list, null, ['input' => ['required']]) !!}

    {{-- language --}}
    {!! FormHelper::select('Ngôn ngữ', 'language_id', $lang_list, null, ['input' => ['required']]) !!}

    {{-- Cover Image --}}
    {!! FormHelper::file('Ảnh cover', 'cover_image') !!}

    {{-- description --}}
    {!! FormHelper::textarea('Mô tả', 'description',null,['input' =>['style'=>'height:55px']]) !!}

    {{-- Active --}}
    {!! FormHelper::checkbox('Kích hoạt', 'active', 1, isset($page_category) ? null : true, ['input' => ['default' => 0]]) !!}

    <hr />
    
    <h5>Thẻ SEO</h5>
    {{-- Meda title tag --}}
    {!! FormHelper::text('Thẻ tiêu đề', 'meta_title') !!}

    {{-- Meta keyword tag --}}
    {!! FormHelper::text('Thẻ từ khóa', 'meta_keyword', null, ['input' => ['data-role' => 'tagsinput']]) !!}

    {{-- Meta description tag --}}
    {!! FormHelper::text('Thẻ miêu tả', 'meta_description') !!}

</div>