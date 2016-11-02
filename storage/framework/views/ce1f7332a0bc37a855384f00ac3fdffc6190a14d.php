<li class="col-md-4 col-xs-4">
    <a href="<?php echo e($item->getViewLink()); ?>">
        <?php if(!empty($item->link)): ?>
            <iframe width="100%" height="121" src="https://www.youtube.com/embed/<?php echo e($page->link); ?><?php echo e($item->link); ?>" frameborder="0" allowfullscreen></iframe>
        <?php else: ?>
            <img alt="<?php echo e($item->title); ?>" src="<?php echo e($item->getCoverImage()); ?>" >
        <?php endif; ?>
        <div class="tab-cont">
            <?php echo e($item->title); ?>

        </div>
    </a>
</li>