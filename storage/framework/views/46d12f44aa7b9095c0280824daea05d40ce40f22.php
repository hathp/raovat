<?php foreach($page_categories as $page_category): ?>
    <tr class="odd gradeX">
        <td><input type="checkbox" name="id[]" class="checkboxes" value="<?php echo e($page_category->id); ?>" /> </td>
        <td class="item-name"><a href="<?php echo e(route("admin.article.category.show", $page_category->id)); ?>"><?php echo e($page_category->name); ?></a></td>
<?php /*        <td class="item-id"><a href="<?php echo e(route("admin.article.category.page", $page_category->id)); ?>"><?php echo e($page_category->slug); ?></a></td>*/ ?>
        <td align="center"><?php echo e(count($page_category->childPages())); ?></td>
        <td align="center">
            <a href="#" class="x-editable" id="order" data-pk="<?php echo e($page_category->id); ?>" data-type="text" data-url="<?php echo e(route("admin.$page_category_slug.category.updates")); ?>" data-title="Số thứ tự"><?php echo e($page_category->order); ?></a>
        </td>
        <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa <?php echo e($page_category->active == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>

        <td>
            <?php echo ViewHelper::button('Sửa ', $page_category->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']); ?>

            <?php echo ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']); ?>

        </td>
    </tr>
<?php endforeach; ?>