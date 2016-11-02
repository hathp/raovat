<?php $__env->startSection('content'); ?>
    <?php /*<div class="row">*/ ?>
        <?php /*<div class="col-xs-12 col-md-6 col-md-offset-3">*/ ?>
            <?php /*<?php echo Form::model($user, ['method' => 'patch', 'route' => ['admin.user.update', $user->id], 'class' => 'form', 'files']); ?>*/ ?>
                <?php /*<?php echo $__env->make('admin.user.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>*/ ?>
            <?php /*<?php echo Form::close(); ?>*/ ?>
        <?php /*</div>*/ ?>
    <?php /*</div>*/ ?>

    <div class="row">
        <div class="col-xs-12 ">
            <div class="portlet light">
                <?php /* Portlet header */ ?>
                <?php echo $__env->make('admin.user.partials.portlet-tab-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php /* Portlet body */ ?>
                <div class="portlet-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="user-info">
                            <div>
                                <?php echo Form::model($user, ['route' => ['admin.user.update', $user->id], 'method' => 'put', 'class' => 'form', 'files']); ?>

                                    <?php echo $__env->make('admin.user.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php echo Form::close(); ?>

                            </div>
                        </div>

                        <div class="tab-pane" id="change-password">
                            <div>
                                <?php echo Form::model($user, ['route' => ['admin.user.change-password', $user->id], 'method' => 'put', 'class' => 'form', 'files']); ?>

                                    <div class="form-body">
                                        <?php echo FormHelper::password('Mật khẩu cũ' , 'old_password', null, ['input' => ['required']]); ?>

                                        <?php echo FormHelper::password('Mật khẩu mới' , 'password', null, ['input' => ['required']]); ?>

                                        <?php echo FormHelper::password('Xác nhận mật khẩu mới' , 'password_confirmation', null, ['input' => ['required']]); ?>

                                    </div>
                                <div class="form-actions">
                                    <?php echo $__env->make('admin.partials.form-submit-button', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                                <?php echo Form::close(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>