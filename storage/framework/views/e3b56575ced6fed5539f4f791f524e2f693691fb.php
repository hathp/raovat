<?php $__env->startSection('link'); ?>
    <link href="<?php echo e(asset('assets/front/css/easy-responsive-tabs.css')); ?>" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/front/css/etalage.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content-bottom'); ?>
<div class="wrap">
    <div class="preview-page">
        <div class="section group">
            <div class="cont-desc span_1_of_2">
                <?php echo $__env->make('front::block.backlink', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="product-details">
                    <div class="grid images_3_of_2">
                        <ul id="etalage">
                            <li>
                                <a href="<?php echo e($product->getCoverImageLarge()); ?>">
                                    <img class="etalage_thumb_image" src="<?php echo e($product->getCoverImageLarge()); ?>" />
                                    <img class="etalage_source_image" src="<?php echo e($product->getCoverImageLarge()); ?>" title="" />
                                </a>
                            </li>
                            <?php foreach($product->imageAlbum->images as $image): ?>
                                <li>
                                    <img class="etalage_thumb_image" src="<?php echo e($image->getLink(config('product-image.product_album.default.path'))); ?>"  />
                                    <img class="etalage_source_image" src="<?php echo e($image->getLink(config('product-image.product_album.default.path'))); ?>" title="" />
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    </div>
                    <div class="desc span_3_of_2">
                        <h2><?php echo e($product->title); ?> </h2>
                        <p><?php echo e($product->brief); ?></p>
                        <div class="price">
                            <p>Giá: <span>
                                    <?php if($product->price_new != 0 ): ?>
                                        <?php echo e(number_format($product->price_new)); ?> VNĐ
                                    <?php else: ?>
                                        Liên hệ
                                    <?php endif; ?>
                                </span></p>
                        </div>

                        <div class="available">
                            <ul>
                                <?php if(!empty(unserialize($product->options))): ?>
                                    <?php foreach(unserialize($product->options) as $nameOption=>$valueOption): ?>
                                        <li><span><?php echo e($nameOption); ?>:</span> &nbsp; <?php echo e($valueOption); ?></li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>

                    </div>
                    <div class="clear"></div>
                </div>
                <div class="product_desc">
                    <div id="horizontalTab">
                        <ul class="resp-tabs-list">
                            <li>Thuộc tính sản phẩm</li>
                            <li>Mô tả sản phẩm</li>
                            <div class="clear"></div>
                        </ul>
                        <div class="resp-tabs-container">

                            <div class="product-specifications">
                                <?php foreach($optionProduct as $option): ?>
                                <?php echo e($option->name); ?>

                                <ul>
                                    <?php foreach($option->option as $value): ?>
                                        <li><span class="specification-heading"><?php echo e($value->name); ?></span> <span><?php echo e($value->value); ?></span><div class="clear"></div></li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php endforeach; ?>
                            </div>
                            <div class="product-tags">
                                <p><?php echo $product->content; ?></p>
                                <h4>Product Tags:</h4>
                                <div class="input-box">
                                    <?php foreach($product->tags as $tag): ?>
                                        <a href="<?php echo e($product->getTagLink().'?tag='.$tag->id); ?>"><?php echo e($tag->name); ?></a>,
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('front::block.popular-product', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
</div>


<div class="content_top">
    <div class="wrap">
        <h3>Sản phẩm cùng loại</h3>
    </div>
    <div class="line"> </div>
    <div class="wrap">
        <div class="ocarousel_slider">
            <div class="ocarousel example_photos" data-ocarousel-perscroll="3">
                <div class="ocarousel_window">
                    <?php foreach($list as $item): ?>
                        <a href="<?php echo e($item->getViewLink()); ?>" title="<?php echo e($item->title); ?>"> <img src="<?php echo e($item->getCoverImage()); ?>" alt="<?php echo e($item->title); ?>" /><p><?php echo e($item->title); ?></p></a>
                    <?php endforeach; ?>
                </div>
                       <span>
                        <a href="#" data-ocarousel-link="left" style="float: left;" class="prev"> </a>
                        <a href="#" data-ocarousel-link="right" style="float: right;" class="next"> </a>
                       </span>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('front::product.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>