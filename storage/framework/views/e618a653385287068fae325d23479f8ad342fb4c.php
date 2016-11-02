<?php $__env->startSection('content'); ?>
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
                                <?php echo Form::open(['route' => 'admin.user.store', 'class' => 'form', 'files']); ?>

                                <?php echo $__env->make('admin.user.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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