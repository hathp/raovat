

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                <?php echo $__env->make($package_name. '::classified.partials.portlet-button-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="portlet-body">
                    <?php echo $__env->make('admin.partials.portlet-toolbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['class' => 'classified-list']); ?>

                    <?php echo Form::hidden('_method', ''); ?>

                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable"  data-delete-link="<?php echo e(route('admin.classified.destroy')); ?>" data-toggle-link="<?php echo e(route('admin.classified.toggle')); ?>">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tiêu đề </th>
                            <th> Danh mục </th>
                            <th> Quốc gia rao</th>
                            <th> Email </th>
                            <th> Lượt xem </th>
                            <th> Trang chủ </th>
                            <th> Đăng bài </th>
                            <th> Ngày đăng </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <thead>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <select class="form-control" name="classifieds_category_id" id="classifieds_category_id" onchange="location = this.value;">
                                    <option>Chọn danh mục</option>
                                    <?php foreach($categories as $classified_category): ?>
                                        <optgroup label="<?php echo e($classified_category->name); ?>">
                                            <?php if( count($classified_category->child()) ): ?>
                                                <?php foreach($classified_category->child() as $child_categories ): ?>
                                                    <option value="<?php echo e(route('admin.classified.index', ['category' => $child_categories->id])); ?>"><?php echo e($child_categories->name); ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </optgroup>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="classifieds_category_id" id="classifieds_category_id" onchange="location = this.value;">
                                    <option>Chọn quốc gia</option>
                                    <?php foreach($country_list as $key=>$country): ?>
                                        <option value="<?php echo e(route('admin.classified.index', ['country' => $key])); ?>"><?php echo e($country); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach($classifieds as $classified ): ?>
                            <tr class="odd gradeX">
                                <td><input type="checkbox" name="id[]" class="checkboxes" value="<?php echo e($classified->id); ?>" /> </td>
                                <td class="item-name"><a href="<?php echo e(route('admin.classified.show', $classified->id)); ?>"><?php echo e($classified->name); ?></a> </td>
                                <td class="item-id">
                                        <a href="#"><?php echo e($classified->categories->first()->name); ?></a>
                                </td>
                                <td> <?php echo e($classified->countries->name); ?> </td>
                                <td> <?php echo e($classified->email); ?></td>
                                <td> <?php echo e($classified->view_counter); ?></td>

                                <?php /*<td align="center">*/ ?>
                                    <?php /*<a href="#" class="x-editable" id="order" data-pk="<?php echo e($page->id); ?>" data-type="text" data-url="<?php echo e(route("admin.$page_category_slug.updates")); ?>" data-title="Số thứ tự"><?php echo e($page->order); ?></a>*/ ?>
                                <?php /*</td>*/ ?>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="home" ><i class="fa <?php echo e($classified->home == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="publish" ><i class="fa <?php echo e($classified->publish == 1 ? 'fa-check' : 'fa-times'); ?> fa-lg"></i></a></td>
                                <td>
                                    <?php echo with($classified->created_at)->format('d/m/Y H:i'); ?>
                                </td>
                                <td align="center">
                                    <?php echo ViewHelper::button('Sửa ', route('admin.classified.edit', $classified->id), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']); ?>

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
<?php echo $__env->make($package_name. '::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>