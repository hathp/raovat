@extends($package_name. '::layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            {!! Form::model($classified_category, ['method' => 'put', 'url' => route('admin.category.classified.update', $classified_category->id), 'files']) !!}
            @include($package_name. '::category.partials.form')
            @include('admin.partials.form-submit-button')
            {!! Form::close() !!}
        </div>
    </div>
@endsection