@extends('admin.layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($role, ['route' => ['admin.role.update', $role->id], 'method' => 'put', 'class' => 'form']) !!}
            @include('admin.role.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection