@extends($package_name .'::layout.main')

@section('content')
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
            @include($package_name. '::partials.category')
            <!-- slide -->
            @include($package_name. '::partials.slide')
        </div>
    </div>

    <!--  -->
    <div class="container-fluid" id="banner-postnews">

        <div class="container">


            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 btn-banner-left">
                <a href="{{ route('front.classified.create') }}">đăng tin rao vặt miễn phí</a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 btn-banner-right">
                <a href="{{ route('front.classified.create') }}">đăng tin ngay</a>

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

                    @foreach($all_classifieds as $classifieds)
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 item-cont">
                                <h4><a href="{{ route('front.classified.show', $classifieds->slug) }}">{{ $classifieds->name }}</a></h4>
                                <img style="width:150px; height: 102px" src="{{ $classifieds->getImage('thumbnail') }}">
                                <div class="ritem">
                                    <p class="price">{{ $classifieds->getPrice() }}</p>
                                    <p class="status-item">{{ $classifieds->categories->first()->name }}</p>
                                    @if($classifieds->isOrderable())
                                        <p class="more-item"><a href="{{ route('front.cart.add', $classifieds->id) }}">Thêm vào giỏ hàng <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></p>
                                    @else
                                        <p class="more-item"><a href="{{ route('front.classified.show', $classifieds->slug) }}">Chi tiết >></a></p>
                                    @endif

                                    <div class="rating">
                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="bitem">
                                    <i class="fa fa-clock-o"></i> {{ $classifieds->created_at->diffForHumans() }}
                                    <i class="fa fa-eye"></i> {{ $classifieds->view_counter }} lượt xem
                                    @if($classifieds->mobile)
                                        <i class="fa fa-phone"></i> {{ $classifieds->mobile }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div role="tabpanel" class="tab-pane" id="hot-day">
                    @foreach($hot_day_classifieds as $classifieds)
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 item-cont">
                                <h4><a href="{{ route('front.classified.show', $classifieds->slug) }}">{{ $classifieds->name }}</a></h4>
                                <img src="{{ $classifieds->getImage('thumbnail') }}">
                                <div class="ritem">
                                    <p class="price">{{ $classifieds->getPrice() }}</p>
                                    <p class="status-item">{{ $classifieds->categories->first()->name }}</p>
                                    @if($classifieds->isOrderable())
                                        <p class="more-item"><a href="{{ route('front.cart.add', $classifieds->id) }}">Thêm vào giỏ hàng <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></p>
                                    @else
                                        <p class="more-item"><a href="{{ route('front.classified.show', $classifieds->slug) }}">Chi tiết >></a></p>
                                    @endif

                                    <div class="rating">
                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="bitem">
                                    <i class="fa fa-clock-o"></i> {{ $classifieds->created_at->diffForHumans() }}
                                    <i class="fa fa-eye"></i> {{ $classifieds->view_counter }} lượt xem
                                    @if($classifieds->mobile)
                                        <i class="fa fa-phone"></i> {{ $classifieds->mobile }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div role="tabpanel" class="tab-pane" id="hot-week">
                    @foreach($hot_week_classifieds as $classifieds)
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 item-cont">
                                <h4><a href="{{ route('front.classified.show', $classifieds->slug) }}">{{ $classifieds->name }}</a></h4>
                                <img src="{{ $classifieds->getImage('thumbnail') }}">
                                <div class="ritem">
                                    <p class="price">{{ $classifieds->getPrice() }}</p>
                                    <p class="status-item">{{ $classifieds->categories->first()->name }}</p>
                                    @if($classifieds->isOrderable())
                                        <p class="more-item"><a href="{{ route('front.cart.add', $classifieds->id) }}">Thêm vào giỏ hàng <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></p>
                                    @else
                                        <p class="more-item"><a href="{{ route('front.classified.show', $classifieds->slug) }}">Chi tiết >></a></p>
                                    @endif

                                    <div class="rating">
                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="bitem">
                                    <i class="fa fa-clock-o"></i> {{ $classifieds->created_at->diffForHumans() }}
                                    <i class="fa fa-eye"></i> {{ $classifieds->view_counter }} lượt xem
                                    @if($classifieds->mobile)
                                        <i class="fa fa-phone"></i> {{ $classifieds->mobile }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- /Tab panes -->
        </div>
    </div>

    <!--  -->
    <div class="container-fluid" id="banner-bottom">
        <div class="container">
            <img src="{{ $logo_image_link }}">
            <h1>
                Web rao vặt, mua bán cho cộng đồng Việt tại Châu Âu
            </h1>
        </div>
    </div>
@endsection

@section('script')
    @unless(empty(session('need_to_login')))
        <script>
            $('#user-login').modal();
        </script>
    @endunless
@endsection