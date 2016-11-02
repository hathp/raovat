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
                    <!-- slide -->
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="404">
                            <h1>Không tìn thấy trang bạn yêu cầu</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection