<?php $__env->startSection('js-page-script'); ?>
    <?php echo $__env->make('product::product.partials.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                <?php echo $__env->make('product::product.partials.portlet-button-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="portlet-body">
                    <?php echo $__env->make('product::partials.portlet-toolbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['class' => 'user-list']); ?>

                    <?php echo Form::hidden('_method', ''); ?>

                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-delete-link="<?php echo e(route('admin.product.destroy')); ?>" data-toggle-link="<?php echo e(route('admin.product.toggle')); ?>" data-featured-link="<?php echo e(route('admin.product.featured')); ?>">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                                <th> Tiêu đề </th>
                                <th> Danh mục </th>
                                <th> Người đăng </th>
                                <th> Ngày đăng </th>
                                <th> Sắp xếp </th>
                                <th> Đăng bài </th>
                                <th> Index </th>
                                <th> Hành động </th>
                            </tr>
                        </thead>
                        <thead>
                        <tr>
                            <td> </td>
                            <td> </td>
                            <td>
                                <select name="product_categories" class="form-control form-filter input-sm" id="product_categories">
                                    <?php foreach($category_list as $key=>$category): ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e($category); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        </thead>
                        <tbody id="engine">

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
                        </tbody>

                    </table>
                    <?php echo Form::close(); ?>

                    <div>
                    </div>
                </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('product::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>