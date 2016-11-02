<?php $__env->startSection('content-bottom'); ?>
    <div class="wrap">
        <div class="preview-page">
            <?php if(Session::has('flash_notification.message')): ?>
                <div class="alert alert-<?php echo e(Session::get('flash_notification.level')); ?>">
                    <?php echo e(Session::get('flash_notification.message')); ?>

                </div>
            <?php endif; ?>
            <div class="contact_info">
                <div class="map">
                    <iframe width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59658.01214454505!2d106.66372692090057!3d20.846813504496204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7af39e3f1ad3%3A0xa5ffc85ff87a07e8!2zSOG6o2kgUGjDsm5nLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1457358993693"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#888;text-align:left;font-size:0.85em">Xem bản đồ đầy đủ</a></small>
                </div>
            </div>

            <div class="contact-form">
                <h3>Liên hệ với chúng tôi</h3>
                <?php echo $__env->make('front::contact.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <form method="post" action="<?php echo e(route('front.contact.store')); ?>">
                    <?php echo csrf_field(); ?>

                    <div>
                        <input name="name" type="text" class="textbox textbox1" required="required" placeholder="Họ và Tên">
                        <input name="email"  class="textbox" required="required" type="text" placeholder="Email">
                        <input name="phone" type="text" class="textbox" required="required" placeholder="Số điện thoại">
                        <div class="clear"></div>
                    </div>
                    <div>
                        <span><textarea name="message" placeholder="Nội dung"></textarea></span>
                    </div>
                    <div>
                        <input type="submit" value="Gửi đi"  class="mybutton">
                        <div class="clear"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front::layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>