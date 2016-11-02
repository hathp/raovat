<aside  class="span4 ">
    <div class="col-left">
        <?php echo $__env->make('front::block.submenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <h5>Upcoming Courses</h5>
        <p>Suspendisse quis risus turpis, ut pharetra arcu. Donec adipiscing, quam non faucibus luctus, mi arcu blandit diam, at faucibus mi ante vel augue.</p>
        <p><a href="#" class=" button_red_small">View Courses</a></p>

    </div>
    <p><img src="<?php echo e(asset('assets/front/img/banner.jpg')); ?>" alt="Banner" class="img-rounded" ></p>
</aside>