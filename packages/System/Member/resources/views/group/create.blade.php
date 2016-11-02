@extends('admin.layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['route' => 'admin.member-group.store', 'class' => 'form',]) !!}
            @include('member::group.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection