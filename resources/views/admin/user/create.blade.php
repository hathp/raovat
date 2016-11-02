@extends('admin.layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-12 ">
            <div class="portlet light">
                {{-- Portlet header --}}
                @include('admin.user.partials.portlet-tab-title')
                {{-- Portlet body --}}
                <div class="portlet-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="user-info">
                            <div>
                                {!! Form::open(['route' => 'admin.user.store', 'class' => 'form', 'files']) !!}
                                @include('admin.user.partials.form')
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection