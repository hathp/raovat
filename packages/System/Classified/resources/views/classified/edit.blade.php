@extends($package_name. '::layout.main')


@section('js-page-plugin')
    <script src="{{ asset('assets/admin/plugins/global/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($classifieds, ['method' => 'put', 'url' => route('admin.classified.update', $classifieds->id), 'files']) !!}
            @include($package_name. '::classified.partials.form')
            @include('admin.partials.form-submit-button')
            {!! Form::close() !!}
        </div>
    </div>
@endsection