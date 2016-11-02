<h3>Danh sách các khóa học</h3>
<ul class="submenu-col">
    <li><a href="<?php echo e(route('front.courses.index')); ?>" id="active">All Courses</a></li>
    <?php foreach($coursesCategory as $course): ?>
        <li><a href="<?php echo e($course->getViewLink()); ?>"><?php echo e($course->name); ?> (<?php echo e(count($course->pages()->get())); ?>)</a></li>
    <?php endforeach; ?>
</ul>

<hr>