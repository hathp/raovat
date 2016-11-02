@extends('admin.layout.main')

@section('content')
    {{--<div class="row">--}}
        {{--<div class="col-xs-12 col-md-6 col-md-offset-3">--}}
            {{--{!! Form::model($user, ['method' => 'patch', 'route' => ['admin.user.update', $user->id], 'class' => 'form', 'files']) !!}--}}
                {{--@include('admin.user.partials.form')--}}
            {{--{!! Form::close() !!}--}}
        {{--</div>--}}
    {{--</div>--}}

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
                                {!! Form::model($user, ['route' => ['admin.user.update', $user->id], 'method' => 'put', 'class' => 'form', 'files']) !!}
                                    @include('admin.user.partials.form')
                                {!! Form::close() !!}
                            </div>
                        </div>

                        <div class="tab-pane" id="change-password">
                            <div>
                                {!! Form::model($user, ['route' => ['admin.user.change-password', $user->id], 'method' => 'put', 'class' => 'form', 'files']) !!}
                                    <div class="form-body">
                                        {!! FormHelper::password('Mật khẩu cũ' , 'old_password', null, ['input' => ['required']]) !!}
                                        {!! FormHelper::password('Mật khẩu mới' , 'password', null, ['input' => ['required']]) !!}
                                        {!! FormHelper::password('Xác nhận mật khẩu mới' , 'password_confirmation', null, ['input' => ['required']]) !!}
                                    </div>
                                <div class="form-actions">
                                    @include('admin.partials.form-submit-button')
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection