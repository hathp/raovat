<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-4">
            <div class="portlet light bordered">
                <?php echo $__env->make('product::category.partials.portlet-tab-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="portlet-body">
                    <?php echo Form::open(['route' => 'admin.product.category.store', 'files']); ?>

                    <div class="tab-content">

                        <div class="tab-pane active" id="content">
                            <div>
                                <div class="row">
                                    <?php /* Category name */ ?>
                                    <?php echo FormHelper::text('Tên', 'name', null, ['input' => ['required', 'class' => 'to-slug', 'data-target' => '.slug']]); ?>


                                    <?php /* Slug */ ?>
                                    <?php echo FormHelper::text('Slug', 'slug', null, ['input' => ['required', 'class' => 'slug', ]]); ?>


                                    <?php /* Parent Category */ ?>
                                    <?php echo FormHelper::select('Nhóm cha', 'parent_id', $category_list, null, ['input' => []]); ?>


                                    <?php /* hình ảnh */ ?>
                                    <div class="form-group">
                                        <label>Ảnh</label>
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                    <span class="fileinput-filename"> </span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
                                                    <span class="fileinput-new"> Chọn file </span>
                                                    <span class="fileinput-exists"> Đổi  file </span>
                                                    <input type="file" name="cover_image"> </span>

                                            </div>
                                        </div>
                                    </div>

                                    <?php /* description */ ?>
                                    <?php echo FormHelper::textarea('Mô tả', 'description','',['input' => ['style'=>'height:55px', 'data-id' => 1, 'data-width' => '200px']]); ?>

                                    <?php /* Active */ ?>
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <?php echo FormHelper::text('Sắp xếp', 'order'); ?>

                                        </div>
                                        <div class="col-xs-4" style="margin-top: 30px;">
                                            <?php echo FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0, 'checked'=>'checked']]); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="meta">
                            <div>
                                <div class="row">
                                <?php /* Meda title tag */ ?>
                                <?php echo FormHelper::text('Thẻ tiêu đề', 'meta_title'); ?>


                                <?php /* Meta keyword */ ?>
                                <?php echo FormHelper::text('Thẻ từ khóa: ', 'meta_keyword', null, ['input' => ['data-role' => 'tagsinput'], 'label' => ['style' => 'display: block']]); ?>

                                <?php /* description */ ?>
                                <?php echo FormHelper::textarea('Thẻ miêu tả', 'meta_description','',['input' => ['style'=>'height:55px', 'data-id' => 1, 'data-width' => '200px']]); ?>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn blue"> Thêm </button>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>

        </div>
        <div class="col-xs-8">
            <div class="portlet light bordered">
                <?php echo $__env->make('product::category.partials.portlet-button-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="portlet-body">
                    <?php echo Form::open(['id' => 'product-categories-list']); ?>

                    <input type="hidden" name="_method" value="" />
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-toggle-link="<?php echo e(route('admin.product.category.toggle')); ?>" data-delete-link="<?php echo e(route('admin.product.category.destroy')); ?>" >
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tên </th>
                            <th> Slug </th>
                            <th> Bài viết </th>
                            <th> Sắp xếp </th>
                            <th> Kích hoạt </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($product_categories as $product_category): ?>
                                <tr class="odd gradeX">
                                    <td><input type="checkbox" name="id[]" class="checkboxes" value="<?php echo e($product_category->id); ?>" /> </td>
                                    <td class="item-name"><a href="<?php echo e(route('admin.product-category.show', $product_category->id)); ?>"><?php echo e($product_category->name); ?></a></td>
                                    <td class="item-id"><a href="<?php echo e(route("admin.product.category.product", $product_category->id)); ?>"> <?php echo e($product_category->slug); ?> </a> </td>
                                    <td align="center"><?php echo e(count($product_category->childProducts())); ?></td>
                                    <td align="center">
                                        <a href="#" class="x-editable" id="order" data-pk="<?php echo e($product_category->id); ?>" data-type="text" data-url="<?php echo e(route("admin.product.category.updates")); ?>" data-title="Số thứ tự"><?php echo e($product_category->order); ?></a>
                                    </td>
                                    <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa <?php echo e($product_category->active == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
                                    <td align="center">
                                        <?php echo ViewHelper::button('Sửa ', $product_category->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']); ?>

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
    <?php echo $__env->make('product::category.partials.confirmation-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('product::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>