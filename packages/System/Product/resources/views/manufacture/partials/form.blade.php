<div class="tab-content">
    <div class="tab-pane active" id="content">
        <div>
            <div class="row">
                <div class="col-xs-9">
                    {{-- Category name --}}
                    {!! FormHelper::text('Tên', 'name', null, ['input' => ['required', 'class' => 'to-slug', 'data-target' => '.slug']]) !!}

                    {{-- Slug --}}
                    {!! FormHelper::text('Slug', 'slug', null, ['input' => ['required', 'class' => 'slug', ]]) !!}

                    {{--category--}}
                    <div class="form-group last">
                        <label class="control-label col-md-3">Danh mục sản phẩm</label>
                        <div class="col-md-9">
                            <?php (isset($manufacture)) ? $arrayCategories = $manufacture->categories()->lists('name','id')->toArray() : $arrayCategories='' ;?>
                            <select multiple="multiple" class="multi-select" id="my_multi_select2" name="product_category_id[]">
                                @foreach($category_list as $categoty_id=>$category_name)
                                    <option value="{{ $categoty_id  }}" {{  ( isset($arrayCategories[$categoty_id]) ) ? 'selected' : '' }}>{{ $category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- description --}}
                    {!! FormHelper::textarea('Mô tả', 'description',null,['input' => ['style'=>'height:60px']]) !!}
                </div>
                <div class="col-xs-3">
                    {{-- Cover Image --}}
                    {!! FormHelper::imageInput('Ảnh hãng sản xuất', 'cover_image', isset($manufacture) ? $manufacture->getCoverImage() : null, isset($manufacture) ? null : ['input' => ['required']]) !!}

                    {{-- Order --}}
                    {!! FormHelper::text('Sắp xếp', 'order', null, ['input' => ['class'=>'mask-currency']]) !!}

                    {{-- Active --}}
                    {!! FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0,'checked'=>'checked']]) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="meta">
        {{-- Meta tile --}}
        {!! FormHelper::text('Thẻ tiêu đề: ', 'meta_title', null) !!}

        {{-- Meta keyword --}}
        {!! FormHelper::text('Thẻ từ khóa: ', 'meta_keyword', null, ['input' => ['data-role' => 'tagsinput'], 'label' => ['style' => 'display: block']]) !!}

        {{-- Meta description --}}
        {!! FormHelper::textarea('Thẻ miêu tả', 'meta_description', null) !!}

    </div>
</div>
