<li class="col-md-6 col-xs-6">
    <a href="<?php echo e($item->getViewLink()); ?>"><img alt="<?php echo e($item->title); ?>" src="<?php echo e($item->getCoverImage()); ?>"></a>
    <div class="tab-cont">
        <a href="<?php echo e($item->getViewLink()); ?>" style="    font-weight: bold;    padding-bottom: 5px;    color: #00569b;">
            <?php echo e($item->title); ?>

        </a><br>
        <span>
            <?php echo e($item->brief); ?>

        </span>
    </div>
</li>