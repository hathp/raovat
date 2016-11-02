<div class="page-content" style="width:500px; padding:20px; height:480px" >
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            {!! Form::model($country, ['method' => 'patch', 'route' => ['admin.country.update', $country->id]]) !!}
                @include('hoster-config::country.partials.form')
                @include('hoster-config::partials.form-submit-button')
            {!! Form::close() !!}
        </div>
    </div>
</div>
