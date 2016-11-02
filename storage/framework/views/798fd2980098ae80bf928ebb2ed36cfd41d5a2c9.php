<div class="pagination pagination-centered">
    <ul>
        <?php if($list->currentPage() != 1): ?>
        <li><a href="<?php echo str_replace('/?','?',$list->url($list->currentPage() - 1)); ?>">Prev</a></li>
        <?php endif; ?>
        <?php for($i = 1;$i <= $list->lastPage();$i++): ?>
            <li class="<?php echo ($list->currentPage() == $i ) ? 'active' : ''; ?>"><a href="<?php echo str_replace('/?','?',$list->url($i)); ?>"><?php echo e($i); ?></a></li>
        <?php endfor; ?>
        <?php if($list->currentPage() < $list->lastPage()): ?>
            <li><a href="<?php echo str_replace('/?','?',$list->url($list->currentPage() + 1)); ?>">Next</a></li>
        <?php endif; ?>
    </ul>
</div><!-- end pagination-->