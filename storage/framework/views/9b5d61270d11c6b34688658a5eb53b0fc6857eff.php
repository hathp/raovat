<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                <?php echo $__env->make('contact::contact.partials.portlet-tab-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="portlet-body">
                    <?php echo Form::model($contact, ['method' => 'patch', 'route' => ['admin.contact.update', $contact->id]]); ?>

                        <?php echo $__env->make('contact::contact.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('contact::partials.form-submit-button', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('contact::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>