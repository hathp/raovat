<?php foreach($products as $product ): ?>
    <tr class="odd gradeX">
        <td ><input type="checkbox" name="id[]" class="checkboxes" value="<?php echo e($product->id); ?>" /> </td>
        <td class="item-name"><a href="<?php echo e($product->getShowLink()); ?>"><?php echo e(\Core\Text\Process::extractNumberOfWord($product->getTitle(), 6)); ?> ...</a> </td>
        <td class="item-id">
            <?php foreach($product->categories as $category): ?>
                <a href=""><?php echo e($category->getName()); ?></a>
            <?php endforeach; ?>
        </td>
        <td><a href="#"><?php echo e($product->user->getName()); ?></a></td>
        <td>
            <?php echo with($product->published_at)->format('d/m/Y H:i'); ?>
        </td>
        <td align="center">
            <a href="#" class="x-editable" id="order" data-pk="<?php echo e($product->id); ?>" data-type="text" data-url="<?php echo e(route("admin.product.updates")); ?>" data-title="Số thứ tự"><?php echo e($product->order); ?></a>
        </td>
        <td align="center"><a href="javascript:;" class="toggle-item" data-property="publish" ><i class="fa <?php echo e($product->publish == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
        <td align="center"><a href="javascript:;" class="toggle-item" data-property="featured" ><i class="fa <?php echo e($product->featured == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
        <td align="center">
            <?php echo ViewHelper::button('Sửa ', $product->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']); ?>

            <?php echo ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']); ?>

        </td>
    </tr>
<?php endforeach; ?>