<?php $settings = app('System\Setting\Services\SettingService'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo e((empty($page_title) ? '' : ($page_title . ' - ')) .  $settings->getValueBySlug('website-title')); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <meta property="og:url" content="<?php echo e(isset($fb_url) ? $fb_url : $settings->getValueBySlug('og-url')); ?>"/>
    <meta property="og:title" content="<?php echo isset($fb_title) ? $fb_title : $settings->getValueBySlug('og-title'); ?>"/>
    <meta property="og:description" content="<?php echo isset($fb_description) ? $fb_description : $settings->getValueBySlug('og-description'); ?>"/>
    <meta property="og:site_name" content="<?php echo isset($fb_site_name) ? $fb_site_name : $settings->getValueBySlug('website-title'); ?>"/>
    <meta property="og:image" content="<?php echo isset($fb_image) ? $fb_image : $settings->getValueBySlug('og-image'); ?>"/>
    <meta property="og:type" content="<?php echo $settings->getValueBySlug('og-type'); ?>"/>

    <link rel="stylesheet" href="/assets/front/css/all.css" />

    <?php echo $__env->yieldContent('style'); ?>
</head>
<body>

<!--  -->
<div class="container-fluid" id="nav-top">
    <div class="container">
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 sns">
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

        <!--  -->
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 navbar-top pull-right">
            <nav class="navbar">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#nav-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="nav-1">
                            <ul class="nav navbar-nav navbar-left">
                                <li><a href="#">Đăng tin ưu tiên</a></li>
                                <li><a href="#">Hỏi & Đáp</a></li>
                                <li><a href="#">Hỗ Trợ</a></li>
                                <li><a href="#">Mua quảng cáo</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right" id="login-top">
                                <?php if(Auth::check()): ?>
                                    <li class="dropdown">
                                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo e(Auth::user()->name); ?></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo e(route('front.classified.create')); ?>">Đăng tin ngay</a></li>
                                            <li><a href="<?php echo e(route('front.user.classified')); ?>">Tin rao vặt đã đăng</a></li>
                                            <li><a href="<?php echo e(route('front.user.edit')); ?>">Thông tin tài khoản</a></li>
                                            <li><a href="<?php echo e(route('front.user.password.change')); ?>">Thay đổi mật khẩu</a></li>
                                            <li><a href="<?php echo e(route('front.auth.logout')); ?>"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                <?php else: ?>
                                    <li><a href="<?php echo e(route('front.auth.register')); ?>"><i class="fa fa-user"></i> Đăng ký</a></li>
                                    <li><a href="javascript:;" data-toggle="modal" data-target="#user-login"><i class="fa fa-user-plus"></i> Đăng nhập</a></li>
                                    <?php echo $__env->make('front::auth.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php endif; ?>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div>
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>
</div>
<!--  -->
<div class="container-fluid" id="logo-search">
    <div class="container">
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" id="logo-top">
            <a href="/"><img src="<?php echo e($logo_image_link); ?>" class="hidden-xs">
                <img src="<?php echo e($logo_image_link); ?>" class="hidden-lg hidden-md hidden-sm " ></a>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <div class="input-group stylish-input-group">
                <input type="text" class="form-control"  placeholder="Search" >
              <span class="input-group-addon">
                  <button type="submit">
                      <span class="glyphicon glyphicon-search"></span>
                  </button>
              </span>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->yieldContent('content'); ?>

<div class="container-fluid" id="subscribe">
    <div class="container">
        <div class="col-xs-12  col-sm-3  col-md-3  col-lg-3 ">
            <h1>Subscribe</h1>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <div class="input-group stylish-input-group">
                <input type="text" class="form-control"  placeholder="Tìm kiếm" >
              <span class="input-group-addon">
                  <button type="submit">
                      SUBSCRIBE
                  </button>
              </span>
            </div>
        </div>
    </div>
</div>
<!--  -->

<div class="container-fluid" id="nav-bottom">
    <div class="container">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="row">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#nav-3" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>

                        </button>

                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="nav-3">
                        <ul class="nav navbar-nav">
                            <li><a href="#">Quy chế</a></li>
                            <li><a href="#">Quy định chung</a></li>
                            <li><a href="#">Chính sách bảo mật</a></li>
                            <li><a href="#">Liên hệ quảng cáo</a></li>
                            <li><a href="#">Hỏi & đáp</a></li>
                            <li><a href="#">Rss</a></li>
                            <li><a href="#">Site map</a></li>
                        </ul>

                    </div><!-- /.navbar-collapse -->
                </div>
            </div><!-- /.container-fluid -->
        </nav>

    </div>
</div>
<!--  -->
<div class="container-fluid" id="footer">
    <div class="container" >
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="footer-col1">
            <ul>
                <li><img src="<?php echo e($logo_image_link); ?>" style="width: 68%;  margin-top: 20px;"></li>
                <li><i class="fa fa-map-marker"></i> <?php echo e($settings->getValueBySlug('address')); ?></li>
                <li><i class="fa fa-phone"></i> Hotline: <?php echo e($settings->getValueBySlug('tel')); ?></li>
                <li><i class="fa fa-envelope"></i> <?php echo e($settings->getValueBySlug('email')); ?></li>
            </ul>

        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="footer-col2">
            <ul>
                <li><h3>CHUYÊN MỤC CHÍNH</h3></li>
                <li>

                </li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="footer-col3">
            <ul>
                <li><h3>LIÊN KẾT VỚI CHÚNG TÔI</h3></li>
                <li class="pull-left">
                    <a href="#"><span class="badge"> <i class="fa fa-facebook"></i> </span></a>
                </li>
                <li class="pull-left">
                    <a href="#"><span class="badge"> <i class="fa fa-twitter"></i></span></a>
                </li>
                <li class="pull-left">
                    <a href="#"><span class="badge"> <i class="fa fa-dribbble"></i> </span></a>
                </li>


            </ul>
        </div>
    </div>
</div>

<script src="/assets/front/js/script.js"></script>
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>