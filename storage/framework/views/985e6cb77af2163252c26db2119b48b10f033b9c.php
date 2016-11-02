<?php $__env->startSection('content'); ?>
    <!--  -->
    <div class="container-fluid" id="tit-leftbar">
        <div class="container">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <h2>lựa chọn chuyên mục</h2>
            </div>
        </div>
    </div>
    <!--  -->
    <div class="container-fluid" id="leftbar-slideshow">
        <div class="container">
            <!-- /navbar -->
            <?php echo $__env->make($package_name. '::partials.category', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- slide -->
            <?php echo $__env->make($package_name. '::partials.slide', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>

    <!--  -->
    <div class="container-fluid" id="banner-postnews">

        <div class="container">


            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 btn-banner-left">
                <a href="<?php echo e(route('front.classified.create')); ?>">đăng tin rao vặt miễn phí</a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 btn-banner-right">
                <a href="<?php echo e(route('front.classified.create')); ?>">đăng tin ngay</a>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container-fluid" id="content-news">
        <div class="container">
            <h1>các tin rao vặt mới nhất</h1>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">Tất cả</a></li>
                <li role="presentation"><a href="#hot-day" aria-controls="hot-day" role="tab" data-toggle="tab">Xem nhiều trong ngày</a></li>
                <li role="presentation"><a href="#hot-week" aria-controls="hot-day" role="tab" data-toggle="tab">Xem nhiều trong tuần</a></li>

            </ul>
            <!-- /Nav tabs -->
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="all">

                    <?php foreach($all_classifieds as $classifieds): ?>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 item-cont">
                                <h4><a href="<?php echo e(route('front.classified.show', $classifieds->slug)); ?>"><?php echo e($classifieds->name); ?></a></h4>
                                <img style="width:150px; height: 102px" src="<?php echo e($classifieds->getImage('thumbnail')); ?>">
                                <div class="ritem">
                                    <p class="price"><?php echo e($classifieds->getPrice()); ?></p>
                                    <p class="status-item"><?php echo e($classifieds->categories->first()->name); ?></p>
                                    <?php if($classifieds->isOrderable()): ?>
                                        <p class="more-item"><a href="<?php echo e(route('front.cart.add', $classifieds->id)); ?>">Thêm vào giỏ hàng <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></p>
                                    <?php else: ?>
                                        <p class="more-item"><a href="<?php echo e(route('front.classified.show', $classifieds->slug)); ?>">Chi tiết >></a></p>
                                    <?php endif; ?>

                                    <div class="rating">
                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="bitem">
                                    <i class="fa fa-clock-o"></i> <?php echo e($classifieds->created_at->diffForHumans()); ?>

                                    <i class="fa fa-eye"></i> <?php echo e($classifieds->view_counter); ?> lượt xem
                                    <?php if($classifieds->mobile): ?>
                                        <i class="fa fa-phone"></i> <?php echo e($classifieds->mobile); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

                <div role="tabpanel" class="tab-pane" id="hot-day">
                    <?php foreach($hot_day_classifieds as $classifieds): ?>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 item-cont">
                                <h4><a href="<?php echo e(route('front.classified.show', $classifieds->slug)); ?>"><?php echo e($classifieds->name); ?></a></h4>
                                <img src="<?php echo e($classifieds->getImage('thumbnail')); ?>">
                                <div class="ritem">
                                    <p class="price"><?php echo e($classifieds->getPrice()); ?></p>
                                    <p class="status-item"><?php echo e($classifieds->categories->first()->name); ?></p>
                                    <?php if($classifieds->isOrderable()): ?>
                                        <p class="more-item"><a href="<?php echo e(route('front.cart.add', $classifieds->id)); ?>">Thêm vào giỏ hàng <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></p>
                                    <?php else: ?>
                                        <p class="more-item"><a href="<?php echo e(route('front.classified.show', $classifieds->slug)); ?>">Chi tiết >></a></p>
                                    <?php endif; ?>

                                    <div class="rating">
                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="bitem">
                                    <i class="fa fa-clock-o"></i> <?php echo e($classifieds->created_at->diffForHumans()); ?>

                                    <i class="fa fa-eye"></i> <?php echo e($classifieds->view_counter); ?> lượt xem
                                    <?php if($classifieds->mobile): ?>
                                        <i class="fa fa-phone"></i> <?php echo e($classifieds->mobile); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div role="tabpanel" class="tab-pane" id="hot-week">
                    <?php foreach($hot_week_classifieds as $classifieds): ?>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 item-cont">
                                <h4><a href="<?php echo e(route('front.classified.show', $classifieds->slug)); ?>"><?php echo e($classifieds->name); ?></a></h4>
                                <img src="<?php echo e($classifieds->getImage('thumbnail')); ?>">
                                <div class="ritem">
                                    <p class="price"><?php echo e($classifieds->getPrice()); ?></p>
                                    <p class="status-item"><?php echo e($classifieds->categories->first()->name); ?></p>
                                    <?php if($classifieds->isOrderable()): ?>
                                        <p class="more-item"><a href="<?php echo e(route('front.cart.add', $classifieds->id)); ?>">Thêm vào giỏ hàng <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></p>
                                    <?php else: ?>
                                        <p class="more-item"><a href="<?php echo e(route('front.classified.show', $classifieds->slug)); ?>">Chi tiết >></a></p>
                                    <?php endif; ?>

                                    <div class="rating">
                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="bitem">
                                    <i class="fa fa-clock-o"></i> <?php echo e($classifieds->created_at->diffForHumans()); ?>

                                    <i class="fa fa-eye"></i> <?php echo e($classifieds->view_counter); ?> lượt xem
                                    <?php if($classifieds->mobile): ?>
                                        <i class="fa fa-phone"></i> <?php echo e($classifieds->mobile); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- /Tab panes -->
        </div>
    </div>

    <!--  -->
    <div class="container-fluid" id="banner-bottom">
        <div class="container">
            <img src="<?php echo e($logo_image_link); ?>">
            <h1>
                Web rao vặt, mua bán cho cộng đồng Việt tại Châu Âu
            </h1>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php if ( ! (empty(session('need_to_login')))): ?>
        <script>
            $('#user-login').modal();
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($package_name .'::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>