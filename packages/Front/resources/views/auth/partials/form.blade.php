{!! csrf_field() !!}
<div class="row">
    <div class="col-xs-12 col-sm-offset-1 col-sm-8">
        <!-- Title -->
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">Họ tên</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ isset($user) ? $user->name : old('name') }}" required />
            @if ($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
            @endif
        </div>

        @if(Request::route()->getName() == 'front.auth.register')
        <!-- Email -->
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ isset($user) ? $user->email : old('email') }}" required />
            @if ($errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
            @endif
        </div>
        @endif

        <!-- Gender -->
        <div class="form-group">
            <label for="gender">Giới tính</label>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" id="gender" value="1" {{ (isset($user) && $user->gender == 1) ? 'checked' : '' }} {{ isset($user) ? '' : 'checked' }} />
                    Nam
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" id="gender" value="0" {{ (isset($user) && $user->gender == 0) ? 'checked' : '' }} />
                    Nữ
                </label>
            </div>
        </div>

        <!-- Date of birth -->
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="form-group {{ $errors->has('date_of_birth') ? 'has-error' : '' }}">
                    <label for="date_of_birth">Ngày sinh:</label>
                    <input type="text" class="form-control mask-date" name="date_of_birth" value="{{ isset($user) ? $user->getBirthday() : old('date_of_birth') }}" required/>
                    @if ($errors->has('date_of_birth'))
                        <span class="help-block">{{ $errors->first('date_of_birth') }}</span>
                    @endif
                    <span class="help-block">Định dạng: ngày/tháng/năm</span>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <label for="date_of_birth">Số điện thoại:</label>
                    <input type="tel" class="form-control" name="phone" value="{{ isset($user) ? $user->phone : old('phone') }}"/>
                    @if ($errors->has('phone'))
                        <span class="help-block">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
            </div>
        </div>

        @if(Request::route()->getName() == 'front.auth.register')
            <!-- Password -->
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">Mật khẩu</label>
                <input class="form-control" type="password" name="password" />
                @if ($errors->has('password'))
                    <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                <label for="password-confirmation">Xác nhận mật khẩu</label>
                <input class="form-control" type="password" name="password_confirmation" />
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-group {{ $errors->has('captcha') ? 'has-error' : '' }}">
                        <label for="content">Mã bảo vệ</label>
                        <input type="text" class="form-control" id="captcha" name="captcha" required/>
                        @if ($errors->has('captcha'))
                            <span class="help-block">{{ $errors->first('captcha') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-4" style="padding-top: 20px">
                    {!! captcha_img() !!}
                </div>
            </div>
        @endif
    </div>
    <div class="col-xs-12 col-sm-2">
        <div class="kv-image" style="display: inline-block; padding-bottom: 10px;">
            <label for="avatar">Hình ảnh:</label>
            <input id="avatar" name="avatar" type="file" class="file-loading">
        </div>
    </div>
    <div class="col-xs-12 col-sm-offset-1">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ $button or '' }}</button>
        </div>
    </div>
</div>

@section('script')
    <script src="/assets/front/plugins/bootstrap-fileinput/js/fileinput.min.js"></script>
    <script>
        $("#avatar").fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="{{ isset($user) ? $user->getAvatarImage() : '/assets/front/images/default-user.png' }}" alt="Your Avatar" style="width:160px">',
            layoutTemplates: {main2: '{preview} {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
    </script>
@endsection