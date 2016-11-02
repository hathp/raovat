@extends('page::layout.main')
@section('js-page-plugin')
    @include('product::manufacture.partials.js')
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                @include('product::category.partials.portlet-tab-title')
                <div class="portlet-body">
                    {!! Form::model($manufacture, ['method' => 'patch', 'route' => ['admin.product-manufacture.update', $manufacture->id], 'files']) !!}
                        @include('product::manufacture.partials.form')
                        @include('product::partials.form-submit-button')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection