@extends('product::partials.portlet-title')

@section('extends')

    <div class="actions">
        {!! ViewHelper::button('Xóa', '#confirmation-modal', null, ['color' => 'red', 'button' => 'circle', 'class' => 'delete-items', 'data-toggle' => 'modal', 'data-form-target' => '#product-categories-list', 'data-form-method' => 'delete', 'data-form-action' => route('admin.product.category.destroy')]) !!}
    </div>

@endsection