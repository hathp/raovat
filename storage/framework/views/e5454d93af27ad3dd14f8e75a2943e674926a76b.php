
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" type="text/css" href="/assets/front/plugins/rating/css/star-rating-svg.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <style>
        #cke_1_contents{
            height: 100px  !important;
        }
    </style>
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

                        <?php foreach($classifieds->files as $file): ?>
                            <img src="<?php echo e($file->getImage()); ?>" >
                        <?php endforeach; ?>
                    </div>
                    <h3>Chia sẻ và Đánh giá</h3>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 sns-cont">
                        <ul>
							<div class="fb-like" data-href="<?php echo e(URL::current()); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                          
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">

                        <div class="my-rating jq-stars"></div>
                        <?php /*<div class="rating pull-right" style="margin-right:15px" >*/ ?>
                            <?php /*<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>*/ ?>
                        <?php /*</div>*/ ?>
                    </div>
                    <div class="clearfix"></div>
					 <h3>Bình luận facebook</h3>
					 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 sns-cont" style="    margin-left: 28px; ">
                        <div class="fb-comments" data-href="<?php echo e(URL::current()); ?>" data-width="789" data-numposts="15"></div>
                    </div>
					<div class="clearfix"></div>
					<hr>
                    <h3>Bình luận thành viên</h3>
					<?php echo $__env->make('front::classified.partials.list-comment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php if(Auth::user()): ?>
                        <div  style="margin-left: 28px;margin-right: 28px;">
                            <form id="contactForm"  class="show_box_comment" action="<?php echo e(route('front.comment.comment')); ?>" method="post">
                                <?php echo csrf_field(); ?>

                                <div style="width: 90px;float: left;height: 90px;" ><a href="#"><img src="<?php echo e(Auth::user()->getAvatarImage()); ?>" alt="" style="width: 90px;"></a></div>
                                <div class="form-group" style="    width: 693px;margin-left: 100px;">
                                    <textarea class="form-control ckeditor" id="message" name="message" ></textarea>
                                </div>
                                <input type="hidden" name='page_id' value="<?php echo e($classifieds->id); ?>">
                                <input type="hidden" name='table' value="pages">
                                <input type="hidden" name='parent_id' value=''>
                                <div class="form-group" style="    padding-left: 100px;">
                                    <button type="submit" class="btn btn-primary" >Gửi trả lời</button>
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>

            </div>

            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  det-rightbar" id="content-news">
                <h3>tin nổi bật</h3>
                <!--  -->
                <?php foreach($classifieds->otherHot() as $classified): ?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 item-cont">
                    <h4><a href="<?php echo e(route('front.classified.show', $classified->slug)); ?>"><?php echo e($classified->name); ?></a></h4>
                    <img src="<?php echo e($classified->getImage('thumbnail')); ?>">
                    <div class="ritem">
                        <p class="price"><?php echo e($classified->getPrice()); ?></p>
                        <p class="status-item">Villa for sale</p>
                        <p class="more-item"><a href="#">Chi tiết >></a></p>


                        <div class="rating">
                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="bitem">
                        <i class="fa fa-clock-o"></i> <?php echo e($classified->created_at->diffForHumans()); ?>

                        <i class="fa fa-eye"></i> <?php echo e($classified->view_counter); ?> lượt xem
                        <?php if($classified->mobile): ?>
                            <i class="fa fa-phone"></i> <?php echo e($classified->mobile); ?>

                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>



                <div class="clearfix"></div>
                <!--  -->
                <?php /*<div class="de-imgright">*/ ?>
                    <?php /*<img src="http://i.imgur.com/kA46iLF.jpg" class="thumbnail">*/ ?>

                    <?php /*<img src="https://www.vietnamairlines.com/~/media/Images/Home%20Banner/NewCI-Anh.ashx?h=350&la=en&w=450" class="thumbnail">*/ ?>

                    <?php /*<img src="https://i.ytimg.com/vi/zG_Q50JDeLo/maxresdefault.jpg" class="thumbnail">*/ ?>
                <?php /*</div>*/ ?>
            </div>
            <!--  -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 itm-bottom">
                <h3>Tin cùng chuyên mục</h3>
                <!--  -->
                <?php foreach($classifieds->getOther() as $classified): ?>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 item-cont">
                            <h4><a href="<?php echo e(route('front.classified.show', $classified->slug)); ?>"><?php echo e($classified->name); ?></a></h4>
                            <img src="<?php echo e($classified->getImage('thumbnail')); ?>">
                            <div class="ritem">
                                <p class="price"><?php echo e($classified->getPrice()); ?></p>
                                <p class="status-item"><?php echo e($classified->categories->first()->name); ?></p>
                                <p class="more-item"><a href="#">Chi tiết >></a></p>

                                <div class="rating">
                                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="bitem">
                                <i class="fa fa-clock-o"></i> <?php echo e($classified->created_at->diffForHumans()); ?>

                                <i class="fa fa-eye"></i> <?php echo e($classified->view_counter); ?> lượt xem
                                <?php if($classified->mobile): ?>
                                    <i class="fa fa-phone"></i> <?php echo e($classified->mobile); ?>

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
<?php $__env->startSection('script'); ?>

    <script>
        $(function() {

            $(".my-rating").starRating({
                initialRating: '<?php echo e($classifieds->raty); ?>',
                starSize: 25,
                callback: function(currentRating, $el){
                    // make a server call here
                    $.ajax({
                        url: '<?php echo e(route('front.user.classified.raty')); ?>',
                        type: 'POST',
                        data: {'classifieds_id':'<?php echo e($classifieds->id); ?>','classifieds_score':currentRating,'_token': $('meta[name="csrf-token"]').attr('content')},
                        dataType: 'json',
                        success: function(data)
                        {
                            console.log(data);
                            alert(data.msg);
                        }
                    });
                }
            });
        });
    </script>
    <script src="/assets/front/plugins/rating/jquery.star-rating-svg.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/front/js/comment.js')); ?>"></script>
    <script src="/assets/front/plugins/ckeditor/ckeditor.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($package_name .'::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>