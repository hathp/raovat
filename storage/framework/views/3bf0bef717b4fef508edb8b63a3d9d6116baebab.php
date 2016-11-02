

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                <?php echo $__env->make('contact::contact.partials.portlet-button-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="portlet-body">
                    
                    <?php echo Form::open(['class' => 'contact-list']); ?>

                    <?php echo Form::hidden('_method', ''); ?>

                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-delete-link="<?php echo e(route('admin.contact.destroy')); ?>"  >
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Họ Tên</th>
                            <th> Email </th>
                            <th> Phone </th>
                            <th> Ngày liên hệ </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($contacts as $contact ): ?>
                            <tr class="odd gradeX">
                                <td><input type="checkbox" name="id[]" class="checkboxes" value="<?php echo e($contact->id); ?>" /> </td>
                                <td class="item-name"><?php echo e($contact->name); ?> </td>
                                <td align="center"><?php echo e($contact->email); ?></td>
                                <td align="center"><?php echo e($contact->phone); ?></td>
                                <td align="center"><?php echo e($contact->created_at); ?></td>
                                <td align="center">
                                    <?php echo ViewHelper::button('Sửa ', route("admin.contact.edit", $contact->id), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']); ?>

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
<?php echo $__env->make('contact::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>