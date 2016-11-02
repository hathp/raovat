<div class="form-body">
    {{-- Category name --}}
    {!! FormHelper::text('Tên', 'name', null, ['input' => ['required', 'class' => 'to-slug', 'data-target' => '.slug']]) !!}

    {{-- Slug --}}
    {!! FormHelper::text('Slug', 'slug', null, ['input' => ['required', 'class' => 'slug', ]]) !!}

    {{-- Parent Category --}}
    {!! FormHelper::select('Nhóm cha', 'parent_id', $category_list, null, ['input' => ['required']]) !!}

    {{-- Cover Image --}}
    {!! FormHelper::file('Ảnh cover', 'image') !!}
    @if(isset($classified_category) && !empty($classified_category->getBanner()))
        <div class="row">
            <div class="col-xs-3">
                <img style="width: 100%" src="{{ $classified_category->getBanner() }}" alt="">
            </div>
        </div>
    @endif

    {{-- Cover Image --}}
    {!! FormHelper::file('Icon', 'icon') !!}
    @if(isset($classified_category) && !empty($classified_category->getIcon()))
        <div class="row">
            <div class="col-xs-3">
                <img src="{{ $classified_category->getIcon() }}" alt="">
            </div>
        </div>
    @endif

    {{-- Active --}}
    {!! FormHelper::checkbox('Kích hoạt', 'active', 1, isset($classified_category) ? null : true, ['input' => ['default' => 0]]) !!}

    <h5>Thẻ SEO</h5>
    {{-- Meda title tag --}}
    {!! FormHelper::text('Thẻ tiêu đề', 'meta_title') !!}

    {{-- Meta keyword tag --}}
    {!! FormHelper::text('Thẻ từ khóa', 'meta_keyword', null, ['input' => ['data-role' => 'tagsinput']]) !!}

    {{-- Meta description tag --}}
    {!! FormHelper::text('Thẻ miêu tả', 'meta_description') !!}

</div>