<header>
	<div class="container">
   	  <div class="row">
    	<div class="span4" id="logo"><a href="/"><img src="<?php echo e(asset('assets/front/img/logo.png')); ?>" alt="Logo"></a></div>
        <div class="span8">
        
        	<div id="phone" class="hidden-phone"><strong><?php echo e($setting->getValueItem(8)); ?> </strong><?php echo e($setting->getValueItem(1)); ?></div>
            
            <div id="menu-top">
            	<ul>
                	<li><a href="index.html" title="Home">Home</a> | </li>
                    <li><a href="news-events.html" title="News and Events">News &amp; Events</a> | </li>
                    <li><a href="contact.html" title="Contact">Contact</a></li>
                </ul>
            </div>

        </div><!-- End span8-->
        </div><!-- End row-->
    </div><!-- End container-->
</header><!-- End Header-->