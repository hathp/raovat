<ul>
    <?php foreach($list as $item): ?>
        <li>
            <div class="article">
                <div class="cover_image">
                    <a href="<?php echo e($item->getViewLink()); ?>"><img src="<?php echo e($item->getCoverImage()); ?>" alt="<?php echo e($item->title); ?>" /></a>
                </div>
                <p><span><?php echo e($item->title); ?></span></p>
                <p> <?php echo e($item->brief); ?></p>
                <p><a href="<?php echo e($item->getViewLink()); ?>">+ View Detail .. </a></p>
            </div>
        </li>
    <?php endforeach; ?>
</ul>