<?php $__env->startSection('content'); ?>
<?php echo $__env->make('front::block.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- =========================Start Col left section ============================= -->
<?php echo $__env->make('front::page.partials.content-left', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- =========================Start Col right section ============================= -->
<section class="span8  ">
    <div class="col-right">
        <div class="main-img">
            <img src="<?php echo e($category->getCoverImageLarge()); ?>" alt="<?php echo e($category->name); ?>" >
            <p class="lead"><?php echo e($category->description); ?></p>
        </div>

        <?php echo $__env->make('front::block.courses', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php /*<div class="widget borders widget-table">*/ ?>

            <?php /*<div class="widget-header">*/ ?>
                <?php /*<h5>Course detail</h5>*/ ?>
            <?php /*</div> <!-- .widget-header -->*/ ?>

            <?php /*<div class="widget-content">*/ ?>
                <?php /*<table class="table table-bordered table-striped">*/ ?>

                    <?php /*<thead>*/ ?>
                    <?php /*<tr>*/ ?>
                        <?php /*<th>Lesson</th>*/ ?>
                        <?php /*<th>Instructor</th>*/ ?>
                        <?php /*<th>Time</th>*/ ?>
                        <?php /*<th>Room</th>*/ ?>
                    <?php /*</tr></thead>*/ ?>

                    <?php /*<tbody>*/ ?>
                    <?php /*<tr>*/ ?>
                        <?php /*<td>Curabitur blandit tempus porttitor </td>*/ ?>
                        <?php /*<td>Mark Twain</td>*/ ?>
                        <?php /*<td>10.30 AM</td>*/ ?>
                        <?php /*<td>004</td>*/ ?>
                    <?php /*</tr>*/ ?>
                    <?php /*<tr>*/ ?>
                        <?php /*<td>Pellentesque ornare sem</td>*/ ?>
                        <?php /*<td>Janet Hope</td>*/ ?>
                        <?php /*<td>10.30 AM</td>*/ ?>
                        <?php /*<td>014</td>*/ ?>
                    <?php /*</tr>*/ ?>
                    <?php /*<tr>*/ ?>
                        <?php /*<td>Integer posuere erat a ante venenatis</td>*/ ?>
                        <?php /*<td>Tom Cruise</td>*/ ?>
                        <?php /*<td>12.30 AM</td>*/ ?>
                        <?php /*<td>094</td>*/ ?>
                    <?php /*</tr>*/ ?>
                    <?php /*<tr>*/ ?>
                        <?php /*<td>Sed posuere consectetur</td>*/ ?>
                        <?php /*<td>Bob Sinclair</td>*/ ?>
                        <?php /*<td>11.30 AM</td>*/ ?>
                        <?php /*<td>054</td>*/ ?>
                    <?php /*</tr>*/ ?>

                    <?php /*</tbody></table>*/ ?>

            <?php /*</div> <!-- .widget-content -->*/ ?>

        <?php /*</div> <!-- /widget -->*/ ?>


        <?php /*<p class="text-center"><a href="contact.html" class="button_large">Apply now </a></p>*/ ?>
        <?php echo $__env->make('front::block.pagination', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div><!-- end col right-->
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>