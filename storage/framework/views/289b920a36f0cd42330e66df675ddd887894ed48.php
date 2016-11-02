<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('front::block.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- =========================Start Col left section ============================= -->
<aside class="span4">
    <div class="col-left">
        <div class="sidebar">

            <div class="widget">
                <form class="form-search form-inline">
                    <input type="text" class="input-medium">
                    <button type="submit" class="button_medium">Search</button>
                </form>
            </div><!-- End Search -->

            <div class="widget">
                <h4>Text widget</h4>
                <p>
                    Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros.
                </p>
            </div><!-- End widget -->

            <hr>

            <div class="widget">
                <h4>Bài viết nổi bật</h4>
                <ul class="recent_post">
                    <?php foreach($blogs_view as $blog_view): ?>
                        <li>
                            <i class="icon-calendar-empty"></i> 16th July, 2016 <div><a href="<?php echo e($blog_view->getViewLink()); ?>"><?php echo e($blog_view->title); ?></a></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div><!-- End widget -->

            <hr>
            <div class="widget tags">
                <h4>Tags</h4>
                <a href="#">Lorem ipsum</a>
                <a href="#">Dolor</a>
                <a href="#">Long established</a>
                <a href="#">Sit amet</a>
                <a href="#">Latin words</a>
                <a href="#">Excepteur sint</a>
            </div><!-- End widget -->

        </div><!-- end siedebar  -->
    </div><!-- end  col left -->
    <p><img src="<?php echo e(asset('assets/front/img/banner.jpg')); ?>" alt="Banner" class="img-rounded" ></p>
</aside>

<section class="span8">
    <div class="col-right">
        <?php foreach($list as $blog): ?>
            <div class="post">
                <h2><a href="<?php echo e($blog->getViewLink()); ?>"><?php echo e($blog->title); ?></a></h2>
                <img src="<?php echo e($blog->getCoverImageLarge()); ?>" alt="<?php echo e($blog->title); ?>" >
                <div class="post_info clearfix">
                    <div class="post-left">
                        <ul>
                            <li><i class="icon-calendar-empty"></i>On <span>12 Nov 2020</span></li>
                            <li><i class="icon-user"></i>By <a href="#">John Smith</a></li>
                            <li><i class="icon-tags"></i>Tags <a href="#">Works</a> <a href="#">Personal</a></li>
                        </ul>
                    </div>
                    <div class="post-right"><i class="icon-comments"></i><a href="#">25 </a>Comments</div>
                </div>
                <p><?php echo $blog->brief; ?></p>
                <p><a href="<?php echo e($blog->getViewLink()); ?>" class="button_medium">Read more</a></p>
            </div> <!-- end post -->
        <?php endforeach; ?>
        <hr>
        <?php echo $__env->make('front::block.pagination', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div><!-- end col-right-->
</section> <!-- end section-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>