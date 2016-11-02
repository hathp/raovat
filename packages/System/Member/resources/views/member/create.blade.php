@extends('member::layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                @include('member::member.partials.portlet-tab-title')
                <div class="portlet-body">
                    {!! Form::open(['route' => 'admin.member.store', 'class' => 'form','files']) !!}
                        @include('member::member.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection