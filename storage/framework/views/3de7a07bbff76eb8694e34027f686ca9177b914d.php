<div class="page-content" style="width:500px; padding:20px; height:480px" >
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <?php echo Form::model($product_option, ['method' => 'patch', 'route' => ['admin.product-option.update', $product_option->id]]); ?>

                <?php echo $__env->make('product::option.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('product::partials.form-submit-button', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>
