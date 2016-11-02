@extends('admin.layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($member_group, ['route' => ['admin.member-group.update', $member_group->id], 'method' => 'put', 'class' => 'form']) !!}
            @include('member::group.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection