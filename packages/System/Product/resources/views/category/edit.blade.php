@extends('page::layout.main')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                @include('product::category.partials.portlet-tab-title')
                <div class="portlet-body">
                    {!! Form::model($product_category, ['method' => 'patch', 'route' => ['admin.product-category.update', $product_category->id], 'files']) !!}
                        @include('product::category.partials.form')
                        @include('product::partials.form-submit-button')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection