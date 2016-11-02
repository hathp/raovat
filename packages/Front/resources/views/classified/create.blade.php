@extends($package_name .'::layout.main')

@section('style')
    <link rel="stylesheet" href="/assets/front/plugins/bootstrap-fileinput/css/fileinput.min.css">
    <link type="text/css" rel="stylesheet" href="/assets/front/plugins/plupload-2/js/jquery.ui.plupload/css/jquery.ui.plupload.css" media="screen">
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
                <div class="upload-classified">
                    <h3>Đăng tin rao vặt</h3>
                    <form method="post" action="{{ route('front.classified.store') }}" enctype="multipart/form-data">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @include('front::classified.partials.form', ['button' => 'Tạo mới'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

