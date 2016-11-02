<div class="l-4a"></div>
<div class="l-4b">
    <ul>
        <?php foreach($childAbout as $child): ?>
            <li><img src="<?php echo e(asset('assets/front/images/icon_news_2.png')); ?>"> <a href="<?php echo e($child->getViewLink()); ?>"><?php echo e($child->title); ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>