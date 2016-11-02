<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                <?php echo $__env->make('hoster-config::setting.partials.portlet-title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="portlet-body">
                    <div class="tab-content">
                        <?php for($i = 0; $i < count($setting_groups); $i++): ?>
                            <div class="tab-pane <?php if($i ==0): ?> active <?php endif; ?>" id="<?php echo e($setting_groups[$i]->slug); ?>">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                    <?php foreach($setting_groups[$i]->settings as $setting): ?>
                                        <tr>
                                            <td style="width:30%"> <?php echo e($setting->name); ?> </td>
                                            <td style="width:70%">
                                                <a href="javascript:;" class="x-editable" data-type="text" data-pk="<?php echo e($setting->id); ?>" data-original-title="<?php echo e($setting->name); ?>" data-url="<?php echo e(route('admin.setting.updates')); ?>"><?php echo e($setting->value); ?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('hoster-config::layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>