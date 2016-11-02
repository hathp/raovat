<?php $__env->startSection('content'); ?>

    <div class="r-1">
        <div class="title-dt">
            <img src="<?php echo e(asset('assets/front/images/icon_news_1.png')); ?>">Thông tin liên hệ
        </div>
        <?php if(Session::has('flash_notification.message')): ?>
            <div class="alert alert-<?php echo e(Session::get('flash_notification.level')); ?>">
                <?php echo e(Session::get('flash_notification.message')); ?>

            </div>
        <?php endif; ?>
        <div class="dt-cont">
            <?php /*<strong class="text-left">*/ ?>
                <?php /*<h4 style="color: red"> <?php echo e($setting->getValueItem(1)); ?></h4>*/ ?>
            <?php /*</strong>*/ ?>
            <?php /*<address class="col-md-6">*/ ?>
                <?php /*<strong>Cơ sở 1.</strong><br>*/ ?>
                <?php /*<?php echo e($setting->getValueItem(6)); ?><br>*/ ?>
                <?php /*Hải Phòng, Việt Nam<br>*/ ?>
                <?php /*<abbr title="Phone">P:</abbr> <?php echo e($setting->getValueItem(8)); ?>*/ ?>
            <?php /*</address>*/ ?>

            <?php /*<address class="col-md-6">*/ ?>
                <?php /*<strong>Cơ sở 2.</strong><br>*/ ?>
                <?php /*<?php echo e($setting->getValueItem(6)); ?><br>*/ ?>
                <?php /*Hải Phòng, Việt Nam<br>*/ ?>
                <?php /*<abbr title="Phone">P:</abbr> <?php echo e($setting->getValueItem(8)); ?>*/ ?>
            <?php /*</address>*/ ?>
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=411437458924463";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-page" data-href="https://www.facebook.com/hoster.vn/" data-width="500" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/hoster.vn/"><a href="https://www.facebook.com/hoster.vn/">Hoster Việt Nam</a></blockquote></div></div>

            <h4 style="color: green;"><span class='glyphicon glyphicon-envelope'></span> Gửi thông tin yêu cầu</h4>

            <form method="post" action="<?php echo e(route('front.contact.store')); ?>" style="color: green;" class="form-horizontal" role="form">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Họ tên</label>
                    <div class="col-sm-10">
                        <input type="text" required="required" class="form-control" id="name" name="name" placeholder="Họ tên đầy đủ" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" required="required" class="form-control" id="email" name="email" placeholder="info@hoster.vn" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-2 control-label">Địa chỉ</label>
                    <div class="col-sm-10">
                        <input type="address" class="form-control" id="address" name="address" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="message" class="col-sm-2 control-label">Nội dung</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="4" name="message"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <input id="submit" name="submit" type="submit" value="Gửi đi" class="btn btn-primary">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <?php echo $__env->make('front::contact.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </form>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3728.2466521512874!2d106.68318311433572!3d20.862106298823907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7add47ff5d3f%3A0xe2ed3e3a4ae2db88!2sHoster+Vi%E1%BB%87t+Nam!5e0!3m2!1svi!2s!4v1458741924675" width="576" height="420" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="clearfix"></div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>