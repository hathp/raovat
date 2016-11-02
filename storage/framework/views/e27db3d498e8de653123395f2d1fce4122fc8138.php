<?php $__env->startSection('js-page-script'); ?>
    <?php echo $__env->make('product::option.partials.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-4">
            <h4>Thêm mới</h4>
            <?php echo Form::open(['route' => 'admin.product-option.store', 'files']); ?>

                <div class="form-body" id="option">

                    <?php /* Parent Category */ ?>
                    <?php echo FormHelper::select('Loại sản phẩm', 'product_category_id', $category_list, null, ['input' => ['id'=>'product_category','required']]); ?>


                    <div id="product_option" class="form-group">

                    </div>

                    <?php /* Category name */ ?>
                    <?php echo FormHelper::text('Tên thuộc tính', 'name', null, ['input' => ['required']]); ?>


                    <?php /* language */ ?>
                    <?php echo FormHelper::select('Ngôn ngữ', 'language_id', $lang_list, null, ['input' => ['required']]); ?>



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
<?php /*                <?php echo FormHelper::select(null, 'category_id', $category_list, null, ['input' => ['style'=>'width:200px;float:right']]); ?>*/ ?>
                <?php echo $__env->make('admin.partials.portlet-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-toggle-link="<?php echo e(route('admin.product.option.toggle')); ?>" data-delete-link="<?php echo e(route('admin.product.option.destroy')); ?>">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tên </th>
                            <th> Danh mục </th>
                            <th> Sắp xếp </th>
                            <th> Kích hoạt </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($product_options as $product_option): ?>
                                <tr class="odd gradeX">
                                    <td><input type="checkbox" class="checkboxes" value="<?php echo e($product_option->id); ?>" /> </td>
                                    <td><a href="<?php echo e(route('admin.product.category.show', $product_option->id)); ?>"><?php echo e($product_option->name); ?></a></td>
                                    <td align="center"> <?php echo e($product_option->product_category->name); ?></td>
                                    <td align="center">
                                        <a href="#" class="x-editable" id="order" data-pk="<?php echo e($product_option->id); ?>" data-type="text" data-url="<?php echo e(route("admin.product.option.updates")); ?>" data-title="Số thứ tự"><?php echo e($product_option->order); ?></a>
                                    </td>
                                    <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa <?php echo e($product_option->active == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
                                    <td align="center">
                                        <?php echo ViewHelper::button('Sửa ', $product_option->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs','class' => 'colorbox']); ?>

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
<?php echo $__env->make('product::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>