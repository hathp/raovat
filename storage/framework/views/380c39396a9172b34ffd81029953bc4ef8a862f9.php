<div id="comments">
    <ol>
        <?php foreach($comments as $comment): ?>
        <li>
            <div class="avatar"><a href="#"><img src="<?php echo e($comment->user->getAvatarImage()); ?>" alt="<?php echo e($comment->user_name); ?>" style="    width: 68px;"></a></div>
            <div class="comment_right clearfix">
                <div class="comment_info">Đăng bởi <a href="#"><?php echo e($comment->user_name); ?></a><span>|</span> <?php echo e($comment->created_at->format('d-m-Y')); ?> <span>|</span><a class="reply-review" id="<?php echo e($comment->id); ?>"  href="#contactForm"> Trả lời </a><span>|</span><a class="edit-review" id="<?php echo e($comment->id); ?>"  href="#contactForm"> Sửa </a></div>
                <p class="html_<?php echo e($comment->id); ?>"><?php echo $comment->message; ?></p>
            </div>
            <ul>
                <?php foreach($comment->child as $item): ?>
                <li>
                    <div class="avatar"><a href="#"><img src="<?php echo e($comment->user->getAvatarImage()); ?>" alt="<?php echo e($comment->user_name); ?>" style="    width: 68px;"></a></div>
                    <div class="comment_right clearfix">
                        <div class="comment_info">Đăng bởi <a href="#"><?php echo e($item->user_name); ?></a><span>|</span> <?php echo e($item->created_at->format('d-m-Y')); ?> <span>|</span><a class="reply-review" id="<?php echo e($comment->id); ?>"  href="#contactForm"> Trả lời </a><span>|</span><a class="edit-review" id="<?php echo e($comment->id); ?>"  href="#contactForm"> Trả lời </a></div>
                        <p class="html_<?php echo e($comment->id); ?>">
                            <?php echo $item->message; ?>

                        </p>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </li>
        <?php endforeach; ?>
    </ol>
</div><!-- End Comments -->