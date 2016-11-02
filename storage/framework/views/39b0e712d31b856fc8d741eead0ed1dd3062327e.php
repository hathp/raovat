<div class="page-content" style="width:500px; padding:20px; height:480px" >
    <div class="row">
        <div class="col-xs-12 col-md-8 " style="width:480px;">
            <?php echo Form::model($currency, ['method' => 'patch', 'route' => ['admin.currency.update', $currency->id]]); ?>

                <?php echo $__env->make('hoster-config::currency.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('hoster-config::partials.form-submit-button', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>
