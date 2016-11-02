@extends('layout::layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                @include('layout::image.partials.portlet-tab-title')
                <div class="portlet-body">
                    {!! Form::open(['url' => $store_link, 'files']) !!}
                        @include('layout::image.partials.form')
						@include('layout::partials.form-submit-button')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection