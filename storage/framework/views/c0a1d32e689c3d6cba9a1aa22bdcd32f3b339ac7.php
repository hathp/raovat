<?php foreach($product_categories as $product_category): ?>
    <tr class="odd gradeX">
        <td><input type="checkbox" name="id[]" class="checkboxes" value="<?php echo e($product_category->id); ?>" /> </td>
        <td class="item-name"><a href="<?php echo e(route('admin.product-category.show', $product_category->id)); ?>"><?php echo e($product_category->name); ?></a></td>
        <?php /*<td class="item-id"><a href="<?php echo e(route("admin.product.category.product", $product_category->id)); ?>"> <?php echo e($product_category->slug); ?> </a> </td>*/ ?>
        <td align="center"><?php echo e(count($product_category->childProducts())); ?></td>
        <td align="center">
            <a href="#" class="x-editable" id="order" data-pk="<?php echo e($product_category->id); ?>" data-type="text" data-url="<?php echo e(route("admin.product.category.updates")); ?>" data-title="Số thứ tự"><?php echo e($product_category->order); ?></a>
        </td>
        <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa <?php echo e($product_category->active == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
        <td align="center">
            <?php echo ViewHelper::button('Sửa ', $product_category->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']); ?>

            <?php echo ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']); ?>

        </td>
    </tr>
<?php endforeach; ?>
