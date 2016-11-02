<div class="form-body">
    <?php /* Role name */ ?>
    <?php echo FormHelper::text('Tên nhóm', 'name', null, ['input' => ['required']]); ?>


    <?php /* Super admin */ ?>
    <?php echo FormHelper::checkbox('Toàn quyền truy cập', 'super_admin', 1, null, ['input' => ['default' => 0]]); ?>

    <br />

    <?php /* Super admin */ ?>
    <?php echo FormHelper::checkbox('Truy cập admin', 'admin', 1, null, ['input' => ['default' => 0]]); ?>

    <br />

    <?php /* Active */ ?>
    <?php echo FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0]]); ?>

    <hr />

    <?php /* Permission group */ ?>
    <h4>Câp quyền cho nhóm</h4>
    <?php foreach($permission_groups as $permission_group): ?>
        <div class="form-group">
            <label><?php echo e($permission_group->name); ?></label>
            <div class="checkbox-list">
                <div class="row">
                    <?php foreach($permission_group->permissions as $permission): ?>
                        <div class="col-xs-3">
                            <label>
                                <?php echo FormHelper::checkbox($permission->name, 'permission[]', $permission->id, isset($role) ? $role_permission : null, ['input' => ['data-group' => $permission_group->name]]); ?>

                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="form-actions">
    <?php echo $__env->make('admin.partials.form-submit-button', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>