<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('front::block.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- =========================Start Col left section ============================= -->
    <aside class="span4 ">
        <div class="col-left">
            <?php foreach($list_page as $item): ?>
                <h4><?php echo e($item->title); ?></h4>
                <p>
                    <?php echo e($item->brief); ?>

                </p>
                <a href="<?php echo e($item->getViewLink()); ?>" class=" button_red_small">Read more</a>
                <hr>
            <?php endforeach; ?>

            <h4>How to apply</h4>
            <ul class=" list_2">
                <li>Vivamus sagittis lacus vel augue laoreet </li>
                <li>Nullam quis risus eget urna mollis</li>
                <li>Nullam id dolor id nibh ultricies</li>
                <li>Donec id elit non mi porta</li>
            </ul>
            <p><a href="contact.html" class=" button_medium">Apply now</a></p>
        </div><!--End col left -->

        <p><img src="<?php echo e(asset('assets/front/img/banner.jpg')); ?>" alt="Banner" class="img-rounded"></p>
    </aside>

    <!-- =========================Start Col right section ============================= -->
    <section class="span8  ">
        <div class="col-right">
            <div class="main-img">
                <img src="<?php echo e($page->getCoverImageLarge()); ?>" alt="<?php echo e($page->title); ?>" >
                <p class="lead"><?php echo e($page->title); ?></p>
            </div>
            <p><?php echo $page->content; ?></p>
        </div><!-- end col right-->
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>