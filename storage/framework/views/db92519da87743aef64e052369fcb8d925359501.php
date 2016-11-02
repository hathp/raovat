<?php $__env->startSection('js-page-script'); ?>
    <?php echo $__env->make('product::product.partials.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                <?php echo $__env->make('product::product.partials.portlet-button-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="portlet-body">
<?php /*                    <?php echo $__env->make('product::partials.portlet-toolbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>*/ ?>
                    <?php echo Form::open(['class' => 'user-list']); ?>

                    <?php echo Form::hidden('_method', ''); ?>

                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-delete-link="<?php echo e(route('admin.attribute.destroy')); ?>" data-toggle-link="<?php echo e(route('admin.attribute.toggle')); ?>">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                                <th> Tên </th>

                                <th> Sắp xếp </th>
                                <th> Kích hoạt </th>
                                <th> Hành động </th>
                            </tr>
                        </thead>
                        <tbody id="engine">
                        <?php foreach($attributes as $attribute ): ?>
                            <tr class="odd gradeX">
                                <td ><input type="checkbox" name="id[]" class="checkboxes" value="<?php echo e($attribute->id); ?>" /> </td>
                                <td class="item-name" style="width:300px"><a href="<?php echo e($attribute->getShowLink()); ?>"><?php echo e(\Core\Text\Process::extractNumberOfWord($attribute->name, 6)); ?></a> </td>

                                <td align="center">
                                    <a href="#" class="x-editable" id="order" data-pk="<?php echo e($attribute->id); ?>" data-type="text" data-url="<?php echo e(route("admin.attribute.updates")); ?>" data-title="Số thứ tự"><?php echo e($attribute->order); ?></a>
                                </td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa <?php echo e($attribute->active == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
                                <td align="center">
                                    <?php echo ViewHelper::button('Sửa ', $attribute->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']); ?>

<?php /*                                    <?php echo ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']); ?>*/ ?>
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