@extends('product::layout.main')

@section('js-page-plugin')
    @include('product::attribute.partials.js')
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                @include('product::attribute.partials.portlet-tab-title')
                <div class="portlet-body">
                    {!! Form::open(['route' => 'admin.product-attribute.store']) !!}
                        @include('product::attribute.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection