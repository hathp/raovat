<div id="user-login" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <form action="{{ route('front.auth.login') }}" method="post">
            {!! csrf_field() !!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Người dùng đăng nhập</h4>
                </div>
                <div class="modal-body">
                    <div style="display: none" class="alert alert-danger errors">
                        <ul>

                        </ul>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tài khoản</label>
                        <input type="text" name="email" class="form-control" placeholder="Nhập Email hoặc tên tài khoản">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" value="1"/> Nhớ đăng nhập
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->