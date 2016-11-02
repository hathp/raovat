<div class="page-content" style="width:500px; padding:20px; height:480px" >
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <?php echo Form::model($country, ['method' => 'patch', 'route' => ['admin.country.update', $country->id]]); ?>

                <?php echo $__env->make('hoster-config::country.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('hoster-config::partials.form-submit-button', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>
