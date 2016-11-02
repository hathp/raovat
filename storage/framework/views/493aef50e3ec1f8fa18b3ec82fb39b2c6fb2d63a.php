<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                <?php echo $__env->make('member::member.partials.portlet-button-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="portlet-body">
                    <?php echo $__env->make('member::partials.portlet-toolbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['class' => 'member-list']); ?>

                    <?php echo Form::hidden('_method', ''); ?>

                    <table  class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-delete-link="<?php echo e(route('admin.member.destroy')); ?>" data-toggle-link="<?php echo e(route('admin.member.toggle')); ?>">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                                <th> Tên thành viên </th>
                                <th> Nhóm thành viên </th>
                                <th> Ngày đăng </th>
                                <th> Sắp xếp </th>
                                <th> Đăng bài </th>
                                <th> Hành động </th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td>
                                    <select name="categories" class="form-control form-filter input-sm" id="find">
                                        <?php foreach($member_groups as $member_group): ?>
                                            <option value="<?php echo e($member_group->id); ?>"><?php echo e($member_group->name); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                        </thead>

                        <tbody id="engine">
                        <?php foreach($members as $member ): ?>
                            <tr class="odd gradeX">
                                <td><input type="checkbox" name="id[]" class="checkboxes" value="<?php echo e($member->id); ?>" /> </td>
                                <td class="item-name"><a href="<?php echo e(route("admin.member.show", $member->id)); ?>"><?php echo e($member->name); ?> ...</a> </td>
                                <td class="item-id">
                                        <a><?php echo e($$member->member_groups()->get()->name); ?></a>
                                </td>
                                <td><a href="#"></a></td>
                                <td>
                                    <?php echo with($member->published_at)->format('d/m/Y H:i'); ?>
                                </td>
                                <td align="center">
                                    <a href="#" class="x-editable" id="order" data-pk="<?php echo e($member->id); ?>" data-type="text" data-url="<?php echo e(route("admin.member.updates")); ?>" data-title="Số thứ tự"><?php echo e($member->order); ?></a>
                                </td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa <?php echo e($member->active == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
                                <td align="center">
                                    <?php echo ViewHelper::button('Sửa ', route("admin.member.edit", $member->id), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']); ?>

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
<?php echo $__env->make('member::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>