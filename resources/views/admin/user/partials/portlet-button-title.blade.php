@extends('admin.partials.portlet-title')

@section('extends')

    <div class="actions">
        {!! ViewHelper::button('Xóa', null, null, ['color' => 'red', 'button' => 'circle', 'class' => 'delete-items', 'data-target' => '.user-list']) !!}
    </div>

@endsection