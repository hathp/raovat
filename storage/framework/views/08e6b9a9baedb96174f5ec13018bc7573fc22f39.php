<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                <?php echo $__env->make('page::page.partials.portlet-button-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="portlet-body">
                    <?php echo $__env->make('page::partials.portlet-toolbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['class' => 'page-list']); ?>

                    <?php echo Form::hidden('_method', ''); ?>

                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-delete-link="<?php echo e($ajax_delete_link); ?>" data-toggle-link="<?php echo e($ajax_toggle_link); ?>" data-featured-link="<?php echo e($ajax_featured_link); ?>">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tiêu đề </th>
                            <th> Danh mục </th>
                            <th> Người đăng </th>
                            <th> Ngày đăng </th>
                            <th> Sắp xếp </th>
                            <th> Đăng bài </th>
                            <th> Index </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($pages as $page ): ?>
                            <tr class="odd gradeX">
                                <td><input type="checkbox" name="id[]" class="checkboxes" value="<?php echo e($page->id); ?>" /> </td>
                                <td class="item-name"><a href="<?php echo e(route("admin.$page_category_slug.show", $page->id)); ?>"><?php echo e(\Core\Text\Process::extractNumberOfWord($page->getTitle(), 6)); ?> ...</a> </td>
                                <td class="item-id">
                                    <?php foreach($page->categories as $category): ?>
                                        <a href="<?php echo e(route('admin.article.category.page', $category->id)); ?>"><?php echo e($category->getName()); ?></a>
                                </td>
                                <td><a href="#"><?php echo e($page->user->getName()); ?></a></td>
                                <td>
                                    <?php endforeach; ?>
                                    <?php echo with($page->published_at)->format('d/m/Y H:i'); ?>
                                </td>
                                <td align="center">
                                    <a href="#" class="x-editable" id="order" data-pk="<?php echo e($page->id); ?>" data-type="text" data-url="<?php echo e(route("admin.$page_category_slug.updates")); ?>" data-title="Số thứ tự"><?php echo e($page->order); ?></a>
                                </td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="publish" ><i class="fa <?php echo e($page->publish == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="featured" ><i class="fa <?php echo e($page->featured == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
                                <td align="center">
                                    <?php echo ViewHelper::button('Sửa ', route("admin.$page_category_slug.edit", $page->id), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']); ?>

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
<?php echo $__env->make('page::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>