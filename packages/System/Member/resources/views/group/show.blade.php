@extends('admin.layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-6">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption">Thông tin </div>
                </div>
                <div class="portlet-body">
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><div class="scroller" style="height: 200px; overflow: hidden; width: auto;" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd" data-initialized="1">

                            <div class="form-group"><label class="control-label">Tên nhóm: </label><span><b> {{ $role->getName() }}</b></span></div>
                            <div class="form-group"><label class="control-label">Truy cập admin: </label><span><b> @boolean($role->admin) </b></span></div>
                            <div class="form-group"><label class="control-label">Toàn quyền truy cập: </label><span><b> @boolean($role->super_admin) </b></span></div>
                            <div class="form-group"><label class="control-label">Trạng thái kích hoạt: </label><span><b> @boolean($role->active) </b></span></div>

                            <div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 105.263px; background: rgb(161, 178, 189);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; display: none; background: yellow;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption">Thành viên trong nhóm </div>
                </div>
                <div class="portlet-body">
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><div class="scroller" style="height: 200px; overflow: hidden; width: auto;" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd" data-initialized="1">
                            @foreach($role->users as $user)
                                <a href="{{ $user->getEditLink() }}">{{ $user->getName() }}</a>
                            @endforeach

                            <div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 105.263px; background: rgb(161, 178, 189);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; display: none; background: yellow;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-6">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption"> Quyền của nhóm </div>
                </div>
                <div class="portlet-body">
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><div class="scroller" style="height: 200px; overflow: hidden; width: auto;" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd" data-initialized="1">
                            @foreach($role->permissions as $permission)
                                {{ $permission->getName() }} |
                            @endforeach

                            <div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 105.263px; background: rgb(161, 178, 189);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; display: none; background: yellow;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection