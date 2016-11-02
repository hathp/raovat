@extends('page::partials.portlet-title')

@section('extends')

    <div class="actions">
        {!! ViewHelper::button('Xóa', '#confirmation-modal', null, ['color' => 'red', 'button' => 'circle', 'class' => 'delete-items', 'data-toggle' => 'modal', 'data-form-target' => '#page-categories-list', 'data-form-method' => 'delete', 'data-form-action' => route('admin.article.category.destroy')]) !!}
    </div>

@endsection