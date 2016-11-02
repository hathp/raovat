@extends('product::layout.main')

@section('js-page-plugin')
    <script src="{{ asset('assets/admin/plugins/global/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    @include('product::product.partials.js')
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                @include('product::product.partials.portlet-tab-title')
                <div class="portlet-body">
                    {!! Form::open(['route' => 'admin.product.store', 'files']) !!}
                        @include('product::product.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection