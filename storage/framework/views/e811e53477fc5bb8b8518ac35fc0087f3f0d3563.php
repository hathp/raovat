<?php $__env->startSection('content'); ?>
<?php echo $__env->make('front::block.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- =========================Start Col left section ============================= -->
<?php echo $__env->make('front::page.partials.content-left', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- =========================Start Col right section ============================= -->
<section class="span8  ">
    <div class="col-right">
        <div class="main-img">
            <img src="<?php echo e(asset('assets/front/img/about.jpg')); ?>" alt="<?php echo e($category_course->name); ?>" >
            <p class="lead"><?php echo e($category_course->description); ?></p>
        </div>
        <?php $i = 1;?>
        <?php foreach($list as $category): ?>
            <div class="strip-courses <?php echo e(($i % 2 == 0 ) ? 'gray' : ''); ?>">
                <div class="title-course">
                    <h3><?php echo e($category->name); ?> </h3>
                    <ul >
                        <li><i class="icon-calendar"></i> Start date: 24/06/13</li>
                        <li><i class="icon-bookmark"></i> ID: 012</li>
                    </ul>
                </div>
                <div class="description">
                    <p><?php echo e($category->description); ?> </p>
                    <ul>
                        <li><i class="icon-book"></i> <?php echo e(count($category->pages)); ?> Lessons</li>
                        <li><i class="icon-reorder"></i> Level Basic</li>
                        <li class="online"><i class="icon-laptop"></i> Online</li>
                    </ul>
                    <a href="<?php echo e($category->getViewLink()); ?>" class="button_medium button-align-2">Xem thêm</a>
                </div>
            </div><!-- end strip-->
            <?php $i++;?>
        <?php endforeach; ?>

        <hr>
        <?php echo $__env->make('front::block.pagination', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div><!-- end col right-->

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>