@extends('admin.partials.portlet-title')

@section('extends')
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#user-info" data-toggle="tab">Thông tin tài khoản</a>
        </li>
        @if(isset($user))
        <li>
            <a href="#change-password" data-toggle="tab">Thay đổi mật khẩu</a>
        </li>
        @endif
    </ul>
@endsection