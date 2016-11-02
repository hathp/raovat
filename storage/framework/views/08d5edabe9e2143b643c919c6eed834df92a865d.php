<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                <?php echo $__env->make('admin.partials.portlet-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="portlet-body">
                    <?php echo $__env->make('admin.partials.portlet-toolbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-delete-link="<?php echo e(route('admin.role.destroy', 0)); ?>" data-toggle-link="<?php echo e(route('admin.role.toggle')); ?>">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tên nhóm </th>
                            <th> Thành viên </th>
                            <th> Toàn quyền </th>
                            <th> Try cập admin </th>
                            <th> Kích hoạt </th>
                            <th> Ngày tạo </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($roles as $role ): ?>
                            <tr class="odd gradeX">
                                <td><input type="checkbox" class="checkboxes" value="<?php echo e($role->id); ?>" /> </td>
                                <td><a href="<?php echo e(route('admin.role.show', $role->id)); ?>"><?php echo e($role->getName()); ?></a> </td>
                                <td align="center"><?php echo e($role->countMember()); ?></td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="super_admin" ><i class="fa <?php echo e($role->super_admin == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="admin" ><i class="fa <?php echo e($role->admin == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa <?php echo e($role->active == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
                                <td> <?php echo e($role->created_at); ?></td>
                                <td align="center">
                                    <?php echo ViewHelper::button('Sửa ', $role->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']); ?>

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