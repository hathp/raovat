<?php $__env->startSection('content'); ?>
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
                    Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci.
                </p>
            </div><!-- End widget -->

            <hr>

            <?php echo $__env->make('front::block.submenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


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

<!-- =========================Start Col right section ============================= -->
<section class="span8">
    <div class="col-right">
        <div class="post">
            <h2><a><?php echo e($page->title); ?></a></h2>
            <img src="<?php echo e($page->getCoverImageLarge()); ?>" alt="<?php echo e($page->title); ?>">
            <div class="post_info clearfix">
                <div class="post-left">
                    <ul>
                        <li><i class="icon-calendar-empty"></i>On <span>12 Nov 2020</span></li>
                        <li><i class="icon-user"></i>By <a href="#">John Smith</a></li>
                        <li><i class="icon-tags"></i>Tags <a href="#">Works</a><a href="#">Personal</a></li>
                    </ul>
                </div>
                <div class="post-right"><i class="icon-comments"></i><a href="#">25 </a>Comments</div>
            </div>
            <p>
                <?php echo e($page->brief); ?>

            </p>
            <p>
                <?php echo $page->content; ?>

            </p>

        </div><!-- end post -->
        <hr>

        <h4>4 comments</h4>
        <div id="comments">
            <ol>

                <li>
                    <div class="avatar"><a href="#"><img src="<?php echo e(asset('assets/front/img/avatar1.jpg')); ?>" alt=""></a></div>
                    <div class="comment_right clearfix">
                        <div class="comment_info">Posted by <a href="#">Anna Smith</a><span>|</span> 25 apr 2019 <span>|</span><a href="#">Reply</a></div>
                        <p>
                            Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
                        </p>
                    </div>
                    <ul>
                        <li>
                            <div class="avatar"><a href="#"><img src="<?php echo e(asset('assets/front/img/avatar2.jpg')); ?>" alt=""></a></div>
                            <div class="comment_right clearfix">
                                <div class="comment_info">Posted by <a href="#">Tom Sawyer</a><span>|</span> 25 apr 2019 <span>|</span><a href="#">Reply</a></div>
                                <p>
                                    Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
                                </p>
                                <p>
                                    Aenean iaculis sodales dui, non hendrerit lorem rhoncus ut. Pellentesque ullamcorper venenatis elit idaipiscingi Duis tellus neque, tincidunt eget pulvinar sit amet, rutrum nec urna. Suspendisse pretium laoreet elit vel ultricies. Maecenas ullamcorper ultricies rhoncus. Aliquam erat volutpat.
                                </p>
                            </div>
                        </li>
                    </ul>
                </li>

                <li>
                    <div class="avatar"><a href="#"><img src="<?php echo e(asset('assets/front/img/avatar3.jpg')); ?>" alt=""></a></div>
                    <div class="comment_right clearfix">
                        <div class="comment_info">Posted by <a href="#">Adam White</a><span>|</span> 25 apr 2019 <span>|</span><a href="#">Reply</a></div>
                        <p>Cursus tellus quis magna porta adipiscin</p>
                    </div>
                </li>

            </ol>
        </div><!-- End Comments -->

        <h4>Leave a comment</h4>
        <form action="#" method="post">
            <input class="span5" type="text" name="name" value="Name" onfocus="if (this.value == 'Name') this.value = '';" onblur="if (this.value == '') this.value = 'Name';"/>
            <input class="span5" type="text" name="mail" value="Email" onfocus="if (this.value == 'Email') this.value = '';" onblur="if (this.value == '') this.value = 'Email';"/>
            <textarea name="message" rows="4" class="span7" onfocus="if (this.value == 'Message...') this.value = '';" onblur="if (this.value == '') this.value = 'Message...';">Message...</textarea>
            <input type="reset" class="button_medium" value="Clear form"/>
            <input type="submit" class="button_medium" value="Post Comment"/>
        </form>

    </div><!-- end col-right-->
</section><!-- end section-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>