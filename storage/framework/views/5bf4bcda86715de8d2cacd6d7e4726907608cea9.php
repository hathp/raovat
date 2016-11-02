<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--><html lang="en"><!--<![endif]-->

<head>
    <title>Admin Dashboard</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php /* Include CSS */ ?>
    <?php echo $__env->make('admin.layout.partials.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <link href="<?php echo e(asset('assets/admin/css/login.css')); ?>" rel="stylesheet" type="text/css" />

</head>

<body class="login">
<div class="menu-toggler sidebar-toggler"></div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="index.html">
        <img src="<?php echo e(asset('assets/admin/img/layout/logo.png')); ?>" alt="" /> </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="<?php echo e(action('Auth\AuthController@login')); ?>" method="post">
         <?php echo csrf_field(); ?>

        <h3 class="form-title font-green"><?php echo e(trans('admin.login')); ?></h3>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" value="tranviettrung92@gmail.com"/> </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="<?php echo e(trans('common.password')); ?>" name="password" value="123456" /> </div>
        <div class="form-actions">
            <button type="submit" class="btn green uppercase"><?php echo e(trans('admin.login')); ?></button>
            <label class="rememberme check">
                <input type="checkbox" name="remember" value="1" /><?php echo e(trans('admin.remember')); ?> </label>
        </div>
    </form>
    <!-- END LOGIN FORM -->

</div>
<div class="copyright"> <?php echo e(date('Y')); ?> © Hoster.</div>

    <?php /* JavaScript */ ?>
    <?php echo $__env->make('admin.layout.partials.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php /* Internal JavaScript */ ?>
    <?php echo $__env->yieldContent('script'); ?>
</body>

</html>