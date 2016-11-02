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
                    <div class="col-xs-12 col-md-6 col-md-offset-3">
                        <div class="change-password">
                            <h3>Thay đổi mật khẩu</h3>
                            <form method="post" action="{{ route('front.user.password.update') }}" enctype="multipart/form-data">
                                {!! method_field('put') !!}
                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <label for="password">Mật khẩu cũ</label>
                                    <input class="form-control" type="password" name="old_password" required/>
                                </div>

                                <div class="form-group">
                                    <label for="password">Mật khẩu</label>
                                    <input class="form-control" type="password" name="password" required />
                                </div>

                                <div class="form-group">
                                    <label for="password-confirmation">Xác nhận mật khẩu</label>
                                    <input class="form-control" type="password" name="password_confirmation" required/>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection