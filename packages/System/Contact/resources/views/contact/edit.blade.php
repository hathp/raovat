@extends('contact::layout.main')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                @include('contact::contact.partials.portlet-tab-title')
                <div class="portlet-body">
                    {!! Form::model($contact, ['method' => 'patch', 'route' => ['admin.contact.update', $contact->id]]) !!}
                        @include('contact::contact.partials.form')
                        @include('contact::partials.form-submit-button')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection