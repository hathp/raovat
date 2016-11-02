 <nav>
<div class="megamenu_container">
<a id="megamenu-button-mobile" href="#">Menu</a><!-- Menu button responsive-->
    
	<!-- Begin Mega Menu Container -->
	<ul class="megamenu">
		<!-- Begin Mega Menu -->
		<li><a href="<?php echo e(route('front.home')); ?>" class="nodrop-down">Trang Chủ</a></li>

		<li><a href="javascript:void(0)" class="drop-down">About</a>
			<!-- Begin Item -->
			<div class="drop-down-container">

				<div class="row">

					<div class="span3">
						<h4>Quick links</h4>
						<ul class="list-menu">
							<li><a href="" title="All courses">All courses</a></li>
							<li><a href="" title="Course detail">Course detail</a></li>
							<li><a href="" title="Meet the team">Meet the team</a></li>
							<li><a href="" title="Apply for a course">Apply for a course</a></li>
							<li><a href="" title="About">About </a></li>
							<li><a href="" title="News">News</a></li>
							<li><a href="" title="Contact">Ask for more information</a></li>
						</ul>
						<p><a href="<?php echo e(route('front.page.about')); ?>" title="Courses" class="button_medium add-bottom-20">Giới thiệu về chúng tôi</a></p>
					</div>

					<div class="span9">
						<ul class="tabs">
							<li><a class="active" href="#section-1">Staff</a></li>
							<li><a href="#section-2">History</a></li>
						</ul>

						<ul class="tabs-content">

							<li class="active" id="section-1">
								<div class="row">

									<div class="span3">
										<p><img src="<?php echo e(asset('assets/front/img/teacher-small.jpg')); ?>" class="img-rounded shadow" alt=""></p>
										<h5>Ms. Annie Ann <em>Management</em></h5>
										<p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei.</p>
										<p><a href="" class="button_red_small" title="staff">Read more</a></p>
									</div>

									<div class="span3">
										<p><img src="<?php echo e(asset('assets/front/img/teacher-small-2.jpg')); ?>" class="img-rounded shadow" alt=""></p>
										<h5>Ms. Annie Ann <em>Business</em></h5>
										<p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei.</p>
										<p><a href="" class="button_red_small" title="staff">Read more</a></p>
									</div>

									<div class="span3">
										<p><img src="<?php echo e(asset('assets/front/img/teacher-small-3.jpg')); ?>" class="img-rounded shadow" alt=""></p>
										<h5>Ms. Annie Ann <em>Administration</em></h5>
										<p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei.</p>
										<p><a href="" class="button_red_small" title="staff">Read more</a></p>
									</div>

								</div><!-- End row -->
							</li>

							<li id="section-2">
								<p class="lead ">An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei. An utinam reprimique duo, putant mandamus cu qui.</p>
								<hr>

								<div class="row">

									<div class="span4">
										<h5>History</h5>
										<p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei. An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei.</p>
									</div>

									<div class="span4">
										<h5>Mission</h5>
										<p>An utinam reprimique duo, putant mandamus cu qui. <strong>Autem possim his cu</strong>, quodsi nominavi fabellas ut sit, mea ea ullum epicurei. An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei.</p>
									</div>

								</div><!-- End row -->
							</li>

						</ul><!-- End tabs-->
					</div><!-- End span9 -->

				</div><!-- End row -->
			</div><!-- End Item Container -->
		</li><!-- End Item -->

		<li><a href="javascript:void(0)" class="drop-down">Các Khóa Học</a>
		<!-- Begin Item -->
		<div class="drop-down-container">
			<div class="row">
            
				<div class="span3">
					<h4>Quick links</h4>
					<ul class="list-menu">
						<li><a href="" title="All courses">All courses</a></li>
						<li><a href="" title="Course detail">Course detail</a></li>
						<li><a href="" title="Meet the team">Meet the team</a></li>
						<li><a href="" title="Apply for a course">Apply for a course</a></li>
						<li><a href="" title="About">About </a></li>
						<li><a href="" title="News">News</a></li>
						<li><a href="" title="Contact">Ask for more information</a></li>
					</ul>
					<p><a href="<?php echo e(route('front.courses.index')); ?>" title="Courses" class="button_medium add-bottom-20">View all courses</a></p>
				</div>
                
				<div class="span9">
					<?php $menuCourses1 = $menuCourses->splice(3); ?>
					<div class="row">
						<?php foreach($menuCourses1 as $course): ?>
							<div class="span3">
								<h5><a href="<?php echo e($course->getViewLink()); ?>"><i class="icon-book"></i><?php echo e($course->name); ?></a> (<?php echo e(count($course->pages()->get())); ?>)</h5>
								<p><?php echo e($course->description); ?></p>
								<p><a href="<?php echo e($course->getViewLink()); ?>" class="button_red_small">Xem thêm</a></p>
							</div>
						<?php endforeach; ?>
					</div><!-- End row -->
                    
					<div class="row">
						<?php foreach($menuCourses as $course): ?>
							<div class="span3">
								<h5><a href="<?php echo e($course->getViewLink()); ?>"><i class="icon-book"></i><?php echo e($course->name); ?></a> (<?php echo e(count($course->pages()->get())); ?>)</h5>
								<p><?php echo e($course->description); ?></p>
								<p><a href="<?php echo e($course->getViewLink()); ?>" class="button_red_small">Xem thêm</a></p>
							</div>
						<?php endforeach; ?>
					</div><!-- End row -->
                    
				</div><!-- End span9 -->
			</div><!-- End row -->
		</div><!-- End Item Container -->
		</li><!-- End Item -->
        
		<li><a href="javascript:void(0)" class="drop-down">Tin tức</a>
		<!-- Begin Item -->
		<div class="drop-down-container">
        
			<div class="row">
				<div class="span7">
					<iframe height="300" src="http://www.youtube.com/embed/pgk-719mTxM?wmode=transparent"></iframe>
				</div>
				<div class="span5">
					<h4>Youtube video</h4>
					<p>
						An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei. Saepe tantas ocurreret duo ea, has facilisi vulputate an. Pri aeque iuvaret nominati et, ad mea clita numquam.
					</p>
					<p>
						An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei. Saepe tantas ocurreret duo ea, has facilisi vulputate an. Pri aeque iuvaret nominati et, ad mea clita numquam.
					</p>
					<p><a href="<?php echo e(route('front.courses.index')); ?>" title="All courses" class="button_red_small">Read more</a></p>
				</div>
			</div><!-- End row -->
            
			<hr>
            
			<div class="row">
            	<?php foreach($menuArticle as $article): ?>
					<div class="span3">
						<h5><?php echo e($article->name); ?></h5>
						<ul class="list-menu">
							<?php foreach($article->listChild as $art): ?>
								<li><a href="<?php echo e($art->getViewLink()); ?>" title="<?php echo e($art->name); ?>"><?php echo e($art->name); ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
                <?php endforeach; ?>
			</div><!-- End row -->
		</div><!-- End Item Container -->
		</li><!-- End Item -->
        

        
		<?php /*<li><a href="#" class="drop-down">Pages</a>*/ ?>
		<?php /*<!-- Begin Item -->*/ ?>
		<?php /*<div class="drop-down-container" id="icon-menu">*/ ?>
			<?php /*<div class="row">*/ ?>
				<?php /*<div class="span3 "><a href="about-us.html" title="About "><i class="icon-building icon-3x"></i>About </a></div>*/ ?>
				<?php /*<div class="span3"><a href="about-us.html" title="Academics"><i class="icon-flag icon-3x"></i>Academics</a></div>*/ ?>
				<?php /*<div class="span3"><a href="all-courses.html" title="All courses"><i class="icon-list icon-3x"></i>All courses </a></div>*/ ?>
				<?php /*<div class="span3"><a href="course-detail.html" title="Course detail"><i class="icon-book icon-3x"></i>Course detail</a></div>*/ ?>
				<?php /*<div class="span3"><a href="staff.html" title="Staff page"><i class="icon-group icon-3x"></i>Staff page</a></div>*/ ?>
				<?php /*<div class="span3 "><a href="contact.html" title="Contact"><i class="icon-envelope icon-3x"></i>Contact</a></div>*/ ?>
				<?php /*<div class="span3"><a href="contact.html" title="Plan a visit"><i class="icon-eye-open icon-3x"></i>Plan a visit</a></div>*/ ?>
				<?php /*<div class="span3"><a href="news-events.html" title="News"><i class="icon-chevron-right icon-3x"></i>News</a></div>*/ ?>
				<?php /*<div class="span3"><a href="blog.html" title="Blog"><i class="icon-comments-alt icon-3x"></i>Blog</a></div>*/ ?>
				<?php /*<div class="span3"><a href="blog_post.html" title="Single Post"><i class="icon-comments icon-3x"></i>Single Post</a></div>*/ ?>
				<?php /*<div class="span3"><a href="typography.html" title="Typography"><i class="icon-font icon-3x"></i>Typography</a></div>*/ ?>
				<?php /*<div class="span3"><a href="javascripts.html" title="Javascript"><i class="icon-code icon-3x"></i>Javascript</a></div>*/ ?>
                <?php /*<div class="span3"><a href="gallery.html" title="gallery"><i class=" icon-picture icon-3x"></i>Photo/Video Gallery</a></div>*/ ?>
                <?php /*<div class="span3"><a href="events_calendar.html" title="calendar"><i class=" icon-calendar icon-3x"></i>Events calendar</a></div>*/ ?>
			<?php /*</div><!-- End row -->*/ ?>
		<?php /*</div><!-- End Item Container -->*/ ?>
		<?php /*</li><!-- End Item -->*/ ?>
        
		<?php /*<li><a href="blog.html" class="nodrop-down">Blog</a></li>*/ ?>
        <?php /**/ ?>
        <li class="drop-normal"><a href="javascript:void(0)" class="drop-down">Blog</a>
        <div class="drop-down-container normal">
                   <ul>
					   <?php foreach($menuBlog as $blog): ?>
                       		<li><a href="<?php echo e($blog->getViewLinkBlog()); ?>" title="<?php echo e($blog->name); ?>"><?php echo e($blog->name); ?></a></li>
                       <?php endforeach; ?>
                    </ul>
         </div><!-- End dropdown normal -->
        </li>

        <li><a href="javascript:void(0)" class="drop-down">Liên Hệ</a>
		<!-- Begin Item -->
		<div class="drop-down-container">
        
			<div class="row">
            
				<div class="span6">
					<div id="map_1"></div>
				</div>
                
				<div class="span6">
					<h4>Address</h4>
					<ul>
						<li><i class="icon-home"></i> <?php echo e($setting->getValueItem(6)); ?></li>
						<li><i class="icon-phone"></i> Telephone: <?php echo e($setting->getValueItem(8)); ?></li>
						<li><i class="icon-phone-sign"></i> Fax: <?php echo e($setting->getValueItem(7)); ?></li>
						<li><i class="icon-envelope"></i> Email: <a href="#"><?php echo e($setting->getValueItem(9)); ?></a></li>
					</ul>
                    <br>
					<hr>
                    
					<div class="row">
                    
						<div class="span3">
							<h5>Questions?</h5>
							<p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei.</p>
							<p><a href="<?php echo e(route('front.contact.index')); ?>" class="button_red_small">Read more</a></p>
						</div>
                        
						<div class="span3">
							<h5>Apply now</h5>
							<p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei.</p>
							<p><a href="<?php echo e(route('front.contact.index')); ?>" class="button_red_small" title="Contact">Contact us</a></p>
						</div>
                        
					</div><!-- End row -->
				</div><!-- End Span6 -->
			</div><!-- End row-->
		</div><!-- End Item Container -->
		</li><!-- End Item -->
	</ul><!-- End Mega Menu -->
</div>
</nav><!-- /navbar -->