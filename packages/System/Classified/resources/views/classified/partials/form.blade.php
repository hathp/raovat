@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="form-body">
    {{-- Name input field--}}
    {!! FormHelper::text('Tiêu đề', 'name', null, ['input' => ['required']]) !!}

    {{-- Category --}}
    <div class="form-group">
        <label for="content">Chuyên mục</label>
        <select class="form-control" name="classifieds_category_id" id="classifieds_category_id">
            @foreach($classified_categories as $classified_category)
                <optgroup label="{{ $classified_category->name }}">
                    @if( count($classified_category->child()) )
                        @foreach($classified_category->child() as $child_categories )
                            <option value="{{ $child_categories->id }}">{{ $child_categories->name }}</option>
                        @endforeach
                    @endif
                </optgroup>
            @endforeach
        </select>
    </div>

    {{-- language --}}
    {!! FormHelper::select('Quốc gia rao', 'country_id', $country_list, null, ['input' => ['required']]) !!}
    {!! FormHelper::select('Ngôn ngữ', 'language_id', $lang_list, null, ['input' => ['required']]) !!}

    {{-- Price --}}
    {!! FormHelper::text('Giá tiền', 'price', null) !!}

    {{-- Content --}}
    {!! FormHelper::textarea('Nội dung', 'content', null, ['input' => ['required', 'class' => 'ckeditor']]) !!}

    {{-- Mobile --}}
    {!! FormHelper::text('Điện thoại', 'mobile', null) !!}

    {{-- Address --}}
    {!! FormHelper::text('Địa chỉ', 'address', null, ['input' => ['required']]) !!}

    {{-- Avatar --}}
    {!! FormHelper::imageInput('Hình ảnh', 'image', isset($classifieds) ? $classifieds->getImage() : null) !!}
</div>