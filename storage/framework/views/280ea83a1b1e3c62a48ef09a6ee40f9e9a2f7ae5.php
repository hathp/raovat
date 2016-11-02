
<?php $__env->startSection('js-page-script'); ?>
<script>
    $(".colorbox").colorbox({rel:'colorbox'});
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-4">
            <h4>Thêm mới</h4>
            <?php echo Form::open(['route' => 'admin.currency.store', 'files']); ?>

                <div class="form-body" id="option">

                    <?php /* Category name */ ?>
					<?php echo FormHelper::text('Tên ngôn ngữ', 'name', null, ['input' => ['required']]); ?>

					<?php /* Category name */ ?>
					<?php echo FormHelper::text('Mã', 'code', null, ['input' => ['required']]); ?>

					<?php /* Category name */ ?>
					<?php echo FormHelper::text('Tỉ giá', 'value', null, ['input' => ['required','class'=>'mask-numeric']]); ?>

					<?php /* Category name */ ?>
					<?php echo FormHelper::text('Thập phân', 'decimal', null, ['input' => ['required','class'=>'mask-numeric']]); ?>

					
                    <div class="row">
                        <div class="col-xs-6">
							<?php /* Category name */ ?>
							<?php echo FormHelper::text('Kí tự trái', 'symbol_left'); ?>

                            <?php echo FormHelper::text('Sắp xếp', 'order',null,['input' => ['class'=>'mask-numeric']]); ?>

                        </div>
                        <div class="col-xs-6" >
						<?php echo FormHelper::text('Kí tự phải', 'symbol_right'); ?>

                            <?php echo FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0,'checked'=>'checked','style'=>'margin-top: 30px;']]); ?>

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
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-toggle-link="<?php echo e(route('admin.currency.toggle')); ?>" data-delete-link="<?php echo e(route('admin.currency.destroy')); ?>">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tên </th>
							<th> Mã </th>
                            <th> Tỉ giá </th>
                            <th> Sắp xếp </th>
                            <th> Kích hoạt </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($currencies as $currency): ?>
                                <tr class="odd gradeX">
                                    <td><input type="checkbox" class="checkboxes" value="<?php echo e($currency->id); ?>" /> </td>
                                    <td><a href="<?php echo e(route('admin.currency.show', $currency->id)); ?>"><?php echo e($currency->name); ?></a></td>
                                    <td align="center"> <?php echo e($currency->code); ?></td>
									<td align="center"> <?php echo e($currency->value); ?></td>
                                    <td align="center">
							
                                        <a href="#" class="x-editable" id="order" data-pk="<?php echo e($currency->id); ?>" data-type="text" data-url="<?php echo e(route("admin.currencies.updates")); ?>" data-title="Số thứ tự"><?php echo e($currency->order); ?></a>
                                    </td>
                                    <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa <?php echo e($currency->active == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
                                    <td align="center">
										<?php if($currency->default != $currencies->max('default')): ?>
									    <a href="<?php echo e($currency->getDefaultlink()); ?>" class="toggle-item colorbox" title="gán là tiền tệ mặc định"><i class="fa fa-check fa-lg" ></i></a>
										<?php endif; ?>
                                        <?php echo ViewHelper::button('Sửa ', $currency->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs','class' => 'colorbox']); ?>

                                        <?php if($currency->default != $currencies->max('default')): ?>
											<?php echo ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']); ?>

										<?php endif; ?>
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