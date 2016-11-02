<script src="<?php echo e(asset('assets/front/js/easyResponsiveTabs.js')); ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
</script>
<script src="<?php echo e(asset('assets/front/js/jquery.etalage.min.js')); ?>"></script>
<script>
    jQuery(document).ready(function($){
        $('#etalage').etalage({
            thumb_image_width: 300,
            thumb_image_height: 250,
            source_image_width: 1200,
            source_image_height: 900,
            show_hint: true,
            click_callback: function(image_anchor, instance_id){
                alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
            }
        });
    });
</script>
<script src="<?php echo e(asset('assets/front/js/star-rating.js')); ?>" type="text/javascript"></script>