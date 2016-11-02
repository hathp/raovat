<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--><html lang="en"><!--<![endif]-->

<head>
    <title>Admin Dashboard</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Include CSS --}}
    @include('admin.layout.partials.css')
    <link href="{{ asset('assets/admin/css/login.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="login">
<div class="menu-toggler sidebar-toggler"></div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="index.html">
        <img src="{{ asset('assets/admin/img/layout/logo.png') }}" alt="" /> </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{{ action('Auth\AuthController@login') }}" method="post">
         {!! csrf_field() !!}
        <h3 class="form-title font-green">{{ trans('admin.login') }}</h3>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="{{ trans('admin.email') }}" name="email" autocomplete="off" autofocus="1"/> </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="{{ trans('admin.password') }}" name="password"  autocomplete="off" /> </div>
        <div class="form-actions">
            <button type="submit" class="btn green uppercase">{{ trans('admin.login') }}</button>
            <label class="rememberme check">
                <input type="checkbox" name="remember" value="1" />{{ trans('admin.remember') }} </label>
        </div>
    </form>
    <!-- END LOGIN FORM -->

</div>
<div class="copyright"> {{ date('Y') }} © Hoster.</div>

    {{-- JavaScript --}}
    @include('admin.layout.partials.js')
    {{-- Internal JavaScript --}}
    @yield('script')
</body>

</html>