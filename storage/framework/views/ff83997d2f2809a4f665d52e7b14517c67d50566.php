<div class="tab-content">
    <div class="tab-pane active" id="content">
        <div>
            <div class="row">
                <div class="col-xs-9">
                    <?php /* Page title */ ?>
                    <?php echo FormHelper::text('Tiêu đề', 'title', null, ['input' => ['required']]); ?>


                    <?php /* Page brief */ ?>
                    <?php echo FormHelper::textarea('Tóm tắt', 'brief', null, ['input' => ['required', 'rows' => '3']]); ?>


                    <?php /* Page category id */ ?>
                    <?php echo FormHelper::select('Nhóm', 'page_category_id', $category_lists, isset($page) ? $page->categories->pluck('id')->toArray() : null, ['input' => ['required']]); ?>


                    <?php /* Tags */ ?>
                    <?php echo FormHelper::text('Tag', 'tags', isset($page) ? $page->tagLists() : null, ['input' => ['data-role' => 'tagsinput', 'multiple'], 'label' => ['style' => 'display:block']]); ?>

                </div>
                <div class="col-xs-3">
                    <?php /* Cover Image */ ?>
                    <?php echo FormHelper::imageInput('Ảnh bài viết', 'cover_image', isset($page) ? $page->getCoverImage() : null, isset($page) ? null : ['input' => ['required']]); ?>


                    <?php /* Published time */ ?>
<?php /*                    <?php echo FormHelper::text('Thời gian đăng bài', 'published_at', isset($page) ? $page->published_at->format('d/m/Y H:i') : date('d/m/Y H:i'), ['input' => ['class' => 'mask-datetime click-to-edit', isset($page) ? '' : '']]); ?>*/ ?>
                    <div class="form-group">
                        <label>Thời gian đăng bài</label>
                        <div class="input-group">
                            <div class="input-icon">
                                <?php echo Form::text('published_at', isset($page) ? $page->published_at->format('d/m/Y H:i') : date('d/m/Y H:i'), ['id' => 'published_at', 'class' => 'form-control', isset($page) ? '' : 'disabled']); ?>

                            </div>
                            <?php if ( ! (isset($page))): ?>
                                <span class="input-group-btn">
                                    <button class="btn btn-success click-to-enable" data-target="#published_at" type="button"> Sửa</button>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>


                    <?php /* Publish */ ?>
                    <?php echo FormHelper::checkbox('Đăng bài viết', 'publish', 1, isset($page) ? null : true, ['input' => ['default' => 0]]); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <?php /* Content */ ?>
                    <?php echo FormHelper::textarea('Nội dung bài viết', 'content', null, ['input' => ['required', 'class' => 'ckeditor', 'rows' => '10']]); ?>

                </div>
            </div>

        </div>

    </div>
    <div class="tab-pane" id="meta">
        <div>
            <?php /* Meta tile */ ?>
            <?php echo FormHelper::text('Thẻ tiêu đề: ', 'meta_title', null); ?>


            <?php /* Meta keyword */ ?>
            <?php echo FormHelper::text('Thẻ từ khóa: ', 'meta_keyword', null, ['input' => ['data-role' => 'tagsinput'], 'label' => ['style' => 'display: block']]); ?>


            <?php /* Meta description */ ?>
            <?php echo FormHelper::textarea('Thẻ miêu tả', 'meta_description', null); ?>

        </div>
    </div>

    <div class="tab-pane" id="gallery">
        <div>
            <?php echo FormHelper::file('Chọn ảnh', 'album_images[]', ['input' => ['multiple']]); ?>


            <?php if(isset($page)): ?>
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
                <?php foreach($page->imageAlbum->images as $image): ?>
                    <tr>
                        <td>
                            <a href="#" class="fancybox-button" data-rel="fancybox-button">
                                <img class="img-responsive" src="<?php echo e($image->getLink(config('page-image.page_album.thumbnail.path'))); ?>" alt=""> </a>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="album_image_labels[<?php echo e($image->id); ?>]" value="<?php echo e($image->name); ?>"> </td>
                        <td>
                            <input type="text" class="form-control" name="album_image_orders[<?php echo e($image->id); ?>]" value="<?php echo e($image->order); ?>"> </td>

                        <td>
                            <a href="javascript:;" class="btn btn-default btn-sm delete-file" data-link="<?php echo e(route('admin.'. $page_category_slug . '.destroy')); ?>" data-id="<?php echo e($image->id); ?>" data-toggle="confirmation">
                                <i class="fa fa-times"></i> Xóa </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="form-actions">
    <button type="submit" class="btn blue"> OK </button>
</div>