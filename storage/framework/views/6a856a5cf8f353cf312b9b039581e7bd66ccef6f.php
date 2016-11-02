<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                <?php echo $__env->make('admin.partials.portlet-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="portlet-body">
                    <?php echo $__env->make('admin.partials.portlet-toolbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-delete-link="<?php echo e(route('admin.member.group.destroy')); ?>" data-toggle-link="<?php echo e(route('admin.member.group.toggle')); ?>">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tên nhóm </th>
                            <th> Sắp xếp </th>
                            <th> Kích hoạt </th>
                            <th> Ngày tạo </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($memberGroups as $memberGroup ): ?>
                            <tr class="odd gradeX">
                                <td><input type="checkbox" class="checkboxes" value="<?php echo e($memberGroup->id); ?>" /> </td>
                                <td><a href="<?php echo e(route('admin.member-group.show', $memberGroup->id)); ?>"><?php echo e($memberGroup->getName()); ?></a> </td>
                                <td align="center">
                                    <a href="#" class="x-editable" id="order" data-pk="<?php echo e($memberGroup->id); ?>" data-type="text" data-url="<?php echo e(route("admin.member.group.updates")); ?>" data-title="Số thứ tự"><?php echo e($memberGroup->order); ?></a>
                                </td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa <?php echo e($memberGroup->active == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
                                <td> <?php echo e($memberGroup->created_at); ?></td>
                                <td align="center">
                                    <?php echo ViewHelper::button('Sửa ', $memberGroup->getEditLink() , 'link', ['icon' => 'icon-pencil', 'size' => 'xs']); ?>

                                    <?php echo ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']); ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>