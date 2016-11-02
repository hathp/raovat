<?php $i = 1;?>
<?php foreach($list as $item): ?>
    <div class="strip-lessons">
        <div class="row">
            <div class="span2">
                <div class="box-style-one borders"><img src="<?php echo e($item->getCoverImage()); ?>" alt="<?php echo e($item->title); ?>" class="picture"><h5>Bài học <?php echo e($i); ?></h5></div>
            </div>
            <div class="span5">
                <h4><a href="<?php echo e($item->getViewLink()); ?>"><?php echo e($item->title); ?></a></h4>
                <p><?php echo e($item->brief); ?></p>
                <ul class="data-lessons">
                    <li><i class="icon-time"></i>Duration: 3 hours</li>
                    <li><i class="icon-film"></i><a class="fancybox-media" href="<?php echo e($item->link); ?>">Play video</a></li>
                    <li><i class="icon-cloud-download"></i><a href="#">Donwload prospect</a></li>
                </ul>
            </div>
        </div>
    </div><!-- End Strip course -->
    <?php $i++;?>
<?php endforeach; ?>