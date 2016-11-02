<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-4">
            <h4>Thêm mới</h4>
            <?php echo Form::open(['url' => $store_link]); ?>

                <?php echo $__env->make('page::category.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="form-actions">
                    <button type="submit" class="btn blue">Thêm</button>
                </div>

            <?php echo Form::close(); ?>

        </div>
        <div class="col-xs-8">
            <div class="portlet light bordered">
                <?php echo $__env->make('page::category.partials.portlet-button-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="portlet-body">
                    <?php echo Form::open(['id' => 'page-categories-list']); ?>

                        <input type="hidden" name="_method" value="" />
                        <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-toggle-link="<?php echo e(route('admin.category.toggle')); ?>" data-delete-link="<?php echo e($delete_link); ?>">
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
                                <?php foreach($page_categories as $page_category): ?>
                                    <tr class="odd gradeX">
                                        <td><input type="checkbox" name="id[]" class="checkboxes" value="<?php echo e($page_category->id); ?>" /> </td>
                                        <td class="item-name"><a href="<?php echo e(route("admin.article.category.show", $page_category->id)); ?>"><?php echo e($page_category->name); ?></a></td>
                                        <td class="item-id"><a href="<?php echo e(route("admin.article.category.page", $page_category->id)); ?>"><?php echo e($page_category->slug); ?></a></td>
                                        <td align="center"><?php echo e(count($page_category->childPages())); ?></td>
                                        <td align="center">
                                            <a href="#" class="x-editable" id="order" data-pk="<?php echo e($page_category->id); ?>" data-type="text" data-url="<?php echo e(route("admin.$page_category_slug.category.updates")); ?>" data-title="Số thứ tự"><?php echo e($page_category->order); ?></a>
                                        </td>
                                        <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa <?php echo e($page_category->active == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>

                                        <td>
                                            <?php echo ViewHelper::button('Sửa ', $page_category->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']); ?>

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
    <?php echo $__env->make('page::category.partials.confirmation-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('page::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>