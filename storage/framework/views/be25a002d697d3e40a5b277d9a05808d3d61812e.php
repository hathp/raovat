<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">

                <div class="portlet-body">
                    <?php echo Form::open(['class' => 'comment-list']); ?>

                    <?php echo Form::hidden('_method', ''); ?>

                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-delete-link="<?php echo e($ajax_delete_link); ?>" data-toggle-link="<?php echo e($ajax_toggle_link); ?>" >
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tên thành viên </th>
							<th> Nội dung </th>
							<th> Sắp Xếp </th>
                            <th> Trạng thái kiểm duyệt </th>
                            <th> Ngày tạo </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($listComment as $comment ): ?>
                            <tr class="odd gradeX">
                                <td><input type="checkbox" name="id[]" class="checkboxes" value="<?php echo e($comment->id); ?>" /> </td>
                                <td class="item-name">
                                    <?php echo e($comment->user_name); ?>

                                </td>
                                <td align="center"><?php echo $comment->message; ?></td>
                                <td align="center">
                                    <a href="#" class="x-editable" id="order" data-pk="<?php echo e($comment->id); ?>" data-type="text" data-url="<?php echo e(route("admin.comment.updates")); ?>" data-title="Số thứ tự"><?php echo e($comment->order); ?></a>
                                </td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="status" ><i class="fa <?php echo e($comment->status == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
                                <td align="center"><?php echo e($comment->created_at); ?></td>
                                <td align="center">
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
<?php echo $__env->make('comment::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>