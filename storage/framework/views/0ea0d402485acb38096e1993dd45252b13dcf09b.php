<?php $__env->startSection('js-page-script'); ?>
<?php /*    <?php echo $__env->make('product::category.partials.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>*/ ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">

        <div class="col-xs-12">
            <div class="portlet light bordered">
                <?php echo $__env->make('product::manufacture.partials.portlet-button-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="portlet-body">
                    <?php echo $__env->make('product::partials.portlet-toolbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['id' => 'product-categories-list']); ?>

                    <input type="hidden" name="_method" value="" />
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-toggle-link="<?php echo e(route('admin.manufacture.toggle')); ?>" data-delete-link="<?php echo e(route('admin.manufacture.destroy')); ?>" data-find-link="<?php echo e(route('admin.product.category.find')); ?>" >
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tên hãng sản xuất</th>
                            <th> Sắp xếp </th>
                            <th> Kích hoạt </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody id="engine">
                            <?php foreach($manufactures as $manufacture): ?>
                                <tr class="odd gradeX">
                                    <td><input type="checkbox" name="id[]" class="checkboxes" value="<?php echo e($manufacture->id); ?>" /> </td>
                                    <td class="item-name"><a href="<?php echo e(route('admin.product-manufacture.show', $manufacture->id)); ?>"><?php echo e($manufacture->name); ?></a></td>
                                    <td align="center">
                                        <a href="#" class="x-editable" id="order" data-pk="<?php echo e($manufacture->id); ?>" data-type="text" data-url="<?php echo e(route("admin.manufacture.updates")); ?>" data-title="Số thứ tự"><?php echo e($manufacture->order); ?></a>
                                    </td>
                                    <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa <?php echo e($manufacture->active == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
                                    <td align="center">
                                        <?php echo ViewHelper::button('Sửa ', $manufacture->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']); ?>

                                        <?php echo ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']); ?>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('product::category.partials.confirmation-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('product::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>