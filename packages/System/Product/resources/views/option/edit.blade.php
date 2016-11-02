<div class="page-content" style="width:500px; padding:20px; height:480px" >
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            {!! Form::model($product_option, ['method' => 'patch', 'route' => ['admin.product-option.update', $product_option->id]]) !!}
                @include('product::option.partials.form')
                @include('product::partials.form-submit-button')
            {!! Form::close() !!}
        </div>
    </div>
</div>
