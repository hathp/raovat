<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                <?php echo $__env->make('admin.user.partials.portlet-button-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="portlet-body">
                    <?php echo $__env->make('admin.partials.portlet-toolbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['class' => 'user-list', 'route' => ['admin.user.destroy', 0]]); ?>

                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-delete-link="<?php echo e(route('admin.user.destroy', 0)); ?>" data-toggle-link="<?php echo e(route('admin.user.toggle')); ?>" >
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tên </th>
                            <th> Email </th>
                            <th> Nhóm </th>
                            <th> Ngày tham gia </th>
                            <th> Kích hoạt </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($users as $user ): ?>
                            <tr class="odd gradeX">
                                <td><input type="checkbox" class="checkboxes" name="id[]" value="<?php echo e($user->id); ?>" /> </td>
                                <td class="item-name"><a href="<?php echo e(route('admin.user.show', $user->id)); ?>"><?php echo e($user->getName()); ?></a> </td>
                                <td class="item-id"><a href="mailto:<?php echo e($user->email); ?>"> <?php echo e($user->getEmail()); ?> </a></td>
                                <td>
                                    <?php foreach($user->roles as $role): ?>
                                        <?php echo ViewHelper::badge($role->name); ?>

                                    <?php endforeach; ?>
                                </td>
                                <td class="center"> <?php echo e($user->getJoinDate()); ?> </td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa <?php echo e($user->active == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
                                <td align="center">
                                    <?php echo ViewHelper::button('Sửa ', $user->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']); ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>