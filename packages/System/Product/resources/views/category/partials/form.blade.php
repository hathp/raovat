<div class="tab-content">
    <div class="tab-pane active" id="content">
        <div>
            <div class="row">
                <div class="col-xs-9">
                    {{-- Category name --}}
                    {!! FormHelper::text('Tên', 'name', null, ['input' => ['required', 'class' => 'to-slug', 'data-target' => '.slug']]) !!}

                    {{-- Slug --}}
                    {!! FormHelper::text('Slug', 'slug', null, ['input' => ['required', 'class' => 'slug', ]]) !!}

                    {{-- Parent Category --}}
                    {!! FormHelper::select('Nhóm cha', 'parent_id', $category_list, null, ['input' => []]) !!}

                    {{-- description --}}
                    {!! FormHelper::textarea('Mô tả', 'description',null,['style'=>'height:55px']) !!}
                </div>
                <div class="col-xs-3">
                    {{-- Cover Image --}}
{{--                    {!! FormHelper::imageInput('Ảnh danh mục', 'cover_image', $product_category->getLinkImage()) !!}--}}
                    {!! FormHelper::imageInput('Ảnh danh mục', 'cover_image', isset($product_category) ? $product_category->getCoverImage() : null) !!}

                    {{-- Order --}}
                    {!! FormHelper::text('Sắp xếp', 'order', null, ['input' => ['class'=>'mask-currency']]) !!}
                    {{-- language --}}
                    {!! FormHelper::select('Ngôn ngữ', 'language_id', $lang_list, null, ['input' => ['required']]) !!}
                    {{-- Active --}}
                    {!! FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0]]) !!}
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
