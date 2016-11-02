@extends('page::partials.portlet-title')

@section('extends')

    <div class="actions">
        {!! ViewHelper::button('Xóa', '#confirmation-model', 'link', ['color' => 'red', 'button' => 'circle', 'data-form-target' => '']) !!}
    </div>

@endsection