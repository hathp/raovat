@extends('admin.layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['route' => 'admin.role.store', 'class' => 'form',]) !!}
            @include('admin.role.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection