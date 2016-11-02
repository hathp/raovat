@inject('settings', 'System\Setting\Services\SettingService')

<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ (empty($page_title) ? '' : ($page_title . ' - ')) .  $settings->getValueBySlug('website-title') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:url" content="{{ URL::current() }}"/>
    <meta property="og:title" content="{!! $fb_title or $settings->getValueBySlug('og-title')  !!}"/>
    <meta property="og:description" content="{!! $fb_description or $settings->getValueBySlug('og-description') !!}"/>
    <meta property="og:site_name" content="{!! $fb_site_name or $settings->getValueBySlug('website-title') !!}"/>
    <meta property="og:image" content="{!! $fb_image or asset('/storage/setting/').$settings->getValueBySlug('og-image') !!}"/>
    <meta property="og:type" content="{!! $settings->getValueBySlug('og-type') !!}"/>

    <link rel="stylesheet" href="/assets/front/css/all.css" />
    <link rel="stylesheet" href="/assets/front/css/Common.css" />
    @yield('style')
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=1080499655354827";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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

                                <li class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quốc gia <i class="fa fa-angle-down"></i></a>

                                    <ul class="dropdown-menu" style="background: #333;">
                                        @foreach($countries as $countrie)
                                            <li><a href="{{ $countrie->setCookiesLink() }}" title="Rao vặt tại {{ $countrie->name }}"><b>{{ $countrie->name }}</b></a></li>
                                        @endforeach
                                    </ul>
                                </li>


                            </ul>
                            <ul class="nav navbar-nav navbar-right" id="login-top">
                                @if(Auth::check())
                                    <li class="dropdown">
                                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('front.classified.create') }}">Đăng tin ngay</a></li>
                                            <li><a href="{{ route('front.user.classified') }}">Tin rao vặt đã đăng</a></li>
                                            <li><a href="{{ route('front.user.edit') }}">Thông tin tài khoản</a></li>
                                            <li><a href="{{ route('front.user.password.change') }}">Thay đổi mật khẩu</a></li>
                                            <li><a href="{{ route('front.auth.logout') }}"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{ route('front.auth.register') }}"><i class="fa fa-user"></i> Đăng ký</a></li>
                                    <li><a href="javascript:;" data-toggle="modal" data-target="#user-login"><i class="fa fa-user-plus"></i> Đăng nhập</a></li>
                                    @include('front::auth.login')
                                @endif

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
            <a href="/"><img src="{{ $logo_image_link }}" class="hidden-xs">
                <img src="{{ $logo_image_link }}" class="hidden-lg hidden-md hidden-sm " ></a>
        </div>
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
            <div class="input-group stylish-input-group">
                <input type="text" class="form-control"  placeholder="Search" >
              <span class="input-group-addon">
                  <button type="submit">
                      <span class="glyphicon glyphicon-search"></span>
                  </button>
              </span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
            <a style="color: #333" href="{{ route('front.cart.index')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ hàng ({{ count(session('carts')) }})</a>
        </div>
    </div>
</div>

@yield('content')

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
                <li><img src="{{ $logo_image_link }}" style="width: 68%;  margin-top: 20px;"></li>
                <li><i class="fa fa-map-marker"></i> {{ $settings->getValueBySlug('address') }}</li>
                <li><i class="fa fa-phone"></i> Hotline: {{ $settings->getValueBySlug('tel') }}</li>
                <li><i class="fa fa-envelope"></i> {{ $settings->getValueBySlug('email') }}</li>
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

<div id="question" style="display:none; cursor: default">
    <div class="classic-popup_eb">
        <div class="classic-popup-main_eb">
            <div class="classic-popup-title_eb bg_popup">
                <div class="fl_eb logo_popup" style="width: 277px;font-size: 18px;">Chọn Quốc Gia</div>
            </div>
            <div class="classic-popup-content_eb">
                <div class="content_eb" style="padding:5px 0px 22px 0px">
                    <div class="gold-content">
                        <div id="boxSelectCity">
                            @foreach($countries as $countrie)
                                <div class="City"><a href="{{ $countrie->setCookiesLink() }}" title="Rao vặt tại {{ $countrie->name }}"><b>{{ $countrie->name }}</b></a></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/front/js/script.js"></script>
<script src="/assets/front/js/jquery.blockUI.js"></script>


@yield('script')
<script type="text/javascript">
    $(document).ready(function() {
        <?php $value_country = \Cookie::get('country');?>
        <?php if($value_country == null){ ?>
            $.blockUI({ message: $('#question'), css: { width: '275px',top: '20%' } });
        <?php }?>

//        $('#yes').click(function() {
//            // update the block message
//            $.blockUI({ message: "<h1>Remote call in progress...</h1>" });
//
//            $.ajax({
//                url: 'wait.php',
//                cache: false,
//                complete: function() {
//                    // unblock when remote call returns
//                    $.unblockUI();
//                }
//            });
//        });
//
//        $('#no').click(function() {
//            $.unblockUI();
//            return false;
//        });

    });
</script>


<script lang="javascript">(function() {var pname = ( (document.title !='')? document.title : document.querySelector('meta[property="og:title"]').getAttribute('content') );var ga = document.createElement('script'); ga.type = 'text/javascript';ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=d4c2ef3b4fd49c196692787ff82cfa54&data=eyJzc29faWQiOjE2MDI0NDAsImhhc2giOiJmMjA0OGYxNjM1YmMzNGNkNTg5MzA5M2MzNWQ3Nzg4MyJ9&pname='+pname;var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script><noscript><a href="http://www.vatgia.com" title="vatgia.com" target="_blank">Tài trợ bởi vatgia.com</a></noscript><noscript><a href="http://vchat.vn" title="vchat.vn" target="_blank">Phát triển bởi vchat.vn</a></noscript>


<!-- Go to www.addthis.com/dashboard to customize your tools -->
</body>
</html>