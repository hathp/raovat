
<?php $__env->startSection('js-page-script'); ?>
<script>
    $(".colorbox").colorbox({rel:'colorbox'});
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-4">
            <h4>Thêm mới</h4>
            <?php echo Form::open(['route' => 'admin.country.store', 'files']); ?>

                <div class="form-body" id="option">

                    <?php /* Category name */ ?>
                    <?php echo FormHelper::text('Tên', 'name', null, ['input' => ['required']]); ?>

                    <?php /* Category name */ ?>
                    <?php echo FormHelper::text('Tên định dạng', 'code', null, ['input' => ['required']]); ?>

                    <?php /* Active */ ?>
                    <div class="row">
                        <div class="col-xs-8">
                            <?php echo FormHelper::text('Sắp xếp', 'order',null,['input' => ['class'=>'mask-numeric']]); ?>

                        </div>
                        <div class="col-xs-4" style="margin-top: 30px;">
                            <?php echo FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0,'checked'=>'checked']]); ?>

                        </div>
                    </div>
                    <hr />
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn blue">Thêm</button>
                </div>
            <?php echo Form::close(); ?>

        </div>
        <div class="col-xs-8">
            <div class="portlet light bordered">
                <?php echo $__env->make('admin.partials.portlet-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-toggle-link="<?php echo e(route('admin.country.toggle')); ?>" data-delete-link="<?php echo e(route('admin.country.destroy')); ?>">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tên </th>
                            <th> Định dạng </th>
                            <th> Sắp xếp </th>
                            <th> Kích hoạt </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($countrys as $country): ?>
                                <tr class="odd gradeX">
                                    <td><input type="checkbox" class="checkboxes" value="<?php echo e($country->id); ?>" /> </td>
                                    <td><a href="<?php echo e(route('admin.country.show', $country->id)); ?>"><?php echo e($country->name); ?></a></td>
                                    <td align="center"> <?php echo e($country->code); ?></td>
                                    <td align="center">
                                        <a href="#" class="x-editable" id="order" data-pk="<?php echo e($country->id); ?>" data-type="text" data-url="<?php echo e(route("admin.countries.updates")); ?>" data-title="Số thứ tự"><?php echo e($country->order); ?></a>
                                    </td>
                                    <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa <?php echo e($country->active == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
                                    <td align="center">
                                        <?php echo ViewHelper::button('Sửa ', $country->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs','class' => 'colorbox']); ?>

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
<?php echo $__env->make('hoster-config::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>