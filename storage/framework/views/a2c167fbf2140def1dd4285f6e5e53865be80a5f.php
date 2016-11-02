<?php $__env->startSection('content'); ?>
    <div class="tab-pane" id="tab_1_3">
        <div class="row profile-account">
            <div class="col-md-3">
                <ul class="ver-inline-menu tabbable margin-bottom-10">
                    <li class="active">
                        <a data-toggle="tab" href="#tab_1-1">
                            <i class="fa fa-cog"></i> Nội Dung </a>
                        <span class="after"> </span>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab_2-2">
                            <i class="fa fa-picture-o"></i> Thư Viện Ảnh </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab_3-3">
                            <i class="fa fa-lock"></i> Thẻ Meta </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab_4-4">
                            <i class="fa fa-eye"></i> Thuộc Tính </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div id="tab_1-1" class="tab-pane active">
                            <div class="form-group">
                                <label class="control-label">Tiêu Đề: </label>
                                <?php echo e($product->title); ?> </div>
                            <div class="form-group">
                                <label class="control-label">Tóm Tắt: </label>
                                <?php echo e($product->brief); ?></div>
                            <div class="form-group">
                                <label class="control-label">Danh Mục: </label>
                                <?php foreach($product->categories as $category): ?>
                                    <a href=""><?php echo e($category->getName()); ?></a>
                                <?php endforeach; ?></div>
                            <div class="form-group">
                                <label class="control-label">Giá Mới: </label>
                                <label class="font-red"><?php echo e(number_format($product->price_new)); ?> VNĐ </label></div>
                            <div class="form-group">
                                <label class="control-label">Giá Cũ: </label>
                                <?php echo e(number_format($product->price_old)); ?> VNĐ</div>
                            <div class="form-group">
                                <label class="control-label">Tag: </label>
                                <?php echo e($product->tagLists()); ?></div>
                            <div class="form-group">
                                <label class="control-label">Nội Dung: </label>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_1"> <?php echo e($product->title); ?> </a>
                                        </h4>
                                    </div>
                                    <div id="accordion1_1" class="panel-collapse collapse in">
                                        <div class="panel-body"> <?php echo $product->content; ?></div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div id="tab_2-2" class="tab-pane">
                        <p>Ảnh Đại Diện: </p>
                        <div class="form-group">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="<?php echo e($product->getCoverImage()); ?>" alt="" /> </div>
                            </div>
                        </div>

                        <p>Thư viện ảnh: </p>
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
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                    <div id="tab_3-3" class="tab-pane">
                            <div class="form-group">
                                <label class="control-label">Thẻ Tiêu Đề: </label>
                                <?php echo e($product->meta_title); ?> </div>
                            <div class="form-group">
                                <label class="control-label">Thẻ Từ Khóa</label>
                                <?php echo e($product->meta_keyword); ?> </div>
                            <div class="form-group">
                                <label class="control-label">Thẻ Miêu Tả</label>
                                <?php echo e($product->meta_description); ?> </div>
                    </div>
                    <div id="tab_4-4" class="tab-pane">

                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.. </td>
                                    <td>
                                        <label class="uniform-inline">
                                            <input type="radio" name="optionsRadios1" value="option1" /> Yes </label>
                                        <label class="uniform-inline">
                                            <input type="radio" name="optionsRadios1" value="option2" checked/> No </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                    <td>
                                        <label class="uniform-inline">
                                            <input type="checkbox" value="" /> Yes </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                    <td>
                                        <label class="uniform-inline">
                                            <input type="checkbox" value="" /> Yes </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                    <td>
                                        <label class="uniform-inline">
                                            <input type="checkbox" value="" /> Yes </label>
                                    </td>
                                </tr>
                            </table>

                    </div>
                </div>
            </div>
            <!--end col-md-9-->
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('product::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>