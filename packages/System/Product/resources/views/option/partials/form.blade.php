<div class="form-body edit">

    {{-- Parent Category --}}
    {!! FormHelper::select('Loại sản phẩm', 'product_category_id', $category_list, null, ['input' => ['id'=>'product_categoies','required','class'=>'product_category','_optionId'=>$product_option->id]]) !!}

    <div id="product_options" class="form-group">

    </div>

    {{-- Category name --}}
    {!! FormHelper::text('Tên thuộc tính', 'name', null, ['input' => ['required']]) !!}

    {{-- language --}}
    {!! FormHelper::select('Ngôn ngữ', 'language_id', $lang_list, null, ['input' => ['required']]) !!}


    {{-- Order --}}
    {!! FormHelper::text('Sắp xếp', 'order',null,['input' => ['class'=>'mask-numeric']]) !!}

    {{-- Active --}}
    {!! FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0]]) !!}

    <hr />

</div>
