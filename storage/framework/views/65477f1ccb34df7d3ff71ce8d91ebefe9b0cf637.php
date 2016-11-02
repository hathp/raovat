

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
<?php /*                <?php echo $__env->make('layout::layout.partials.portlet-button-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>*/ ?>
                <div class="portlet-body">
                    <?php if($image_album_slug == 'slide'): ?>
                        <?php echo $__env->make('layout::partials.portlet-toolbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>
                    <?php echo Form::open(['class' => 'contact-list']); ?>

                    <?php echo Form::hidden('_method', ''); ?>

                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-delete-link="<?php echo e($ajax_delete_link); ?>" data-toggle-link="<?php echo e($ajax_toggle_link); ?>" >
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Image </th>
							<th> Tiêu đề </th>
							<th> Sắp Xếp </th>
                            <th> Hiển thị </th>
                            <th> Ngày tạo </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($images as $image ): ?>
                            <tr class="odd gradeX">
                                <td><input type="checkbox" name="id[]" class="checkboxes" value="<?php echo e($image->id); ?>" /> </td>
                                <td class="item-name">
                                    <img class="img-responsive" src="<?php echo e($image->getLink(config('layout-image.image_layout.thumbnail.path'))); ?>" alt="" style="height: 80px;">
                                </td>
                                <td align="center"><?php echo e($image->name); ?></td>
                                <td align="center">
                                    <a href="#" class="x-editable" id="order" data-pk="<?php echo e($image->id); ?>" data-type="text" data-url="<?php echo e(route("admin.layout.updates")); ?>" data-title="Số thứ tự"><?php echo e($image->order); ?></a>
                                </td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa <?php echo e($image->active == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
                                <td align="center"><?php echo e($image->created_at); ?></td>
                                <td align="center">
                                    <?php if($image_album_slug == 'slide'): ?>
                                        <?php echo ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']); ?>

                                    <?php endif; ?>
                                    <?php echo ViewHelper::button('Sửa ', route("admin.$image_album_slug.edit", $image->id), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']); ?>

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
<?php echo $__env->make('layout::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>