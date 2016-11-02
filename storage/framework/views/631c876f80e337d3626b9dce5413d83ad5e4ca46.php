<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title><?php echo e(isset($page_title) ? $page_title : 'Hoster'); ?> | Admin Control Panel</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Hoster CMS" name="description" />
    <meta content="Hoster" name="author" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <?php echo $__env->make('admin.layout.partials.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php /* Stylesheet */ ?>
</head>

<body class="page-header-fixed page-sidebar-fixed page-sidebar-fixed page-sidebar-closed-hide-logo page-sidebar-closed page-container-bg-solid">
    <?php echo $__env->make('admin.layout.partials.layout-header-top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php /* Header top */ ?>

    <div class="page-container"> <?php /* Containter */ ?>
        <?php echo $__env->make('admin.layout.partials.layout-sidebar-left', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php /* Sidebar left */ ?>
        <div class="page-content-wrapper"> <?php /* Content */ ?>
            <div class="page-content" style="min-height:1001px">
                <?php /* Breadcum */ ?>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <span>Page Layouts</span>
                        </li>
                    </ul>
                </div>

                <?php /* Page title */ ?>
                <h3 class="page-title"> <?php echo e(isset($page_title) ? $page_title : 'Title'); ?> </h3> <?php /* Page Title */ ?>

                <?php /* Notification */ ?>
                <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('admin.layout.partials.layout-footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <?php echo $__env->make('admin.layout.partials.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php /* JavaScript */ ?>
</body>

</html>