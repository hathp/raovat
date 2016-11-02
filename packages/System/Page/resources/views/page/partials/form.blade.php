<div class="tab-content">
    <div class="tab-pane active" id="content">
        <div>
            <div class="row">
                <div class="col-xs-9">
                    {{-- Page title --}}
                    {!! FormHelper::text('Tiêu đề', 'title', null, ['input' => ['class' => 'to-slug', 'data-target' => '.slug', 'required']]) !!}

                    {{-- Page title --}}
                    {!! FormHelper::text('Slug', 'slug', null, ['input' => ['class' => 'slug', 'required']]) !!}

                    {{-- Page brief --}}
                    {!! FormHelper::textarea('Tóm tắt', 'brief', null, ['input' => ['required', 'rows' => '3']]) !!}

                    <div class="row">
                        <div class="col-xs-6">
                            {{-- Page category id --}}
                            {!! FormHelper::select('Nhóm', 'page_category_id', $category_lists, isset($page) ? $page->categories->pluck('id')->toArray() : null, ['input' => ['required']]) !!}
                        </div>
                        <div class="col-xs-6">
                            {{-- Tags --}}
                            {!! FormHelper::text('Tag', 'tags', isset($page) ? $page->tagLists() : null, ['input' => ['data-role' => 'tagsinput', 'multiple'], 'label' => ['style' => 'display:block']]) !!}
                        </div>
                    </div>

                    {{-- Page link --}}
                    {!! FormHelper::text('Nhúng id video từ https://www.youtube.com/', 'link') !!}


                </div>
                <div class="col-xs-3">
                    {{-- Cover Image --}}
                    {!! FormHelper::imageInput('Ảnh bài viết', 'cover_image', isset($page) ? $page->getCoverImage() : null, isset($page) ? null : ['input' => ['required']]) !!}

                    {{-- Published time --}}
{{--                    {!! FormHelper::text('Thời gian đăng bài', 'published_at', isset($page) ? $page->published_at->format('d/m/Y H:i') : date('d/m/Y H:i'), ['input' => ['class' => 'mask-datetime click-to-edit', isset($page) ? '' : '']]) !!}--}}
                    <div class="form-group">
                        <label>Thời gian đăng bài</label>
                        <div class="input-group">
                            <div class="input-icon">
                                {!! Form::text('published_at', isset($page) ? $page->published_at->format('d/m/Y H:i') : date('d/m/Y H:i'), ['id' => 'published_at', 'class' => 'form-control', isset($page) ? '' : 'disabled']) !!}
                            </div>
                            @unless(isset($page))
                                <span class="input-group-btn">
                                    <button class="btn btn-success click-to-enable" data-target="#published_at" type="button"> Sửa</button>
                                </span>
                            @endunless
                        </div>
                    </div>

                    {{-- language --}}
                    {!! FormHelper::select('Ngôn ngữ', 'language_id', $lang_list, null, ['input' => ['required']]) !!}

                    {{-- Publish --}}
                    {!! FormHelper::checkbox('Đăng bài viết', 'publish', 1, isset($page) ? null : true, ['input' => ['default' => 0]]) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    {{-- Content --}}
                    {!! FormHelper::textarea('Nội dung bài viết', 'content', null, ['input' => ['required', 'class' => 'ckeditor', 'rows' => '10']]) !!}
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

            @if(isset($page))
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
                @foreach($page->imageAlbum->images as $image)
                    <tr>
                        <td>
                            <a href="#" class="fancybox-button" data-rel="fancybox-button">
                                <img class="img-responsive" src="{{ $image->getLink(config('page-image.page_album.thumbnail.path')) }}" alt=""> </a>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="album_image_labels[{{ $image->id }}]" value="{{ $image->name }}"> </td>
                        <td>
                            <input type="text" class="form-control" name="album_image_orders[{{ $image->id }}]" value="{{ $image->order }}"> </td>

                        <td>
                            <a href="javascript:;" class="btn btn-default btn-sm delete-file" data-link="{{ route('admin.'. $page_category_slug . '.destroy') }}" data-id="{{ $image->id }}" data-toggle="confirmation">
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