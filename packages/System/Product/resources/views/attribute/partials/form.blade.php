<div class="tab-content">
    <div class="tab-pane active" id="content">
        <div>
            <div class="row">
                <div class="col-xs-9">
                    {{-- product attribute --}}
                    {!! FormHelper::text('Tên thuộc tính', 'name', null, ['input' => ['required']]) !!}

                    <div class="form-group last">
                        <label class="control-label col-md-3">Danh mục sản phẩm</label>
                        <div class="col-md-9">
                            <?php (isset($attribute)) ? $arrayCategories = $attribute->categories()->lists('name','id')->toArray() : $arrayCategories='' ;?>
                            <select multiple="multiple" class="multi-select" id="my_multi_select2" name="product_category_id[]">
                                @foreach($category_lists as $categoty_id=>$category_name)
                                    <option value="{{ $categoty_id  }}" {{  ( isset($arrayCategories[$categoty_id]) ) ? 'selected' : '' }}>{{ $category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 240px;">
                        <label class="control-label col-md-3">Giá trị thuộc tính</label>
                        <div class="col-md-9">
                            <div class="prescription">
                                @if(isset($attribute))
                                    @foreach($attribute->attributeValues()->get() as $attribute_value)
                                        @include('product::attribute.partials.options-product')
                                    @endforeach
                                @else
                                    @include('product::attribute.partials.options-product')
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 30px;">
                        <div class="col-xs-12">
                            <a href="javascript:;" class="btn btn-icon-only  blue  duplicate" class="duplicate" ><i class="fa fa-plus"></i>  </a>
                        </div>
                    </div>



                </div>
                <div class="col-xs-3">

                    {{-- product title --}}
                    {!! FormHelper::text('Sắp xếp', 'order', null, ['input' => ['class'=>'mask-currency']]) !!}
                    {{-- language --}}
{{--                    {!! FormHelper::select('Ngôn ngữ', 'language_id', $lang_list, null, ['input' => ['required']]) !!}--}}
                    {{-- Publish --}}
                    {!! FormHelper::checkbox('Kích hoạt', 'active', 1, isset($attribute) ? null : true, ['input' => ['default' => 0]]) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">

                </div>
            </div>
        </div>
    </div>



</div>
<div class="form-actions">
    <button type="submit" class="btn blue"> OK </button>
</div>