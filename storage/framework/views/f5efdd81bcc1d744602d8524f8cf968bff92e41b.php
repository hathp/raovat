<div class="tab-content">
    <div class="tab-pane active" id="content">
        <div>
            <div class="row">
                <div class="col-xs-9">
                    <?php /* product title */ ?>
                    <?php echo FormHelper::text('Tiêu đề', 'title', null, ['input' => ['class' => 'to-slug', 'data-target' => '.slug', 'required']]); ?>


                    <?php /* product title */ ?>
                    <?php echo FormHelper::text('Slug', 'slug', null, ['input' => ['class' => 'slug', 'required']]); ?>


                    <?php /* product brief */ ?>
                    <?php echo FormHelper::textarea('Tóm tắt', 'brief', null, ['input' => ['required', 'rows' => '3']]); ?>


                    <?php /* product category id */ ?>
                    <?php echo FormHelper::select('Nhóm', 'product_category_id', $category_lists, isset($product) ? $product->categories->pluck('id')->toArray() : null, ['input' => ['id' => 'product_category', 'product_id' => isset($product) ? $product->id : '','required' ]]); ?>


                    <div class="row">
                        <div class="col-xs-6">
                            <?php /* product title */ ?>
                            <?php echo FormHelper::text('Giá mới (VNĐ)', 'price_new', null, ['input' => ['required','class'=>'mask-currency']]); ?>

                        </div>
                        <div class="col-xs-6">
                            <?php /* product title */ ?>
                            <?php echo FormHelper::text('Giá cũ (VNĐ)', 'price_old', null, ['input' => ['class'=>'mask-currency']]); ?>

                        </div>
                    </div>

                    <?php /* Tags */ ?>
                    <?php echo FormHelper::text('Tag', 'tags', isset($product) ? $product->tagLists() : null, ['input' => ['data-role' => 'tagsinput', 'multiple'], 'label' => ['style' => 'display:block']]); ?>

                </div>
                <div class="col-xs-3">
                    <?php /* Cover Image */ ?>
                    <?php echo FormHelper::imageInput('Ảnh bài viết', 'cover_image', isset($product) ? $product->getCoverImage() : null, isset($product) ? null : ['input' => ['required']]); ?>


                    <?php /* Published time */ ?>
<?php /*                    <?php echo FormHelper::text('Thời gian đăng bài', 'published_at', isset($product) ? $product->published_at->format('d/m/Y H:i') : date('d/m/Y H:i'), ['input' => ['class' => 'mask-datetime']]); ?>*/ ?>
                    <div class="form-group">
                        <label>Thời gian đăng bài</label>
                        <div class="input-group">
                            <div class="input-icon">
                                <?php echo Form::text('published_at', isset($product) ? $product->published_at->format('d/m/Y H:i') : date('d/m/Y H:i'), ['id' => 'published_at', 'class' => 'form-control', isset($product) ? '' : 'disabled']); ?>

                            </div>
                            <?php if ( ! (isset($product))): ?>
                                <span class="input-group-btn">
                                    <button class="btn btn-success click-to-enable" data-target="#published_at" type="button"> Sửa</button>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php /* product title */ ?>
                    <?php echo FormHelper::text('Sắp xếp', 'order', null, ['input' => ['class'=>'mask-currency']]); ?>


                    <?php /* Publish */ ?>
                    <?php echo FormHelper::checkbox('Đăng sản phẩm', 'publish', 1, isset($product) ? null : true, ['input' => ['default' => 0]]); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <?php /* Content */ ?>
                    <?php echo FormHelper::textarea('Nội dung sản phẩm', 'content', null, ['input' => ['required', 'class' => 'ckeditor', 'rows' => '10']]); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="option">
        <?php /*<?php if(Request::is('*edit')): ?>*/ ?>
            <?php /*<?php echo $__env->make('product::option.get-option', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>*/ ?>
        <?php /*<?php endif; ?>*/ ?>
    </div>
    <div class="tab-pane" id="option_product">
        <div>
            <?php /* total */ ?>
            <?php echo FormHelper::text('Số lượng', 'total', null, ['input' => ['style'=>'width:300px;','class'=>'mask-currency']]); ?>

            <label class="form_control">
                Thuộc tính riêng <br>
                <i>(Thuộc tính được hiển trong trang chi tiết sản phẩm)</i>
            </label>
            <div class="prescription">
               <?php if(isset($product)): ?>
                    <?php if(!empty(unserialize($product->options))): ?>
                       <?php foreach(unserialize($product->options) as $option_name=>$option_value): ?>
                            <?php echo $__env->make('product::product.partials.options-product', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                       <?php echo $__env->make('product::product.partials.options-product', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                   <?php endif; ?>
                <?php else: ?>
                    <?php echo $__env->make('product::product.partials.options-product', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
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


            <?php if(isset($product)): ?>
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
                    <?php foreach($product->imageAlbum->images as $image): ?>
                        <tr>
                            <td>
                                <a href="#" class="fancybox-button" data-rel="fancybox-button">
                                    <img class="img-responsive" src="<?php echo e($image->getLink(config('product-image.product_album.thumbnail.path'))); ?>" alt=""> </a>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="album_image_labels[<?php echo e($image->id); ?>]" value="<?php echo e($image->name); ?>"> </td>
                            <td>
                                <input type="text" class="form-control" name="album_image_orders[<?php echo e($image->id); ?>]" value="<?php echo e($image->order); ?>"> </td>

                            <td>
                                <a href="javascript:;" class="btn btn-default btn-sm delete-file" data-link="<?php echo e(route('admin.product.destroy')); ?>" data-id="<?php echo e($image->id); ?>" data-toggle="confirmation">
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