<div class="tab-content">
    <div class="tab-pane active" id="content">
        <div>
            <div class="row">
                <div class="col-xs-9">
                    {{-- product title --}}
                    {!! FormHelper::text('Tiêu đề', 'title', null, ['input' => ['class' => 'to-slug', 'data-target' => '.slug', 'required']]) !!}

                    {{-- product title --}}
                    {!! FormHelper::text('Slug', 'slug', null, ['input' => ['class' => 'slug', 'required']]) !!}

                    {{-- product brief --}}
                    {!! FormHelper::textarea('Tóm tắt', 'brief', null, ['input' => ['required', 'rows' => '3']]) !!}

                    {{-- product category id --}}
                    {!! FormHelper::select('Nhóm', 'product_category_id', $category_lists, isset($product) ? $product->categories->pluck('id')->toArray() : null, ['input' => ['id' => 'product_category', 'product_id' => isset($product) ? $product->id : '','required' ]]) !!}

                    {{--manufacture--}}
                    <div id='manufacture' >

                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            {{-- product title --}}
                            {!! FormHelper::text('Giá mới (VNĐ)', 'price_new', null, ['input' => ['class'=>'mask-currency']]) !!}
                        </div>
                        <div class="col-xs-6">
                            {{-- product title --}}
                            {!! FormHelper::text('Giá cũ (VNĐ)', 'price_old', null, ['input' => ['class'=>'mask-currency']]) !!}
                        </div>
                    </div>

                    {{-- Tags --}}
                    {!! FormHelper::text('Tag', 'tags', isset($product) ? $product->tagLists() : null, ['input' => ['data-role' => 'tagsinput', 'multiple'], 'label' => ['style' => 'display:block']]) !!}
                </div>
                <div class="col-xs-3">
                    {{-- Cover Image --}}
                    {!! FormHelper::imageInput('Ảnh bài viết', 'cover_image', isset($product) ? $product->getCoverImage() : null, isset($product) ? null : ['input' => ['required']]) !!}

                    {{-- Published time --}}
{{--                    {!! FormHelper::text('Thời gian đăng bài', 'published_at', isset($product) ? $product->published_at->format('d/m/Y H:i') : date('d/m/Y H:i'), ['input' => ['class' => 'mask-datetime']]) !!}--}}
                    <div class="form-group">
                        <label>Thời gian đăng bài</label>
                        <div class="input-group">
                            <div class="input-icon">
                                {!! Form::text('published_at', isset($product) ? $product->published_at->format('d/m/Y H:i') : date('d/m/Y H:i'), ['id' => 'published_at', 'class' => 'form-control', isset($product) ? '' : 'disabled']) !!}
                            </div>
                            @unless(isset($product))
                                <span class="input-group-btn">
                                    <button class="btn btn-success click-to-enable" data-target="#published_at" type="button"> Sửa</button>
                                </span>
                            @endunless
                        </div>
                    </div>
                    {{-- product title --}}
                    {!! FormHelper::text('Sắp xếp', 'order', null, ['input' => ['class'=>'mask-currency']]) !!}
                    {{-- language --}}
                    {!! FormHelper::select('Ngôn ngữ', 'language_id', $lang_list, null, ['input' => ['required']]) !!}
                    {{-- Publish --}}
                    {!! FormHelper::checkbox('Đăng sản phẩm', 'publish', 1, isset($product) ? null : true, ['input' => ['default' => 0]]) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    {{-- Content --}}
                    {!! FormHelper::textarea('Nội dung sản phẩm', 'content', null, ['input' => ['required', 'class' => 'ckeditor', 'rows' => '10']]) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="option">
        {{--@if(Request::is('*edit'))--}}
            {{--@include('product::option.get-option')--}}
        {{--@endif--}}
    </div>
    <div class="tab-pane" id="option_product">
        <div>
            <div id="attribute">
                {{--@if(Request::is('*edit'))--}}
                {{--@include('product::option.get-option')--}}
                {{--@endif--}}
            </div>
            {{-- total --}}
            <label class="form_control">
                Thuộc tính riêng <br>
                <i>(Thuộc tính được hiển trong trang chi tiết sản phẩm)</i>
            </label>
            <div class="prescription">
               @if(isset($product))
                    @if(!empty(unserialize($product->options)))
                       @foreach(unserialize($product->options) as $option_name=>$option_value)
                            @include('product::product.partials.options-product')
                        @endforeach
                    @else
                       @include('product::product.partials.options-product')
                   @endif
                @else
                    @include('product::product.partials.options-product')
                @endif
            </div>

            <div class="row" style="margin-bottom: 30px;">
                <div class="col-xs-12">
                    <a href="javascript:;" class="btn btn-icon-only  blue  duplicate" class="duplicate" ><i class="fa fa-plus"></i>  </a>
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
    <div class="tab-pane" id="gallery">
        <div>
            {!! FormHelper::file('Chọn ảnh', 'album_images[]', ['input' => ['multiple']]) !!}

            @if(isset($product))
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr role="row" class="heading">
                        <th width="8%"> Hình ảnh </th>
                        <th width="25%"> Nhãn </th>
                        <th width="8%"> Sắp xếp </th>
                        <th width="10%"> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product->imageAlbum->images as $image)
                        <tr>
                            <td>
                                <a href="#" class="fancybox-button" data-rel="fancybox-button">
                                    <img class="img-responsive" src="{{ $image->getLink(config('product-image.product_album.thumbnail.path')) }}" alt=""> </a>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="album_image_labels[{{ $image->id }}]" value="{{ $image->name }}"> </td>
                            <td>
                                <input type="text" class="form-control" name="album_image_orders[{{ $image->id }}]" value="{{ $image->order }}"> </td>

                            <td>
                                <a href="javascript:;" class="btn btn-default btn-sm delete-file" data-link="{{ route('admin.product.destroy') }}" data-id="{{ $image->id }}" data-toggle="confirmation">
                                    <i class="fa fa-times"></i> Xóa </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
<div class="form-actions">
    <button type="submit" class="btn blue"> OK </button>
</div>