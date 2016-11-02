<footer>
  <div class="container">
  	<div class="row">
    	<div class="span4" id="brand-footer">
   	    	<p><img src="<?php echo e(asset('assets/front/img/logo-footer.jpg')); ?>" alt=""></p>
            <p>Copyright © 2016</p>
            <div class="twitter"><a href="#" >Follow on Twitter</a></div>
			<div class="fb"><a href="#">Follow on  Facebook</a></div>  
        </div>
        <div class="span4" id="contacts-footer">
        	<h4>Contacts</h4>
            <ul>
            	<li><i class="icon-home"></i> <?php echo e($setting->getValueItem(6)); ?></li>
            	<li><i class="icon-phone"></i> Telephone: <?php echo e($setting->getValueItem(8)); ?></li>
                <li><i class="icon-phone-sign"></i> Fax: <?php echo e($setting->getValueItem(7)); ?></li>
                <li><i class="icon-envelope"></i> Email: <a href="#"><?php echo e($setting->getValueItem(9)); ?></a></li>
            </ul>
            <hr>
        	<h4>Newsletter</h4>
            <p>Donec adipiscing, quam non faucibus luctus, mi arcu blandit diam. Dolor consul graecis nec ut, scripta eruditi scriptorem et nam.</p>
            
            <div id="message-newsletter"></div>
              <form method="post"  action="assets/newsletter.php" name="newsletter" id="newsletter" class="form-inline">
                <input name="email_newsletter" id="email_newsletter"  type="email" value="" placeholder="Your Email" >
                <button  id="submit-newsletter" class=" button_medium" > Subscribe</button>
              </form>
        	</div>
        <div class="span4" id="quick-links">
        	<h4>Quick links</h4>
            <ul>
            	<li><a href="#" >Admissions</a></li>
                <li><a href="#" >Administration</a></li>
            	<li><a href="#" >Courses</a></li>
                <li><a href="#" >Departments and Programs</a></li>
                <li><a href="#" >Summer sessions</a></li>
            </ul>
            <hr>
            <ul>
            	<li><a href="#" >Degrees &amp; Majors</a></li>
            	<li><a href="#" >Master's online</a></li>
                <li><a href="#" >Professional Courses</a></li>
                <li><a href="#" >Bacherlor's</a></li>
                <li><a href="#" >Courses</a></li>
                <li><a href="#" >Departments and Programs</a></li>
            </ul>
        </div>
        
    </div>
  </div>
  </footer><!-- End footer-->