<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="profile-sidebar">
                <div class="portlet light profile-sidebar-portlet ">
                    <div class="profile-userpic">
                        <img src="<?php echo e($user->getAvatarImage()); ?>" class="img-responsive" alt="">
                    </div>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> <?php echo e($user->getName()); ?> </div>
                    </div>
                </div>
            </div>

            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">
                                        <form role="form" action="#">
                                            <div class="form-group">
                                                <label class="control-label">Họ tên: </label><span><b> <?php echo e($user->getName()); ?></b></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Email: </label><span><b> <?php echo e($user->getEmail()); ?></b></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Giới tính: </label><span><b> <?php echo e($user->getGenderLabel()); ?></b></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Ngày sinh: </label><span><b> <?php echo e($user->getBirthday()); ?></b></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">SĐT: </label><span><b> <?php echo e($user->getPhone()); ?></b></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Giới tính: </label><span><b> <?php echo e($user->getBirthday()); ?></b></span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>