@extends('page::layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            {!! Form::model($page_category, ['method' => 'put', 'url' => $update_link, 'files']) !!}
                @include('page::category.partials.form')
                @include('page::partials.form-submit-button')
            {!! Form::close() !!}
        </div>
    </div>
@endsection