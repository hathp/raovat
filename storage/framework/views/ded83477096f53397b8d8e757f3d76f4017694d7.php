 

<?php $__env->startSection('content'); ?>
    <div class="container-fluid" id="cat-banner" style="background-image: url(<?php echo e(asset($classifieds->categories->first()->getBanner())); ?>)">
        <div class="container">
            <div class="div-ba">
                <a href="#" class="big-a">
                    <?php echo e($classifieds->categories->first()->name); ?>

                </a>
            </div>
            <div class="clearfix"></div>
            <ol class="breadcrumb">
                <li><a href="#">Chuyên mục</a></li>
                <li class="active"><?php echo e($classifieds->categories->first()->name); ?></li>
            </ol>
        </div>
    </div>
    <!--  -->
    <div class="container-fluid" id="cat-cont">
        <!--  -->
        <div class="container cat-top">
            <div class="col-xs-12 select-cat">
                <form class="form-inline">
                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-addon">Đăng:</div>
                            <select class="form-control">
                                <option>Tat ca</option>
                                <option>Tat ca</option>
                                <option>Tat ca</option>
                                <option>Tat ca</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 select-cat">
                <form class="form-inline">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">Xếp theo:</div>
                            <select class="form-control">
                                <option>Đánh giá</option>
                                <option>Đánh giá</option>
                                <option>Đánh giá</option>
                                <option>Đánh giá</option>
                                <option>Đánh giá</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-xs-12 canh-bao">
                <i class="fa fa-bell" aria-hidden="true"></i> Cảnh báo vé máy bay
            </div>

            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 pull-right cat-tright">
                <a href="<?php echo e(route('front.classified.create')); ?>">đăng tin ngay</a>
            </div>
        </div>

        <!--  -->

        <div class="container cat-contite" >
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" style="padding-left: 0;">
                <div class="deatail-cont">
                    <div class="topdecont" >
                        <h2><?php echo e($classifieds->name); ?></h2>
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 tdc-1"  >
                            <p style="font-size:2em;"> <i class="fa fa-clock-o"></i></p>
                            <p><?php echo e($classifieds->created_at->format('H:i')); ?> | <?php echo e($classifieds->created_at->format('d/m/Y')); ?></p>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3  tdc-2" >
                            <p style="font-size:2em;"> <i class="fa fa-eye"></i> </p>
                            <p><?php echo e($classifieds->view_counter); ?> luot xem</p>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2  tdc-3" >
                            <p style="font-size:2em;"> Mã tin</p>
                            <p><?php echo e($classifieds->code); ?></p>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4  tdc-4">
                            <?php if($classifieds->email): ?>
                                <p style="font-size:1.4em ;     margin-top: 6px; color:#275DA3"> <i class="fa fa-user"></i> <?php echo e($classifieds->email); ?></p>
                            <?php endif; ?>
                            <?php if($classifieds->mobile): ?>
                                <p style="font-size:1.4em; color: #D3002D"><i class="fa fa-phone"></i> <?php echo e($classifieds->mobile); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <!--  -->
                    <div class="conde">
                        <?php if ( ! (empty($classifieds->image))): ?>
                            <img src="<?php echo e($classifieds->getImage()); ?>" >
                        <?php endif; ?>
                        <?php echo $classifieds->content; ?>

                    </div>

                    <h3>Chia sẻ và Đánh giá</h3>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 sns-cont">

                        <ul>

                            <li class="pull-left">
                                <a href="#"><span class="badges"> <i class="fa fa-facebook"></i> </span></a>
                            </li>
                            <li class="pull-left">
                                <a href="#"><span class="badges"> <i class="fa fa-tumblr"></i> </span></a>
                            </li>
                            <li class="pull-left">
                                <a href="#"><span class="badges"> <i class="fa fa-pinterest-p"></i> </span></a>
                            </li>

                            <li class="pull-left">
                                <a href="#"><span class="badges"> <i class="fa fa-twitter"></i></span></a>
                            </li>
                            <li class="pull-left">
                                <a href="#"><span class="badges"> <i class="fa fa-youtube"></i> </span></a>
                            </li>
                            <li class="pull-left">
                                <a href="#"><span class="badges"> <i class="fa fa-linkedin"></i> </span></a>
                            </li>
                            <li class="pull-left">
                                <a href="#"><span class="badges"> <i class="fa fa-vimeo"></i> </span></a>
                            </li>
                            <li class="pull-left">
                                <a href="#"><span class="badges"> <i class="fa fa-google-plus"></i> </span></a>
                            </li>
                        </ul>


                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">


                        <div class="rating pull-right" style="margin-right:15px" >
                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                        </div> </div>
                    <div class="clearfix"></div>
                </div>

            </div>

            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  det-rightbar" id="content-news">
                <h3>tin nổi bật</h3>
                <!--  -->
                <?php foreach($classifieds->otherHot() as $classifieds): ?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 item-cont">
                    <h4><a href="<?php echo e(route('front.classified.show', $classifieds->slug)); ?>"><?php echo e($classifieds->name); ?></a></h4>
                    <img src="<?php echo e($classifieds->getImage('thumbnail')); ?>">
                    <div class="ritem">
                        <p class="price"><?php echo e($classifieds->getPrice()); ?></p>
                        <p class="status-item">Villa for sale</p>
                        <p class="more-item"><a href="#">Chi tiết >></a></p>

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
                <?php endforeach; ?>



                <div class="clearfix"></div>
                <!--  -->
                <div class="de-imgright">
                    <img src="http://i.imgur.com/kA46iLF.jpg" class="thumbnail">

                    <img src="https://www.vietnamairlines.com/~/media/Images/Home%20Banner/NewCI-Anh.ashx?h=350&la=en&w=450" class="thumbnail">

                    <img src="https://i.ytimg.com/vi/zG_Q50JDeLo/maxresdefault.jpg" class="thumbnail">
                </div>
            </div>
            <!--  -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 itm-bottom">
                <h3>Tin cùng chuyên mục</h3>
                <!--  -->
                <?php foreach($classifieds->getOther() as $classifieds): ?>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 item-cont">
                            <h4><a href="<?php echo e(route('front.classified.show', $classifieds->slug)); ?>"><?php echo e($classifieds->name); ?></a></h4>
                            <img src="<?php echo e($classifieds->getImage('thumbnail')); ?>">
                            <div class="ritem">
                                <p class="price"><?php echo e($classifieds->getPrice()); ?></p>
                                <p class="status-item"><?php echo e($classifieds->categories->first()->name); ?></p>
                                <p class="more-item"><a href="#">Chi tiết >></a></p>

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
                <!--  -->
            </div>
            <!-- ---------------------- -->
        </div>
    </div>

    <!-- Categories -->
    <!--  -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make($package_name .'::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>