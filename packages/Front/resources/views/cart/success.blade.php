@extends('front::layout.main')

@section('style')
    <link rel="stylesheet" href="/assets/front/plugins/bootstrap-fileinput/css/fileinput.min.css">
    @endsection

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
            @include('front::partials.category')

            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <h4 style="text-align: center">Đặt hàng thành công!</h4>
                <p style="text-align: center">Bạn vừa đặt hàng thành công. Chúng tôi sẽ liên lạc với bạn sớm nhất để xác nhận đơn hàng.</p>
            </div>
        </div>
    </div>
@endsection