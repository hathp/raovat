@extends('product::layout.main')
@section('js-page-plugin')
    @include('product::manufacture.partials.js')
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                @include('product::manufacture.partials.portlet-tab-title')
                <div class="portlet-body">
                    {!! Form::open(['route' => 'admin.product-manufacture.store', 'files']) !!}
                        @include('product::manufacture.partials.form')
                        @include('product::partials.form-submit-button')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection