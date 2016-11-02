@extends($package_name .'::layout.main')
@section('style')
    <link rel="stylesheet" type="text/css" href="/assets/front/plugins/rating/css/star-rating-svg.css">
@endsection
@section('content')
    <style>
        #cke_1_contents{
            height: 100px  !important;
        }
    </style>
    <div class="container-fluid" id="cat-banner" style="background-image: url({{ asset($classifieds->categories->first()->getBanner()) }})">
        <div class="container">
            <div class="div-ba">
                <a href="#" class="big-a">
                    {{ $classifieds->categories->first()->name }}
                </a>
            </div>
            <div class="clearfix"></div>
            <ol class="breadcrumb">
                <li><a href="#">Chuyên mục</a></li>
                <li class="active">{{ $classifieds->categories->first()->name }}</li>
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
                <a href="{{ route('front.classified.create') }}">đăng tin ngay</a>
            </div>
        </div>

        <!--  -->

        <div class="container cat-contite" >
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" style="padding-left: 0;">
                <div class="deatail-cont">
                    <div class="topdecont" >
                        <h2>{{ $classifieds->name }}</h2>
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 tdc-1"  >
                            <p style="font-size:2em;"> <i class="fa fa-clock-o"></i></p>
                            <p>{{ $classifieds->created_at->format('H:i') }} | {{ $classifieds->created_at->format('d/m/Y') }}</p>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3  tdc-2" >
                            <p style="font-size:2em;"> <i class="fa fa-eye"></i> </p>
                            <p>{{ $classifieds->view_counter }} luot xem</p>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2  tdc-3" >
                            <p style="font-size:2em;"> Mã tin</p>
                            <p>{{ $classifieds->code }}</p>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4  tdc-4">
                            @if($classifieds->email)
                                <p style="font-size:1.4em ;     margin-top: 6px; color:#275DA3"> <i class="fa fa-user"></i> {{ $classifieds->email }}</p>
                            @endif
                            @if($classifieds->mobile)
                                <p style="font-size:1.4em; color: #D3002D"><i class="fa fa-phone"></i> {{ $classifieds->mobile }}</p>
                            @endif
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <!--  -->
                    <div class="conde">
                        @unless(empty($classifieds->image))
                            <img src="{{ $classifieds->getImage() }}" >
                        @endunless
                        {!! $classifieds->content !!}
                        @foreach($classifieds->files as $file)
                            <img src="{{ $file->getImage() }}" >
                        @endforeach
                    </div>
                    <h3>Chia sẻ và Đánh giá</h3>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 sns-cont">
                        <ul>
							<div class="fb-like" data-href="{{ URL::current() }}" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                          
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
                        <div class="my-rating jq-stars"></div>
                        {{--<div class="rating pull-right" style="margin-right:15px" >--}}
                            {{--<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>--}}
                        {{--</div>--}}
                    </div>
                    <div class="clearfix"></div>
					 <h3>Bình luận facebook</h3>
					 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 sns-cont" style="    margin-left: 28px; ">
                        <div class="fb-comments" data-href="{{ URL::current() }}" data-width="789" data-numposts="15"></div>
                    </div>
					<div class="clearfix"></div>
					<hr>
                    <h3>Bình luận thành viên</h3>
					@include('front::classified.partials.list-comment')
                    @if(Auth::user())
                        <div  style="margin-left: 28px;margin-right: 28px;">
                            <form id="contactForm"  class="show_box_comment" action="{{ route('front.comment.comment') }}" method="post">
                                {!! csrf_field() !!}
                                <div style="width: 90px;float: left;height: 90px;" ><a href="#"><img src="{{ Auth::user()->getAvatarImage()  }}" alt="" style="width: 90px;"></a></div>
                                <div class="form-group" style="    width: 693px;margin-left: 100px;">
                                    <textarea class="form-control ckeditor" id="message" name="message" ></textarea>
                                </div>
                                <input type="hidden" name='page_id' value="{{ $classifieds->id }}">
                                <input type="hidden" name='table' value="pages">
                                <input type="hidden" name='parent_id' value=''>
                                <div class="form-group" style="    padding-left: 100px;">
                                    <button type="submit" class="btn btn-primary" >Gửi trả lời</button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>

            </div>

            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  det-rightbar" id="content-news">
                <h3>tin nổi bật</h3>
                <!--  -->
                @foreach($classifieds->otherHot() as $classified)
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 item-cont">
                    <h4><a href="{{ route('front.classified.show', $classified->slug) }}">{{ $classified->name }}</a></h4>
                    <img src="{{ $classified->getImage('thumbnail') }}">
                    <div class="ritem">
                        <p class="price">{{ $classified->getPrice() }}</p>
                        <p class="status-item">Villa for sale</p>
                        <p class="more-item"><a href="#">Chi tiết >></a></p>


                        <div class="rating">
                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="bitem">
                        <i class="fa fa-clock-o"></i> {{ $classified->created_at->diffForHumans() }}
                        <i class="fa fa-eye"></i> {{ $classified->view_counter }} lượt xem
                        @if($classified->mobile)
                            <i class="fa fa-phone"></i> {{ $classified->mobile }}
                        @endif
                    </div>
                </div>
                @endforeach



                <div class="clearfix"></div>
                <!--  -->
                {{--<div class="de-imgright">--}}
                    {{--<img src="http://i.imgur.com/kA46iLF.jpg" class="thumbnail">--}}

                    {{--<img src="https://www.vietnamairlines.com/~/media/Images/Home%20Banner/NewCI-Anh.ashx?h=350&la=en&w=450" class="thumbnail">--}}

                    {{--<img src="https://i.ytimg.com/vi/zG_Q50JDeLo/maxresdefault.jpg" class="thumbnail">--}}
                {{--</div>--}}
            </div>
            <!--  -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 itm-bottom">
                <h3>Tin cùng chuyên mục</h3>
                <!--  -->
                @foreach($classifieds->getOther() as $classified)
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 item-cont">
                            <h4><a href="{{ route('front.classified.show', $classified->slug) }}">{{ $classified->name }}</a></h4>
                            <img src="{{ $classified->getImage('thumbnail') }}">
                            <div class="ritem">
                                <p class="price">{{ $classified->getPrice() }}</p>
                                <p class="status-item">{{ $classified->categories->first()->name }}</p>
                                <p class="more-item"><a href="#">Chi tiết >></a></p>

                                <div class="rating">
                                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="bitem">
                                <i class="fa fa-clock-o"></i> {{ $classified->created_at->diffForHumans() }}
                                <i class="fa fa-eye"></i> {{ $classified->view_counter }} lượt xem
                                @if($classified->mobile)
                                    <i class="fa fa-phone"></i> {{ $classified->mobile }}
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                <!--  -->
            </div>
            <!-- ---------------------- -->
        </div>
    </div>

    <!-- Categories -->
    <!--  -->
@endsection
@section('script')

    <script>
        $(function() {

            $(".my-rating").starRating({
                initialRating: '{{ $classifieds->raty }}',
                starSize: 25,
                callback: function(currentRating, $el){
                    // make a server call here
                    $.ajax({
                        url: '{{ route('front.user.classified.raty') }}',
                        type: 'POST',
                        data: {'classifieds_id':'{{ $classifieds->id }}','classifieds_score':currentRating,'_token': $('meta[name="csrf-token"]').attr('content')},
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
    <script type="text/javascript" src="{{ asset('assets/front/js/comment.js') }}"></script>
    <script src="/assets/front/plugins/ckeditor/ckeditor.js"></script>
@endsection