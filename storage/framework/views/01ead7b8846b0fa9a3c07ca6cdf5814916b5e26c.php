<?php foreach($pages as $page ): ?>
    <tr class="odd gradeX">
        <td><input type="checkbox" name="id[]" class="checkboxes" value="<?php echo e($page->id); ?>" /> </td>
        <td class="item-name"><a href="<?php echo e(route("admin.$page_category_slug.show", $page->id)); ?>"><?php echo e(\Core\Text\Process::extractNumberOfWord($page->getTitle(), 6)); ?> ...</a> </td>
        <td class="item-id">
            <?php foreach($page->categories as $category): ?>
                <a href="<?php echo e(route('admin.article.category.page', $category->id)); ?>"><?php echo e($category->getName()); ?></a>
        </td>
        <td><a href="#"><?php echo e($page->user->getName()); ?></a></td>
        <td>
            <?php endforeach; ?>
            <?php echo with($page->published_at)->format('d/m/Y H:i'); ?>
        </td>
        <td align="center">
            <a href="#" class="x-editable" id="order" data-pk="<?php echo e($page->id); ?>" data-type="text" data-url="<?php echo e(route("admin.$page_category_slug.updates")); ?>" data-title="S? th? t?"><?php echo e($page->order); ?></a>
        </td>
        <td align="center"><a href="javascript:;" class="toggle-item" data-property="publish" ><i class="fa <?php echo e($page->publish == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
        <td align="center"><a href="javascript:;" class="toggle-item" data-property="featured" ><i class="fa <?php echo e($page->featured == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
        <td align="center">
            <?php echo ViewHelper::button('S?a ', route("admin.$page_category_slug.edit", $page->id), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']); ?>

            <?php echo ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']); ?>

        </td>
    </tr>
<?php endforeach; ?>