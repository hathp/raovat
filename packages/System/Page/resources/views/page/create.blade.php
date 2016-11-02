@extends('page::layout.main')

@section('js-page-plugin')
    <script src="{{ asset('assets/admin/plugins/global/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                @include('page::page.partials.portlet-tab-title')
                <div class="portlet-body">
                    {!! Form::open(['url' => $store_link, 'files']) !!}
                        @include('page::page.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection