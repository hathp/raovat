<div class="page-content" style="width:500px; padding:20px; height:480px" >
    <div class="row">
        <div class="col-xs-12 col-md-8 " style="width:480px;">
            {!! Form::model($currency, ['method' => 'patch', 'route' => ['admin.currency.update', $currency->id]]) !!}
                @include('hoster-config::currency.partials.form')
                @include('hoster-config::partials.form-submit-button')
            {!! Form::close() !!}
        </div>
    </div>
</div>
